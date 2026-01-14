<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPriceList;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
       public function index(Request $request)
{
    $perPage = $request->query('per_page', 10);
    $search = $request->query('search');

    // Start with query builder (not paginate yet)
    $query = Product::with('product_type', 'uploaded_by')->orderBy('productId', 'desc');

    // Apply search filter if provided
    if ($search) {
        $query->where('productName', 'LIKE', "%{$search}%");
    }

    // Now paginate after applying all filters
    $products = $query->paginate($perPage);

    return response()->json($products);
}


public function productPriceList()
    {
        $product = ProductPriceList::with('product', 'manufacturer', 'supplier', 'createdby', 'updatedby')->get();
        return response()->json($product);
    }

    public function pricedProducts()
    {
        $product = ProductPriceList::with('product', 'manufacturer', 'distributor', 'supplier', 'createdby', 'updatedby')
        ->where('status', 'active')
        ->get();
        return response()->json($product);
    }

      public function productTypes()
    {
        $productTypes = ProductType::all();
        return response()->json($productTypes);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
        'productName' => 'required|string|max:255',
        'productDescription' => 'required|string|max:255',
        'productType' => 'required|integer|exists:product_types,typeId',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
    ]);

        // Create a new user with the data (ensure that the fields are mass assignable in the model)
        $validatedData['uploadedBy'] = auth()->user()->id; // Assuming the user is authenticated and you want to set the addedBy field to the current user's ID
        $products = Product::create($validatedData);


        $products->load(['product_type', 'uploaded_by']);
        return response()->json([
            'productId' => $products->productId,
            'productName' => $products->productName,
            'productType' => $products->product_type->typeName,
            'uploadedBy' => $products->uploaded_by->firstName . ' ' . $products->uploaded_by->lastName,
        ], 201); // HTTP status code 201: Created
    }


    public function update(Request $request, $productId)
    {
        // Find the product by ID
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'error' => 'Product not found',
            ]);
        }

        $data = $request->all();
        $product->update($data);
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product,
        ], 200);
    }


    // Delete Product
    public function deleteProduct($productId){
        $product = Product::find($productId);
    if ($product) {
    $product->delete();
    return response()->json([
        'message' => 'Product deleted successfully',
    ], 200);
    } else {
        return response()->json([
            'error' => 'Product not found',
        ]);
    }
    }


    // Pricelist Methods
    public function storeProductPriceList(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
        'productId' => 'required|integer|exists:products,productId',
        'manufacturerId' => 'required|integer|exists:manufacturers,manufacturerId',
        'supplierId' => 'nullable|integer|exists:distributors,distributorId',
        'landedCost' => 'required|numeric',
        'hospitalMarkup' => 'required|numeric',
        'resilienceMarkup' => 'required|numeric',
        'bankCharges' => 'nullable|numeric',
        'priceToPatient' => 'required|numeric',
    ]);

        // Create a new user with the data (ensure that the fields are mass assignable in the model)
        $productPriceList = ProductPriceList::create([
            'productId' => $validatedData['productId'],
            'manufacturer' => $validatedData['manufacturerId'],
            'distributor' => $validatedData['supplierId'],
            'landedCost' => $validatedData['landedCost'],
            'distributorMarkup' => $validatedData['hospitalMarkup'],
            'resilienceMarkup' => $validatedData['resilienceMarkup'],
            'hospitalMarkup' => $validatedData['hospitalMarkup'],
            'bankCharges' => $validatedData['bankCharges'] ?? 0,
            'priceToPatient' => $validatedData['priceToPatient'],
            'createdBy' => Auth::id(),
            'status' => 'active',
        ]);

        return response()->json([
            'message' => 'Product Price List created successfully',
            'data' => $productPriceList,
        ], 201); // HTTP status code 201: Created
    }

}
