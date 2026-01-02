<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnersController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::orderBy('partnerId', 'desc')->get();
        return response()->json($partners);
    }



    public function store(Request $request)
    {
        // Directly get the data from the request
        $data = $request->all();

        // Create a new cadre with the data (ensure that the fields are mass assignable in the model)
        $data['isActive'] = 1;
        $hall = Partner::create($data);

        // Return a response, typically JSON
        return response()->json($hall, 201); // HTTP status code 201: Created
    }

    public function update(Request $request, $hallId)
    {
        $hall = Halls::where('hallId', $hallId)->first();
        if (!$hall) {
            return response()->json(['message' => 'Hall not found'], 404);
        }

        $data = $request->all();
        $hall->update($data);

        return response()->json([
            'message' => 'hall updated successfully',
            'hallId' => $hall->hallId,
            'hallName' => $hall->hallName,
            'capacity' => $hall->capacity,
        ], 200); // HTTP status code 200: OK
    }

    public function changeStatus(Request $request, $hallId)
    {
        $hall = Halls::where('hallId', $hallId)->first();
        if (!$hall) {
            return response()->json(['message' => 'Hall not found'], 404);
        }

        $status = $request->isActive;
        $hall->update(['isActive' => $status]);

        return response()->json([
            'message' => 'Hall updated successfully',
            'hallId' => $hall->hallId,
            'hallName' => $hall->hallName,
            'capacity' => $hall->capacity,
            'isActive' => $hall->isActive,
        ], 200); // HTTP status code 200: OK
    }

    public function destroy($hallId)
    {
        $hall = Halls::find($hallId);
        if (!$hall) {
            return response()->json(['message' => 'hall not found'], 404);
        }

        $hall->delete();
        return response()->json(['message' => 'hall deleted successfully'], 200); // HTTP status code 200: OK
    }



}
