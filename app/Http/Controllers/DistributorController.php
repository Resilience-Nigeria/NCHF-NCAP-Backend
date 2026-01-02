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
        // This method should return a list of cancers
        $distributors = Distributors::with('map.manufacturers')->get();
        if (!$distributors) {
            return response()->json(['message' => 'No distributors found'], 404);
        }
        return response()->json($distributors);
    }





}
