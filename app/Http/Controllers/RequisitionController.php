<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarehouseStock;
use App\Models\Requisition;
use App\Models\RequisitionItem;
use App\Models\HospitalStock;
use App\Models\ProductPriceList;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;




class RequisitionController extends Controller
{

public function hospitalIndex()
{
    $requisitions = Requisition::
    // where('hospitalId', auth()->user()->hospitalId)
    //     ->
        with(['hospital', 'requestedByUser'])
        ->
        orderBy('created_at', 'desc')
        ->get();
    return response()->json($requisitions);
}

public function requisitionItems($requisitionId)
{
    $items = RequisitionItem::where('requisitionId', $requisitionId)
        ->with(['warehouse_stock.product_pricelist.product', 'warehouse', 'distributor', 'manufacturer'])
        ->get();

    return response()->json($items);
}

public function stockRequest(Request $request)
{
    $validated = $request->validate([
        'productId' => 'required|exists:products,productId',
        'warehouseId' => 'required|exists:warehouses,warehouseId',
        'quantity' => 'required|integer|min:1',
        'notes' => 'nullable|string',
    ]);

    // Optional: Check if enough stock available (quantityAvailable >= quantity)
    $stock = WarehouseStock::where('warehouse', $validated['warehouseId'])
        ->where('product', $validated['productId'])
        ->where('quantityAvailable', '>=', $validated['quantity'])
        ->where('status', 'IN_STOCK')
        ->first();

    if (!$stock) {
        return response()->json(['message' => 'Insufficient stock or product not available'], 422);
    }

    $requisition = Requisition::create([
        // 'hospitalId' => auth()->user()->hospitalId,
        'hospitalId' => 1, // Temporary hardcoded value; replace with actual hospital ID from authenticated user
        'productId' => $validated['productId'],
        'warehouseId' => $validated['warehouseId'],
        'quantityRequested' => $validated['quantity'],
        'notes' => $request->notes,
        'requestedBy' => auth()->id(),
        'status' => 'PENDING',
    ]);

    // Optional: Reserve stock temporarily
    $stock->quantityReserved += $validated['quantity'];
    $stock->quantityAvailable -= $validated['quantity'];
    $stock->save();

    return response()->json(['message' => 'Requisition submitted successfully', 'requisition' => $requisition], 201);
}



public function bulkStockRequest(Request $request)
{
    $validated = $request->validate([
        'items' => 'required|array|min:1',
        'items.*.productId' => 'required|exists:products,productId',
        'items.*.warehouseId' => 'required|exists:warehouses,warehouseId',
        'items.*.quantityRequested' => 'required|integer|min:1',
        'items.*.notes' => 'nullable|string',
        'remarks' => 'nullable|string',
    ]);

    $hospitalId  = auth()->user()->staff->hospitalId;
    $requestedBy = auth()->id();

    $requisitionId = strtoupper(Str::random(2)) . mt_rand(1000000000, 9999999999);

    return DB::transaction(function () use ($validated, $hospitalId, $requestedBy, $requisitionId) {

        /* ---------------------------------------------------------
         | 1. Create Parent Requisition
         * ---------------------------------------------------------*/
        $parentRequisition = Requisition::create([
            'hospitalId'    => $hospitalId,
            'remarks'       => $validated['remarks'] ?? null,
            'requestedBy'   => $requestedBy,
            'status'        => 'PENDING',
            'requisitionId' => $requisitionId,
            'totalCost'     => 0,
        ]);

        $totalCost = 0;
        $createdItems = [];

        /* ---------------------------------------------------------
         | 2. Process Each Item
         * ---------------------------------------------------------*/
        foreach ($validated['items'] as $item) {

            // Find available stock
            $stock = DB::table('warehouse_stocks')
                ->where('warehouse', $item['warehouseId'])
                ->where('product', $item['productId'])
                ->where('quantityAvailable', '>=', $item['quantityRequested'])
                ->where('status', 'IN_STOCK')
                ->first();

            if (!$stock) {
                $product = Product::where('productId', $item['productId'])->first();
                $warehouse = Warehouse::where('warehouseId', $item['warehouseId'])->first();

                throw new \Exception(
                    "Insufficient stock for {$product->productName} in {$warehouse->warehouseName}"
                );
            }

            // Get pricing
            $pricing = ProductPriceList::where('id', $stock->product)->first();

            if (!$pricing) {
                throw new \Exception("Pricing not found for selected product.");
            }

            // Calculate item total cost
            $itemTotalCost = $pricing->landedCost * $item['quantityRequested'];

            /* -----------------------------------------------------
             | 3. Create Requisition Item
             * -----------------------------------------------------*/
            $requisitionItem = RequisitionItem::create([
                'hospitalId'        => $hospitalId,
                'productId'         => $item['productId'],
                'warehouseId'       => $item['warehouseId'],
                'quantityRequested' => $item['quantityRequested'],
                'notes'             => $item['notes'] ?? null,
                'requestedBy'       => $requestedBy,
                'status'            => 'PENDING',
                'requisitionId'     => $requisitionId,
                'distributorId'     => $stock->distributor,
                'manufacturerId'    => $stock->manufacturer,
                'warehouseStockId'  => $stock->warehouseStockId,
                'requestDate'       => Carbon::now(),

                // Pricing breakdown
                'landedCost'        => $pricing->landedCost,
                'hospitalMarkup'    => $pricing->hospitalMarkup,
                'resilienceMarkup'  => $pricing->resilienceMarkup,
                'distributorMarkup' => $pricing->distributorMarkup,
                'bankCharges'       => $pricing->bankCharges,
                'priceToPatient'    => $pricing->priceToPatient,
            ]);

            // Add to running total
            $totalCost += $itemTotalCost;

            /* -----------------------------------------------------
             | 4. Reserve Stock
             * -----------------------------------------------------*/
            DB::table('warehouse_stocks')
                ->where('warehouseStockId', $stock->warehouseStockId)
                ->decrement('quantityAvailable', $item['quantityRequested']);

            DB::table('warehouse_stocks')
                ->where('warehouseStockId', $stock->warehouseStockId)
                ->increment('quantityReserved', $item['quantityRequested']);

            $createdItems[] = $requisitionItem;
        }

        /* ---------------------------------------------------------
         | 5. Update Parent Requisition Total
         * ---------------------------------------------------------*/
        $parentRequisition->update([
            'totalCost' => $totalCost
        ]);

        /* ---------------------------------------------------------
         | 6. Response
         * ---------------------------------------------------------*/
        return response()->json([
            'message'        => 'Bulk requisition submitted successfully',
            'requisitionId' => $requisitionId,
            'total_items'   => count($createdItems),
            'totalCost'     => $totalCost,
            'requisitions'  => $createdItems,
        ], 201);
    });
}





