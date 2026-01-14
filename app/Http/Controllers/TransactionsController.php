<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\TransactionItems;
use App\Models\Beneficiary;
use App\Models\TransactionProducts;
use App\Models\PendingTransactions;
use App\Models\Products;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\HospitalEscrowAccount;
use App\Models\HospitalStock;
use Illuminate\Validation\Rule;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transactions::with('patient_details', 'createdBy', 'approvedBy', 'hospital', 'transaction_items.products')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($transactions);
    }
    public function show($transactionId)
    {
        $transaction = Transactions::find($transactionId);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        return response()->json($transaction);
    }

    public function searchPatient(Request $request){
        $search = $request->query('search');
        $patient = Patient::where('firstName', 'LIKE', "%{$search}%")
        ->orWhere('lastName', 'LIKE', "%{$search}%")
        ->orWhere('patientId', 'LIKE', "%{$search}%")
        ->orWhere('phoneNumber', 'LIKE', "%{$search}%")
        ->orWhere('hospitalFileNumber', 'LIKE', "%{$search}%")
        ->get();
        return response()->json($patient);
    }
    

    public function getEscrowAccounts()
    {
        $user = auth()->user();
        $hospitalId = $user->staff->hospitalId;
        $escrowAccounts = HospitalEscrowAccount::where('hospitalId', $hospitalId)->get();
        return response()->json($escrowAccounts);
    }
    
