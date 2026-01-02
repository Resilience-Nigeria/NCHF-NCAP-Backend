<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
class HospitalController extends Controller
{
   public function index(Request $request)
{
    $perPage = $request->query('per_page', 10);
    $search = $request->query('search');

    // Start with query builder (not paginate yet)
    $query = Hospital::with('hospital_location')->orderBy('hospitalId', 'desc');

    // Apply search filter if provided
    if ($search) {
        $query->where('hospitalName', 'LIKE', "%{$search}%");
    }

    // Now paginate after applying all filters
    $hospitals = $query->paginate($perPage);

    return response()->json($hospitals);
}







 public function store(Request $request)
    {
       $validated = $request->validate([
            'acronym' => 'required|string|max:255',
            'hospitalName' => 'required|string|max:255',
            'location' => 'nullable|max:255',
            // 'contactPerson' => 'nullable|max:255',

        ]);
        $validated['status'] = 'active';
        $validated['location'] = $request->locationId;
        $hospitals = Hospital::create($validated);
        $hospitals->load(['hospital_location']);
        return response()->json([
            'hospitalId' => $hospitals->hospitalId,
            'acronym' => $hospitals->acronym,
            'hospitalName' => $hospitals->hospitalName,
            // 'contactPerson' => $hospitals->contactPerson,
            // 'contactPerson' => $hospitals->contactPerson ? $hospitals->contact_person->firstName : null,
            'location' => $hospitals->location ? $hospitals->hospital_location->stateName : null,
    ], 201); // HTTP status code 201: Created

    }





}
