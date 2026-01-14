<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use App\Models\ProductPriceList;
use Illuminate\Support\Facades\DB;




class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::with('distributor', 'manufacturer')->get();
        return response()->json($warehouses);

    }



    public function store(Request $request)
    {
        // Directly get the data from the request
        $validatedData = $request->validate([
            'warehouseName' => 'required|string|max:255',
            'warehouseLocation' => 'nullable|string|max:255',
            'distributor' => 'nullable|integer|exists:distributors,distributorId',
            'manufacturer' => 'nullable|integer|exists:manufacturers,manufacturerId',
            
        ]);

        $validatedData['status'] = 'ACTIVE';
        $warehouse = Warehouse::create($validatedData);

        // Return a response, typically JSON
        return response()->json($warehouse, 201); // HTTP status code 201: Created
    }


    public function addWarehouseStock(Request $request)
    {
      
        // Directly get the data from the request
        $validatedData = $request->validate([
            'warehouseId' => 'required|integer|exists:warehouses,warehouseId',
            'productId' => 'required|integer|exists:product_price_list,id',
            'quantityAvailable' => 'required|integer',
            'quantityReserved' => 'nullable|integer',
            'manufacturerId' => 'nullable|integer|exists:manufacturers,manufacturerId',
            'distributorId' => 'nullable|integer|exists:distributors,distributorId',
            'batchNumber' => 'nullable|string|max:255',
            'expiryDate' => 'nullable|date',
        ]);

         $getUnitPrice = ProductPriceList::where('id', $validatedData['productId'])->first();
        
        $validatedData['status'] = 'IN_STOCK';
        $warehouseStock = WarehouseStock::create([
            'warehouse' => $validatedData['warehouseId'],
            'product' => $validatedData['productId'],
            'initialQuantity' => $validatedData['quantityAvailable'],
            'quantityAvailable' => $validatedData['quantityAvailable'],
            'quantityReserved' => $validatedData['quantityReserved'] ?? 0,
            'manufacturer' => $validatedData['manufacturerId'] ?? null,
            'distributor' => $validatedData['distributorId'] ?? null,
            'status' => $validatedData['status'],
            'batchNumber' => $validatedData['batchNumber'] ?? null,
            'expiryDate' => $validatedData['expiryDate'] ?? null,
            'createdBy' => auth()->id() ?? null,
            'updatedBy' => auth()->id() ?? null,
            'landedCost' => $getUnitPrice->landedCost ?? null,
        ]);

        // Return a response, typically JSON
        return response()->json($warehouseStock, 201); // HTTP status code 201: Created
    }


    public function getWarehouseStock(Request $request)
    {
        $warehouseStocks = WarehouseStock::with('distributor', 'manufacturer', 'product_pricelist.product')
            ->where('warehouse', $request->warehouseId)
            ->where('product', $request->productId)
            ->get();
        return response()->json($warehouseStocks);
    }

//     public function summary($warehouseId)
// {
//     $stocks = WarehouseStock::query()
//         ->select(
//             'product',
//             DB::raw('SUM(quantityAvailable) as totalAvailable'),
//             DB::raw('SUM(quantityReserved) as totalReserved')
//         )
//         ->where('warehouse', $warehouseId)
//         ->where('quantityAvailable', '>', 0)
//         // ->where('expiryDate', '>', now()) // optional but recommended
//         ->groupBy('product')
//         ->with('product:productId,productName') // eager load product
//         ->get();

//     return response()->json($stocks);
// }

public function summary($warehouseId)
{
    $stocks = WarehouseStock::query()
        ->join('products', 'products.productId', '=', 'warehouse_stocks.product')
        ->join('manufacturers', 'warehouse_stocks.manufacturer', '=', 'manufacturers.manufacturerId')
        ->select(
            'manufacturers.manufacturerName',
            'warehouse_stocks.product',
            'products.productName',
            'products.productDescription',
            DB::raw('SUM(warehouse_stocks.quantityAvailable) as totalAvailable'),
            DB::raw('SUM(warehouse_stocks.quantityReserved) as totalReserved')
        )
        ->where('warehouse_stocks.warehouse', $warehouseId)
        ->where('warehouse_stocks.quantityAvailable', '>', 0)
        ->groupBy(
            'warehouse_stocks.product',
            'products.productName',
            'products.productDescription',
            'manufacturers.manufacturerName'
        )
        ->get();

    return response()->json($stocks);
}



public function allStocksInWarehouses()
{
    $stocks = WarehouseStock::with('warehouse', 'product_pricelist.product', 'manufacturer', 'distributor')
        ->where('quantityAvailable', '>', 0)
        ->get();

    return response()->json($stocks);

}






}