public function initiate(Request $request): JsonResponse
{
    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'beneficiaryId' => 'required|exists:beneficiaries,beneficiaryId',
        'products' => 'required|array|min:1',
        'products.*.productId' => 'required|exists:products,productId',
        'products.*.quantity' => 'required|integer|min:1',
        'paymentMethod' => 'required|in:outright,loan',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        // Check authentication early
        $user = auth()->user();
        if (!$user || !$user->staff) {
            throw new \Exception('Authenticated user or staff data not found');
        }

        // Calculate total cost and validate stock
        $products = $request->products;
        $totalCost = 0;
        $validatedProducts = [];

        foreach ($products as $product) {
            $productId = $product['productId'];
            $quantity = $product['quantity'];

            $productModel = Products::findOrFail($productId);
            $stock = Stock::where('productId', $productId)->firstOrFail();
            $availableStock = $stock->quantityReceived - ($stock->quantitySold ?? 0);

            if ($quantity > $availableStock) {
                throw new \Exception("Insufficient stock for product ID {$productId}. Available: {$availableStock}, Requested: {$quantity}");
            }

            $totalCost += $productModel->cost * $quantity;
            $validatedProducts[] = [
                'productId' => $productId,
                'quantity' => $quantity,
                'cost' => $productModel->cost,
                'stock' => $stock,
            ];
        }

        // Generate a unique transaction ID
        $transactionId = Str::random(12);

        if ($request->paymentMethod === 'outright') {
            // $totalCostInKobo = $totalCost * 100; // Convert to kobo

              $moniepointResponse = Http::withOptions([
    'verify' => false,
])->withHeaders([
        'Authorization' => 'Bearer mptp_a72e62d6220b4c279f05f0d90c71f79b_cce5ff',
        'Cookie' => '__cf_bm=llJAllZZ4ww_EAgd7WsHAiW9Xhdt5tOKkWsvByK6X2c-1750629087-1.0.1.1-2zOUQHrb5PyiYLrXqoA6kiONrHhKIZ2z7ifHO.iSk1Ue539LjL8bhuUWeZ7RaafQfCvMnh9Ke08Ks7Kkt4k0T2H0uJb89.aTwZt52.qkpyM'
    ])->post('https://api.pos.moniepoint.com/v1/transactions', [
        'terminalSerial' => 'P260302358597',
        'amount' => $totalCost,
        'merchantReference' => $transactionId,
        'transactionType' => 'PURCHASE',
        'paymentMethod' => 'CARD_PURCHASE'
    ]);

            // if ($moniepointResponse->successful() && $moniepointResponse->json('status') === 'success') {
            //     \Log::info('Moniepoint payment successful', [
            //         'transactionId' => $transactionId,
            //         'totalCost' => $totalCost,
            //     ]);

            if ($moniepointResponse->status() === 202) {

   

    // return response()->json([
        // 'status' => 'success',
        // 'message' => 'Payment request accepted by Moniepoint.',
        // 'moniepointStatus' => $moniepointResponse->status(),
        // 'moniepointDescription' => 'Accepted'
    // ], 202);

                return DB::transaction(function () use ($transactionId, $request, $validatedProducts, $totalCost, $user) {
                    // Store in PendingTransactions
                    $pendingTransaction = PendingTransactions::create([
                        'transactionId' => $transactionId,
                        'beneficiaryId' => $request->beneficiaryId,
                        'paymentMethod' => $request->paymentMethod,
                        'products' => json_encode($validatedProducts),
                        'totalCost' => $totalCost,
                        'status' => 'completed',
                    ]);

                    // Create the transaction
                    $transaction = Transactions::create([
                        'transactionId' => $transactionId,
                        'beneficiary' => $pendingTransaction->beneficiaryId,
                        'paymentMethod' => $pendingTransaction->paymentMethod,
                        'lga' => $user->staff->lga,
                        'soldBy' => $user->id,
                        'status' => $pendingTransaction->status,
                    ]);

                    // Process products
                    $transactionProducts = [];
                    foreach ($validatedProducts as $product) {
                        $transactionProducts[] = [
                            'transactionId' => $transactionId,
                            'productId' => $product['productId'],
                            'quantitySold' => $product['quantity'],
                            'cost' => $product['cost'],
                        ];

                        // Update stock
                        $product['stock']->increment('quantitySold', $product['quantity']);
                    }

                    // Insert transaction products
                    TransactionProducts::insert($transactionProducts);

                    // Delete pending transaction
                    $pendingTransaction->delete();

                    // Fetch the transaction with related data
                    $transaction = Transactions::with(['beneficiary_info', 'transaction_products.products'])
                        ->where('transactionId', $transactionId)
                        ->firstOrFail();

                    // Format response
                    $response = [
                        'status' => 'success',
        'message' => 'Payment request accepted by Moniepoint.',
        'moniepointStatus' => 202,
        'moniepointDescription' => 'Accepted',
                        'id' => $transaction->id,
                        // 'beneficiary' => $transaction->beneficiary,
                        'beneficiary' => [
                            'firstName' => $transaction->beneficiary_info->firstName,
                            'lastName' => $transaction->beneficiary_info->lastName
                        ],
                        // 'beneficiary' => $transaction->beneficiary_info,
                        'transactionId' => $transaction->transactionId,
                        'lga' => $transaction->lga,
                        'soldBy' => $transaction->soldBy,
                        'paymentMethod' => $transaction->paymentMethod,
                        'status' => $transaction->status,
                        'created_at' => $transaction->created_at->toIso8601String(),
                        'updated_at' => $transaction->updated_at->toIso8601String(),
                        'transaction_products' => $transaction->transaction_products->map(function ($transactionProduct) {
                            return [
                                'id' => $transactionProduct->id,
                                'transactionId' => $transactionProduct->transactionId,
                                'productId' => $transactionProduct->productId,
                                'quantitySold' => $transactionProduct->quantitySold,
                                'cost' => $transactionProduct->cost,
                                'created_at' => $transactionProduct->created_at?->toIso8601String(),
                                'updated_at' => $transactionProduct->updated_at?->toIso8601String(),
                                'products' => [
                                    'productId' => $transactionProduct->products->productId,
                                    'productName' => $transactionProduct->products->productName ?? 'Unknown Product',
                                    'productType' => $transactionProduct->products->productType,
                                    'cost' => $transactionProduct->products->cost,
                                    'addedBy' => $transactionProduct->products->addedBy,
                                    'status' => $transactionProduct->products->status,
                                    'created_at' => $transactionProduct->products->created_at->toIso8601String(),
                                    'updated_at' => $transactionProduct->products->updated_at->toIso8601String(),
                                ],
                            ];
                        })->toArray(),
                    ];

                    return response()->json($response, 202);
                });
            } else {
                \Log::error('Moniepoint payment failed', [
                    'transactionId' => $transactionId,
                    'status' => $moniepointResponse->status(),
                    'body' => $moniepointResponse->body(),
                ]);

                return response()->json([
                    'status' => 'error',
                    'message' => $moniepointResponse->json('error', 'Payment request failed'),
                ], 422);
            }
        }

        // Handle loan payment method (if applicable)
        throw new \Exception('Loan payment method not implemented');
    } catch (\Exception $e) {
        \Log::error('Transaction initiation failed', [
            'error' => $e->getMessage(),
            'transactionId' => $transactionId ?? null,
        ]);

        return response()->json([
            'message' => 'Failed to initiate transaction',
            'error' => $e->getMessage(),
        ], 500);
    }
}

    
    public function update(Request $request, $transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $data = $request->all();
        $transaction->update($data);

        return response()->json([
            'message' => 'Transaction updated successfully',
            'transactionId' => $transaction->transactionId,
            'transactionName' => $transaction->transactionName], 201); // HTTP status code 201: Created

    }
    
    public function destroy($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted successfully']);
    }
    



    public function store(Request $request)
    {
        $validated = $request->validate([
            'patientId'      => 'required|exists:patients,patientId',
            'paymentMethod'  => 'required|in:cash,transfer',
            'items'           => 'required|array|min:1',
            'items.*.productId'   => 'required|exists:hospital_stocks,productId',
            'items.*.batchNumber' => 'required|string|max:50',
            'items.*.quantity'     => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            // 1. Verify patient exists and is active (optional business rule)
            $patient = Patient::where('patientId', $validated['patientId'])->first();
            // You might want to check if patient has any restrictions, etc.

            // 2. Create main transaction record
            $transaction = Transactions::create([
                'patientId'     => $patient->patientId,
                'hospitalId'    => auth()->user()->staff->hospitalId, // assuming authenticated hospital staff
                'createdBy'        => auth()->id(),                // who made the sale
                'totalAmount'   => 0,                           // will be calculated
                'paymentMethod' => $validated['paymentMethod'],
                'status'         => 'PENDING',                 // or 'pending' if you want approval flow
                'transactionNumber' => 'TRX-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6)),
                'created_at'     => now(),
                'transactionType'  => 'NCAP',
            ]);

            $totalAmount = 0;

            // 3. Process each item + update stock
            foreach ($validated['items'] as $itemData) {
                // Find exact stock batch
                $stock = HospitalStock::where([
                    'productId'   => $itemData['productId'],
                    'batchNumber' => $itemData['batchNumber'],
                ])
                ->where('quantityReceived', '>=', $itemData['quantity']) // or your stock column name
                ->where('hospitalId', auth()->user()->staff->hospitalId)
                ->first();

                if (!$stock) {
                    throw ValidationException::withMessages([
                        'items' => "Product ID {$itemData['productId']} - Batch {$itemData['batch_number']} not found or insufficient quantity."
                    ]);
                }

                $subtotal = $stock->priceToPatient * $itemData['quantity'];

                // Create transaction item
                TransactionItems::create([
                    'transactionId' => $transaction->transactionId,
                    'productId'     => $itemData['productId'],
                    'batchNumber'   => $itemData['batchNumber'],
                    'quantity'       => $itemData['quantity'],
                    'landedCost'     => $stock->landedCost,
                    'resilienceMarkup'     => $stock->resilienceMarkup,
                    'distributorMarkup'     => $stock->distributorMarkup,
                    'hospitalMarkup'     => $stock->hospitalMarkup,
                    'priceToPatient'     => $stock->priceToPatient,
                    'bankCharges'     => $stock->bankCharges,
                    'subTotal'       => $subtotal,
                    // 'expiry_date'    => $stock->expiryDate,
                ]);

                // Decrease stock (atomic)
                $stock->decrement('quantityReceived', $itemData['quantity']);
                // Optional: if quantity_received reaches 0 → mark as depleted / soft delete

                $totalAmount += $subtotal;
            }

            // 4. Update transaction total
            $transaction->update(['totalAmount' => $totalAmount]);

            DB::commit();

            return response()->json([
                'message' => 'Transaction completed successfully',
                'transaction' => $transaction->load('transaction_items'), // or just id
                'total_amount' => $totalAmount,
            ], 201);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to process transaction',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    public function updateStatus(Request $request, $transactionId)
    {
        // Find the transaction or fail
        $transaction = Transactions::where('transactionId', $transactionId)->first();

        // Optional: Authorization check (e.g., ensure user can update this transaction)
        // $this->authorize('update', $transaction);

        // Validate the request data
        // $validated = $request->validate([
        //     'status' => [
        //         'required',
        //         'string',
        //         Rule::in(['PENDING', 'COMPLETED']), // Restrict to allowed statuses
        //     ],
        // ]);

        // Update the status and other fields if needed
        $transaction->status = "PAID";

        // Optional: Set approved_by and approved_at if status is 'completed'
        if ($transaction->status === 'PAID') {
            $transaction->approvedBy = Auth::id(); // Assuming authenticated user
            $transaction->approvedAt = now();
        }

        // Save the changes
        $transaction->save();

        // Return success response
        return response()->json([
            'message' => 'Transaction status updated successfully',
            'data' => $transaction,
        ], 200);
    }
    
}
