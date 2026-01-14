<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return response()->json($states);

    }


//        public function index(Request $request)
// {
//     $perPage = $request->query('per_page', 40);
//     $search = $request->query('search');

//     // Start with query builder (not paginate yet)
//     $query = State::orderBy('stateName', 'asc');

//     // Apply search filter if provided
//     if ($search) {
//         $query->where('stateName', 'LIKE', "%{$search}%");
//     }

//     // Now paginate after applying all filters
//     $states = $query->paginate($perPage);

//     return response()->json($states);
// }


public function store(Request $request)
{
    $validated = $request->validate([
        '*.stateName' => 'required|string|max:255|distinct|unique:states,stateName',
    ]);

    $statesData = collect($validated)->map(fn ($state) => [
        'stateName' => $state['stateName'],
        'created_at' => now(),
        'updated_at' => now(),
    ])->toArray();

    State::insert($statesData);

    return response()->json([
        'message' => 'States created successfully'
    ], 201);
}


}