    public function cancel(Request $request, $itemId)
    {
        $item = RequisitionItem::findOrFail($itemId);

        // Security: Ensure user owns the requisition
        // if ($item->requisition->hospitalId !== Auth::user()->hospitalId) {
        //     return response()->json([
        //         'message' => 'Unauthorized action.'
        //     ], 403);
        // }

        // Only allow cancellation if still PENDING
        if ($item->status !== 'PENDING') {
            return response()->json([
                'message' => 'This item cannot be cancelled. Current status: ' . $item->status
            ], 400);
        }

        $item->status = 'CANCELLED';
        $item->save();

        // Optional: Update requisition overall status if all items are cancelled/rejected
        $requisitionId = $item->requisitionId;
        $this->updateRequisitionStatus($requisitionId);

        return response()->json([
            'message' => 'Item request cancelled successfully.',
            'item' => $item->load('product')
        ], 200);
    }

   private function updateRequisitionStatus($requisitionId)
{
    $requisition = Requisition::where('requisitionId', $requisitionId)->first();

    if (!$requisition) {
        return;
    }

    $items = $requisition->items;

    // If any item is still active, do nothing
    if ($items->contains(fn ($item) => !in_array($item->status, ['CANCELLED', 'REJECTED']))) {
        return;
    }

    $allCancelled = $items->every(fn ($item) => $item->status === 'CANCELLED');
    $allRejected  = $items->every(fn ($item) => $item->status === 'REJECTED');

    if ($allCancelled) {
        $requisition->status = 'CANCELLED';
    } elseif ($allRejected) {
        $requisition->status = 'REJECTED';
    } else {
        // Mixed: CANCELLED + REJECTED
        $requisition->status = 'REJECTED'; // business rule
    }

    $requisition->save();
}





