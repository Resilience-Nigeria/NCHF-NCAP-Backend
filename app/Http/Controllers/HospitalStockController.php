<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalStock;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class HospitalStockController extends Controller
{
     public function index()
    {
        $stocks = HospitalStock::with('product', 'lga_info')->get();
        return response()->json($stocks);
       
    }


     public function hospitalStocks()
    {
        $user = auth()->user();
        // $hospitalId = $user->staff->hospitalId;
        $hospitalId = 1;
        $stocks = HospitalStock::with('requisition_item.warehouse_stock.product_pricelist.product', 'requisition_item.warehouse_stock.product_pricelist.manufacturer', 'requisition_item.warehouse_stock.product_pricelist.distributor', 'received_by')
        ->where('hospitalId', $hospitalId)
        ->get();
        return response()->json($stocks);
       
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'productId' => 'required|string|exists:products,productId',
        'quantityReceived' => 'required|integer|min:1',
    ]);
    $user = auth()->user();
    $stock = HospitalStock::create([
        'productId' => $validated['productId'],
        'quantityReceived' => $request->quantityReceived,
        'lgaId' => $user->staff->lga,
        'receivedBy' => $user->id,
    ]);

    // Load the product relationship to include productName in the response
    $stock->load('product');

    return response()->json([
        'stockId' => $stock->stockId,
        'productId' => $stock->productId,
        'quantityReceived' => $stock->quantityReceived,
        'product' => $stock->product ? [
            'productName' => $stock->product->productName
        ] : null
    ], 201);
}

   public function update(Request $request, $stockId)
{
    $validated = $request->validate([
        'productId' => 'required|string|exists:products,productId',
        'quantityReceived' => 'required|integer|min:1',
    ]);

    $stock = HospitalStock::where('stockId', $stockId)->first();
    if (!$stock) {
        return response()->json(['message' => 'HospitalStock type not found'], 404);
    }

    $stock->update($validated);
    
     $stock->load('product');

    return response()->json([
        'stockId' => $stock->stockId,
        'productId' => $stock->productId,
        'quantityReceived' => $stock->quantityReceived,
        'product' => $stock->product ? [
            'productName' => $stock->product->productName
        ] : null
    ], 200);
}

    public function destroy($stockId)
    {
        $stock = HospitalStock::where('stockId', $stockId)->first();
        if (!$stock) {
            return response()->json(['message' => 'HospitalStock type not found'], 404);
        }

        $stock->delete();
        return response()->json(['message' => 'HospitalStock type deleted successfully'], 200);
    }
    // public function show($stockId)
    // {
    //     $stock = HospitalStock::where('stockId', $stockId)->first();
    //     if (!$stock) {
    //         return response()->json(['message' => 'HospitalStock type not found'], 404);
    //     }
    //     return response()->json($stock);
    // }
   
}
