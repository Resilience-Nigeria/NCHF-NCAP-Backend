<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DistributorController extends Controller
{
    public function index()
    {
        // This method should return a list of distributors
        $distributors = Distributors::with('manufacturers.manufacturer')->get();
        if (!$distributors) {
            return response()->json(['message' => 'No distributors found'], 404);
        }
        return response()->json($distributors);
    }


    public function show($id)
    {
        // This method should return a specific cancer by ID
        $distributor = Distributors::with('map.manufacturers')->find($id);
        if (!$distributor) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }
        return response()->json($distributor);
    }

   public function store(Request $request)
{
    // This method should create a new distributor
    $validated = $request->validate([
        'distributorName' => 'required|string|max:255',
    ]);

    $distributor = Distributors::create([
        'distributorName' => $validated['distributorName'],
    ]);

    return response()->json($distributor, 201);
}

public function update(Request $request, $id)
{
    // This method should update an existing distributor
    $distributor = Distributors::find($id);
    if (!$distributor) {
        return response()->json(['message' => 'Distributor not found'], 404);
    }

    $validated = $request->validate([
        'distributorName' => 'sometimes|required|string|max:255',
    ]);

    $distributor->update($validated);

    return response()->json($distributor);
}

public function destroy($id)
{
    // This method should delete a distributor
    $distributor = Distributors::find($id);
    if (!$distributor) {
        return response()->json(['message' => 'Distributor not found'], 404);
    }

    $distributor->delete();

    return response()->json(['message' => 'Distributor deleted successfully']);

}

public function addStaff(Request $request, $distributorId)
{
    $distributor = Distributors::find($distributorId);
    if (!$distributor) {
        return response()->json(['message' => 'Distributor not found'], 404);
    }

    $validated = $request->validate([
        'staffId' => 'required|exists:users,id',
    ]);

    // Assuming a many-to-many relationship
    $distributor->staff()->attach($validated['staffId']);

    return response()->json(['message' => 'Staff added to distributor successfully']);
}

public function removeStaff(Request $request, $distributorId)
{
    $distributor = Distributors::find($distributorId);
    if (!$distributor) {
        return response()->json(['message' => 'Distributor not found'], 404);
    }

    $validated = $request->validate([
        'staffId' => 'required|exists:users,id',
    ]);

    // Assuming a many-to-many relationship
    $distributor->staff()->detach($validated['staffId']);

    return response()->json(['message' => 'Staff removed from distributor successfully']);
}

public function distributorStaff(Request $request)
{
    $distributorId = $request->input('distributorId');

    // Retrieve staff who belong to the specified distributor
    $staff = DistributorStaff::where('distributorId', $distributorId)
        ->with(['user', 'distributor'])
        ->orderBy('updated_at', 'desc')
        ->get();

    return response()->json($staff);
}




}