    public function dispatch(Request $request, $requisitionId)
    {
        $validator = Validator::make($request->all(), [
            'updates' => 'required|array|min:1',
            'updates.*.itemId' => 'required|integer|exists:requisition_items,itemId',
            'updates.*.dispatchedQuantity' => 'required|integer|min:0',
            'updates.*.batchNumber' => 'nullable|string|max:100',
            'updates.*.expiryDate' => 'nullable|date',
            'updates.*.status' => 'required|in:DISPATCHED,REJECTED',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $updates = $request->input('updates');

        try {
            DB::beginTransaction();

            foreach ($updates as $update) {
                $item = RequisitionItem::where('itemId', $update['itemId'])
                    ->where('requisitionId', $requisitionId)
                    ->firstOrFail();

                // Prevent dispatching more than pending
                $pendingQty = $item->quantityRequested - ($item->quantityDispatched ?? 0);

                if ($update['status'] === 'DISPATCHED') {
                    if ($update['dispatchedQuantity'] > $pendingQty) {
                        throw new \Exception("Cannot dispatch more than pending quantity for item #{$item->itemId}");
                    }

                    if ($update['dispatchedQuantity'] > 0) {
                        // Update dispatched quantity
                        $newDispatched = ($item->quantityDispatched ?? 0) + $update['dispatchedQuantity'];
                        $item->quantityDispatched = $newDispatched;
                        $item->batchNumber = $update['batchNumber'];
                        $item->dispatchedBy = auth()->id(); // or auth('sanctum')->id();
                        $item->dispatchDate = Carbon::now();
                        $item->expiryDate = $update['expiryDate'] ?? $item->expiryDate;

                        // Update status based on full or partial dispatch
                        if ($newDispatched >= $item->quantityRequested) {
                            $item->status = 'DISPATCHED';
                        } else {
                            $item->status = 'DISPATCHED';
                        }
                    }
                } elseif ($update['status'] === 'REJECTED') {
                    // Optional: you might want to allow rejecting only if not already dispatched
                    if (($item->quantityDispatched ?? 0) > 0) {
                        throw new \Exception("Cannot reject item #{$item->itemId} that has already been partially dispatched.");
                    }

                    $item->status = 'REJECTED';
                    $item->remarks = $item->remarks ? $item->remarks . ' | Rejected during dispatch' : 'Rejected during dispatch';
                }

                $item->updated_at = Carbon::now();
                $item->save();
            }

            // Optional: Update overall requisition status
            $this->updateRequisitionStatusWarehouse($requisitionId);

            DB::commit();

            return response()->json([
                'message' => 'Items processed successfully',
                'data' => [
                    'requisitionId' => $requisitionId,
                    'processed' => count($updates)
                ]
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to process dispatch',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the parent requisition status based on its items
     */
    private function updateRequisitionStatusWarehouse($requisitionId)
    {
        $items = RequisitionItem::where('requisitionId', $requisitionId)->get();

        $allDispatched = $items->every(fn($item) => in_array($item->status, ['DISPATCHED', 'REJECTED']));
        $someDispatched = $items->some(fn($item) => in_array($item->status, ['DISPATCHED', 'DISPATCHED']));
        $allRejected = $items->every(fn($item) => $item->status === 'REJECTED');

        $requisition = \App\Models\Requisition::where('requisitionId', $requisitionId)->firstOrFail();

        if ($allRejected) {
            $requisition->status = 'REJECTED';
        } elseif ($allDispatched && !$someDispatched) {
            $requisition->status = 'DISPATCHED'; // or 'DISPATCHED' if you have that status
        } elseif ($someDispatched) {
            $requisition->status = 'DISPATCHED';
        }
        // else: leave as is (e.g., APPROVED)

        $requisition->save();
    }



    public function receive(Request $request, string $requisitionId)
    {
        $request->validate([
            'updates' => 'required|array|min:1',
            'updates.*.itemId' => 'required|integer|exists:requisition_items,itemId',
            'updates.*.receivedQuantity' => 'required|integer|min:1',
        ]);

        $updates = $request->input('updates');

        try {
            DB::beginTransaction();

            foreach ($updates as $update) {
                $item = RequisitionItem::where('requisitionId', $requisitionId)
                    ->where('itemId', $update['itemId'])
                    ->firstOrFail();

                // Calculate how much is still pending to be received
                $dispatched = $item->quantityDispatched ?? 0;
                $alreadyReceived = $item->quantityReceived ?? 0;
                $pendingToReceive = $dispatched - $alreadyReceived;

                if ($update['receivedQuantity'] > $pendingToReceive) {
                    throw ValidationException::withMessages([
                        'updates' => "Cannot receive more than dispatched quantity for item #{$item->itemId} (Pending: {$pendingToReceive})"
                    ]);
                }

                $getProduct = WarehouseStock::where('warehouseStockId', $item->warehouseStockId)->first();
                $pricing = ProductPriceList::where('id', $getProduct->product)->first();
                // Update received quantity
                $newReceived = $alreadyReceived + $update['receivedQuantity'];
                $item->quantityReceived = $newReceived;
                $item->receivedBy = auth()->id(); // pharmacist user
                $item->receivedDate = now();
                // $item->landedCost = $pricing->landedCost;
                // $item->hospitalMarkup = $pricing->hospitalMarkup;
                // $item->resilienceMarkup = $pricing->resilienceMarkup;
                // $item->bankCharge = $pricing->bankCharge;
                // $item->priceToPatient = $pricing->priceToPatient;

                // Update item status
                if ($newReceived >= $dispatched) {
                    $item->status = 'RECEIVED';
                } else {
                    $item->status = 'PARTIALLY_RECEIVED';
                }

                $item->save();

                 // Add to hospital/pharmacy stock
                // HospitalStock::updateOrCreate(
                //     [
                //         'productId' => $getProduct->product,
                //         'hospitalId' => $item->hospitalId,
                //         'batchNumber' => $item->batchNumber,
                //     ],
                //     [
                //         'quantityReceived' => DB::raw('quantityReceived + ' . $update['receivedQuantity']),
                //         'lastReceivedAt' => now(),
                //         'expiryDate' => $item->expiryDate,
                //         'receivedBy' => auth()->id(),
                //     ]
                // );
                HospitalStock::create([
    'productId'       => $getProduct->product,
    'hospitalId'      => $item->hospitalId,
    'batchNumber'     => $item->batchNumber,
    'quantityReceived'        => $update['receivedQuantity'],
    'expiryDate' => $item->expiryDate,
    'receivedBy' => auth()->id(),
    'landedCost' => $pricing->landedCost,
    'hospitalMarkup' => $pricing->hospitalMarkup,
    'resilienceMarkup' => $pricing->resilienceMarkup,
    'distributorMarkup' => $pricing->distributorMarkup,
    'bankCharges' => $pricing->bankCharges,
    'priceToPatient' => $pricing->priceToPatient,
]);

            }

            // Optional: Update overall requisition status if all items fully received
            $this->updateRequisitionStatusHospital($requisitionId);

            DB::commit();

            return response()->json([
                'message' => 'Items successfully received into stock',
                'data' => [
                    'requisitionId' => $requisitionId,
                    'receivedCount' => count($updates)
                ]
            ], 200);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to receive items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function updateRequisitionStatusHospital(string $requisitionId)
    {
        $items = RequisitionItem::where('requisitionId', $requisitionId)->get();

        $allReceived = $items->every(fn($item) =>
            ($item->quantityReceived ?? 0) >= ($item->quantityDispatched ?? 0)
        );

        if ($allReceived) {
            $requisition = \App\Models\Requisition::where('requisitionId', $requisitionId)->first();
            if ($requisition) {
                $requisition->status = 'RECEIVED'; // or 'COMPLETED'
                $requisition->save();
            }
        }
    }
}



