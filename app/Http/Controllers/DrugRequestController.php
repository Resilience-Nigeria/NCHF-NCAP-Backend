<?php

namespace App\Http\Controllers;

use App\Models\DrugRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class DrugRequestController extends Controller
{
    /**
     * Store a new drug request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */


        public function index(Request $request)
{
    $perPage = $request->query('per_page', 10);

    $query = DrugRequest::with('product_price_list.products', 'hospital')->orderBy('requestId', 'desc');

    $requests = $query->paginate($perPage);

    return response()->json($requests);
}

    public function store(Request $request): JsonResponse
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'productRequestItems' => 'required|array|min:1',
            'productRequestItems.*.productPriceId' => 'required|exists:product_price_list,id',
            'productRequestItems.*.quantityRequested' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Assuming the user has a hospital_id field
        $hospitalId = $user->hospital_id; // Adjust based on your user model structure

        if (!$hospitalId) {
            return response()->json([
                'error' => 'Authenticated user is not associated with a hospital.',
            ], 403);
        }

        $requests = [];
        $requestNumber = 'REQ-' . Str::random(8); // Generate a unique request number

        // Create a DrugRequest record for each item in the cart
        foreach ($request->productRequestItems as $item) {
            $drugRequest = DrugRequest::create([
                'requestNumber' => $requestNumber,
                'productPriceId' => $item['productPriceId'],
                'quantityRequested' => $item['quantityRequested'],
                'hospitalId' => $hospitalId,
                'requestedBy' => $user->id,
                'status' => 'active',
            ]);

            $requests[] = [
                'requestId' => $drugRequest->requestId,
                'requestNumber' => $drugRequest->requestNumber,
                'hospital' => $drugRequest->hospital ? [
                    'hospitalId' => $drugRequest->hospitalId,
                    'hospitalName' => $drugRequest->hospital->hospitalName,
                ] : null,
                'status' => $drugRequest->status,
                'createdAt' => $drugRequest->created_at->toISOString(),
            ];
        }

        return response()->json([
            'message' => 'Drug requests created successfully',
            'requests' => $requests,
        ], 201);
    }
}
