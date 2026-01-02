<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    // public function index()
    // {
    //     // This method should return a list of cancers
    //     $cancers = Cancer::all();
    //     if ($cancers->isEmpty()) {
    //         return response()->json(['message' => 'No cancers found'], 404);
    //     }
    //     return response()->json($cancers);
    // }


    public function index(Request $request)
{
    $perPage = $request->query('per_page', 10);

    $query = Patient::with('hospital')->orderBy('id', 'desc');

    $patients = $query->paginate($perPage);

    return response()->json($patients);
}



     public function store(Request $request)
        {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'otherNames' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:patients,email',
            'phoneNumber' => 'nullable|string|max:20',
            'dateOfBirth' => 'nullable|date',
            'stateOfOrigin' => 'required|exists:states,stateId',
            'stateOfResidence' => 'required|exists:states,stateId',
            'diseaseType' => 'required|exists:cancers,cancerId',
            'gender' => 'nullable|in:Male,Female',
            'maritalStatus' => 'nullable|in:Married,Single,Divorced,Widow,Widower',
            'hospitalFileNumber' => 'required|string|max:255|unique:patients,hospitalFileNumber',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Assuming the user has a hospital_id field or a relationship to a hospital
        // $hospitalId = $user->hospitalId;
        $hospitalId = $user->hospital_staff->hospitalId; // Adjust based on your user model structure

        $hospitalName = $user->hospital_staff->hospital->acronym ?? null;

        if (!$hospitalId) {
            return response()->json([
                'error' => 'Authenticated user is not associated with a hospital.',
            ], 403);
        }

        // Create the patient record
        $patient = Patient::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'otherNames' => $request->otherNames,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'dateOfBirth' => $request->dateOfBirth,
            'stateOfOrigin' => $request->stateOfOrigin,
            'stateOfResidence' => $request->stateOfResidence,
            'diseaseType' => $request->diseaseType,
            'gender' => $request->gender,
            'maritalStatus' => $request->maritalStatus,
            'hospitalFileNumber' => $request->hospitalFileNumber,
            'hospitalId' => $hospitalId,
            'status' => 'active', // Default status
        ]);

       $update = Patient::where('id', $patient->id)->update([
    'patientId' => $hospitalName . str_pad($patient->id, 6, '0', STR_PAD_LEFT),
]);


        // Return the created patient
        return response()->json([
            'message' => 'Patient created successfully',
           $patient,
        ], 201);
    }

   public function edit(Request $request, $cancerId)
{
    $validated = $request->validate([
        'cancerName' => 'required|string|max:255',
    ]);

    $cancer = Cancer::where('cancerId', $cancerId)->first();
    if (!$cancer) {
        return response()->json(['message' => 'Cancer type not found'], 404);
    }

    $cancer->update($validated);
    
    return response()->json([
        'cancerId' => $cancer->cancerId,
        'cancerName' => $cancer->cancerName
    ], 200);
}

    public function destroy($cancerId)
    {
        $cancer = Cancer::where('cancerId', $cancerId)->first();
        if (!$cancer) {
            return response()->json(['message' => 'Cancer type not found'], 404);
        }

        $cancer->delete();
        return response()->json(['message' => 'Cancer type deleted successfully'], 200);
    }
    public function show($cancerId)
    {
        $cancer = Cancer::where('cancerId', $cancerId)->first();
        if (!$cancer) {
            return response()->json(['message' => 'Cancer type not found'], 404);
        }
        return response()->json($cancer);
    }
   
}
