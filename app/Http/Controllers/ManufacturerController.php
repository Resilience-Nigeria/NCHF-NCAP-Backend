<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturers;
use App\Models\ManufacturerStaff;
use App\Models\ManufacturerDistributor;
use App\Models\Distributors;
class ManufacturerController extends Controller
{
    public function index()
    {
        // This method should return a list of cancers
        $manufacturers = Manufacturers::with('map.distributors')->get();
        if (!$manufacturers) {
            return response()->json(['message' => 'No manufacturers found'], 404);
        }
        return response()->json($manufacturers);
    }

    public function show($manufacturerId)
    {
        $manufacturer = Manufacturers::find($manufacturerId);
        if (!$manufacturer) {
            return response()->json(['message' => 'Manufacturer not found'], 404);
        }
        return response()->json($manufacturer);
    }

    public function store(Request $request)
    {
        // Directly get the data from the request
        $data = $request->all();

        // Create a new user with the data (ensure that the fields are mass assignable in the model)
        $manufacturers = Manufacturers::create($data);

        // Return a response, typically JSON
        return response()->json([
            'message' => 'Manufacturer created successfully',
            'manufacturerId' => $manufacturers->manufacturerId,
            'manufacturerName' => $manufacturers->manufacturerName], 201); // HTTP status code 201: Created
    }

    public function update(Request $request, $ministryId)
    {
        $ministry = Ministry::find($ministryId);
        if (!$ministry) {
            return response()->json(['message' => 'Ministry not found'], 404);
        }

        $data = $request->all();
        $ministry->update($data);

        return response()->json([
            'message' => 'Ministry updated successfully',
            'ministryId' => $ministry->ministryId,
            'ministryName' => $ministry->ministryName], 201); // HTTP status code 201: Created

    }

    public function destroy($ministryId)
    {
        $ministry = Ministry::find($ministryId);
        if (!$ministry) {
            return response()->json(['message' => 'Ministry not found'], 404);
        }

        $ministry->delete();
        return response()->json(['message' => 'Ministry deleted successfully']);
    }

    public function manufacturerStaff(Request $request)
    {
        $manufacturerId = $request->manufacturerId;

        // Retrieve staff who belong to the specified manufacturer
        $staff = ManufacturerStaff::where('manufacturerId', $manufacturerId)
            ->with(['staff', 'manufacturer'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json($staff);
    }

    public function addManufacturerStaff(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'userId' => 'required|exists:users,id',
            'manufacturerId' => 'required|exists:manufacturers,manufacturerId',
        ]);

        // Create a new ManufacturerStaff record
        // $data['staffId'] = $request->input('userId');
        $manufacturerStaff = ManufacturerStaff::create([
            'manufacturerId' => $data['manufacturerId'],
            'staffId' => $data['userId'],
        ]);

        return response()->json([
            'message' => 'Staff added to manufacturer successfully',
            'manufacturerStaffId' => $manufacturerStaff->id
        ], 201); // HTTP status code 201: Created
    }


    public function manufacturerDistributor(Request $request)
    {
        $manufacturerId = $request->manufacturerId;

        // Retrieve distributors who are linked to the specified manufacturer
        $distributors = ManufacturerDistributor::where('distributorFor', $manufacturerId)
            ->with('supplier')
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json($distributors);
    }

    public function addManufacturerDistributor(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'supplierId' => 'required|exists:distributors,distributorId',
            // 'distributorFor' => 'required|exists:manufacturers,manufacturerId',
        ]);

        // Create a new ManufacturerDistributor record

        // $manufacturerDistributor = ManufacturerDistributor::create($data);
        $manufacturerDistributor = ManufacturerDistributor::create([
            'distributor' => $data['supplierId'],
            'distributorFor' => $request->manufacturerId,
        ]);
        return response()->json([
            'message' => 'Distributor added to manufacturer successfully',
            // 'manufacturerDistributorId' => $manufacturerDistributor->id
        ], 201); // HTTP status code 201: Created
    }
}
