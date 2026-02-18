<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctors;
use App\Models\HMOs;
use App\Models\User;
use App\Models\HospitalStaff;
use App\Models\DoctorAssessment;
use App\Models\SocialWelfareAssessment;
use App\Models\MDTfareAssessment;
use App\Models\CMDAssessment;
use App\Models\NICRATAssessment;
use App\Models\ApplicationReview;
use App\Models\Billing;
use App\Models\PatientReferral;
use App\Models\PatientReferralService;
use App\Models\PatientTransfer;
use App\Models\Hospital;
use App\Models\Transactions;
use App\Models\Prescription;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\PrescriptionHistoryResource;

use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    public function NICRATRetrieveAll(Request $request)
    {
        $limit = $request->input('limit', 10);
        $searchQuery = $request->input('query');

        $patients = Patient::with('doctor', 'hmo')
            ->when($searchQuery, function ($query, $searchQuery) {
                $query->where('firstName', 'like', "%{$searchQuery}%")
                    ->orWhere('lastName', 'like', "%{$searchQuery}%")
                    ->orWhere('otherNames', 'like', "%{$searchQuery}%")
                    ->orWhere('phoneNumber', 'like', "%{$searchQuery}%")
                    ->orWhere('patientId', 'like', "%{$searchQuery}%")
                    ->orWhere('hospitalFileNumber', 'like', "%{$searchQuery}%")
                    ->orWhere('email', 'like', "%{$searchQuery}%")
                    ->orWhereRaw("CONCAT(firstName, ' ', lastName) LIKE ?", ["%{$searchQuery}%"])
                    ->orWhereRaw("CONCAT(firstName, ' ', lastName, ' ', otherNames) LIKE ?", ["%{$searchQuery}%"]);
            })
            ->orderBy('patientId', 'desc')
            ->paginate($limit);

        return response()->json([
            'data' => $patients->items(),
            'total' => $patients->total(),
            'current_page' => $patients->currentPage(),
            'last_page' => $patients->lastPage(),
        ]);
    }


    public function RetrieveAll(Request $request){
        $patients = Patient::with('user', 'hospital', 'cancer', 'stateOfOrigin', 'doctor')->get();
        return $patients;

    }


    public function ncapEnrolledPatients()
    {
        $patients = Patient::with('user', 'hospital', 'cancer', 'stateOfOrigin', 'stateOfResidence')
        ->where('patientType', 'NCAP')
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json($patients);
    }


    public function generateCustomID() {
        // Generate 9 random digits
        $numbers = substr(str_shuffle("0123456789"), 0, 9);

        // Generate 1 random uppercase letter
        $letter = chr(rand(65, 90)); // ASCII values for A-Z

        // Combine them
        return $numbers . $letter;
    }

    public function ncapPatientEnrolment(Request $request)
{
    $validated = $request->validate([
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'otherNames' => 'nullable|string',
        'phoneNumber' => 'required|string',
        'email' => 'nullable|string',
        'dateOfBirth' => 'nullable|string',
        'gender' => 'nullable|string',
        'stateOfOrigin' => 'nullable|integer',
        'stateOfResidence' => 'nullable|integer',
        'hospitalFileNumber' => 'nullable|string',
        'cancerType' => 'nullable|integer',
    ]);
    $user = auth()->user();
    $getHospital = Hospital::where('hospitalId', $user->staff->hospitalId)->first();


    $uniqueID = $this->generateCustomID();

    $default_password = "password";
    $patient_user_account = User::create([
        'firstName' => $validated['firstName'],
        'lastName' => $validated['lastName'],
        'otherNames' => $validated['otherNames'] ?? null,
        'phoneNumber' => $validated['phoneNumber'],
        'email' => $validated['email'] ?? null,
        'role' => 1,
        'password' => Hash::make($default_password),
    ]);

    $patient = Patient::create([
        // 'hospitalId' => auth()->user()->hospitalId,
        'hospitalId' => $user->staff->hospitalId, // Temporary hardcoded value; replace with actual hospital ID from authenticated user
        'lastName' => $validated['lastName'],
        'firstName' => $validated['firstName'],
        'otherNames' => $validated['otherNames'] ?? null,
        'phoneNumber' => $validated['phoneNumber'],
        'requestedBy' => auth()->id(),
        'status' => 'active',
        'hospitalFileNumber' => $validated['hospitalFileNumber'] ?? null,
        'email' => $validated['email'] ?? null,
        'dateOfBirth' => $validated['dateOfBirth'] ?? null,
        'gender' => $validated['gender'] ?? null,
        'diseaseType' => $validated['cancerType'] ?? null,
        // 'stateOfOrigin' => $validated['stateOfOrigin'] ?? null,
        // 'stateOfResidence' => $validated['stateOfResidence'] ?? null,
        'cancerType' => $validated['cancerType'] ?? null,
        'patientType' => 'NCAP',
        'stateOfOrigin' => $validated['stateOfOrigin'] ?? null,
        'stateOfResidence' => $validated['stateOfResidence'] ?? null,
        'patientId' => "NCAP-{$getHospital->acronym}-$uniqueID",
        'userId' => $patient_user_account->id,
        'chfId' => "NCCHF-{$getHospital->acronym}-$uniqueID",
    ]);

 

    return response()->json(['message' => 'Patient submitted successfully', 'requisition' => $patient], 201);
}


public function showNcapPatient(Request $request)
    {
        // Optional: add policy/authorization check
        // $this->authorize('view', $patient);

        // if (!$patient->is_ncap) {
        //     return response()->json(['message' => 'Not an NCAP patient'], 404);
        // }
        // return "HH" .$request->patient;

         return $patient = Patient::when(is_numeric($request->patient), function ($query) use ($request) {
        $query->where('id', $request->patient);
    })
    ->orWhere('patientId', $request->patient)
    ->first();
if (!$patient) {
    return response()->json([
        'message' => 'Patient not found'
    ], 404);
}


        return response()->json([
            'id'                  => $patient->patientId,
            'hospitalFileNumber'  => $patient->hospitalFileNumber,
            'firstName'           => $patient->firstName,
            'lastName'            => $patient->lastName,
            'otherNames'          => $patient->otherNames,
            'gender'              => $patient->gender,
            'cancerStage'         => $patient->cancerStage ?? null,
            'hospital'            => $patient->hospital ? [
                'hospitalId'   => $patient->hospital->hospitalId,
                'hospitalName' => $patient->hospital->hospitalName,
            ] : null,
            // ... add more fields you need in frontend
        ]);
    }

    /**
     * Get prescription/return history for patient
     */
public function prescriptionHistory(Request $request)
{

    $perPage = $request->query('per_page', 15);
$getPatient = Patient::when(is_numeric($request->patient), function ($query) use ($request) {
        $query->where('id', $request->patient);
    })
    ->orWhere('patientId', $request->patient)
    ->first();
if (!$getPatient) {
    return response()->json([
        'message' => 'Patient not found'
    ], 404);
}

$transactions = Transactions::where('patientId', $getPatient->patientId)
        ->where('status', 'PAID')           // only successful purchases count as "returns"
        ->with(['transaction_items.products', 'created_by', 'hospital'])
        ->latest('updated_at')
        // ->get();
        ->paginate($perPage);

    // Transform each transaction into the exact format your frontend expects
    $formatted = $transactions->map(function ($transaction) {
        return [
            'id'              => $transaction->transactionId,
            'transactionDate' => $transaction->created_at?->toIso8601String() 
                               ?? $transaction->created_at?->toIso8601String(),
            'invoiceNumber'   => $transaction->invoice_number ?? null,
            'hospitalName' => $transaction->hospital->acronym,
            'totalAmount'     => (float) $transaction->totalAmount,
            'status'          => $transaction->status,
            'paymentMethod'   => $transaction->paymentMethod ?? null,
            'processedBy'     => $transaction->created_by 
                ? $transaction->created_by->firstName . ' ' . $transaction->created_by->lastName 
                : null,
            'items'           => $transaction->transaction_items->map(function ($item) {
                return [
                    'name'      => $item->products?->productName ?? $item->product?->name ?? 'Unknown',
                    'quantity'  => (int) $item->quantity,
                    'unitPrice' => (float) ($item->priceToPatient ?? $item->unitPrice ?? 0),
                    'subtotal'  => (float) $item->subtotal,
                ];
            })->toArray(),
            'totalItems'      => $transaction->transaction_items->count(),
        ];
    });

    // Return Laravel's paginated response structure (very frontend-friendly)
    return response()->json([
        'data'  => $formatted,
        'links' => [
            'first'  => $transactions->url(1),
            'last'   => $transactions->url($transactions->lastPage()),
            'prev'   => $transactions->previousPageUrl(),
            'next'   => $transactions->nextPageUrl(),
        ],
        'meta'  => [
            'current_page' => $transactions->currentPage(),
            'from'         => $transactions->firstItem(),
            'last_page'    => $transactions->lastPage(),
            'per_page'     => $transactions->perPage(),
            'to'           => $transactions->lastItem(),
            'total'        => $transactions->total(),
        ]
    ]);
}
    // public function hospitalPatients(Request $request)
    // {
    //     $hospitalAdminId = Auth::id();

    //     // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
    //     $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();

    //     if (!$currentHospital) {
    //         return response()->json(['message' => 'Hospital admin not found'], 404);
    //     }

    //     $hospitalId = $currentHospital->hospitalId;

    //     // Retrieve patients who belong to the same hospital and have users with roleId = 1
    //     $patients = Patient::where('hospital', $hospitalId)
    // ->whereHas('user', function ($query) {
    //     $query->where('role', 1); // Ensure user has roleId = 1
    // })
    // ->with([
    //     'doctor',
    //     'user',
    //     'cancer',
    //     'status.status_details' => function ($query) {
    //         // $query->latest()->limit(1);
    //         $query->orderBy('statusId', 'desc')->limit(1);
    //     }
    // ])
    // ->orderBy('updated_at', 'desc')
    // ->get();


    //     return response()->json($patients);
    // }



public function hospitalPatients(Request $request)
{
    $user = auth()->user();

    // Query parameters
    $search       = $request->query('query');
    $status       = $request->query('status');        // statusId
    $doctorId     = $request->query('doctor_id');
    $cancerType   = $request->query('cancer_type');
    $startDate    = $request->query('start_date');    // YYYY-MM-DD
    $endDate      = $request->query('end_date');      // YYYY-MM-DD
    $perPage      = $request->query('per_page', 15);

    $patients = Patient::where('hospitalId', $user->staff->hospitalId)
    ->where('patientType', 'NCCHF')
    ->whereHas('user', fn ($u) => $u->where('role', 1))
    ->when($search, function ($query) use ($search) {
        $like = "%" . strtolower($search) . "%";

        $query->where(function ($q) use ($like) {
            $q->whereHas('user', function ($u) use ($like) {
                $u->whereRaw('LOWER(phoneNumber) LIKE ?', [$like])
                  ->orWhereRaw('LOWER(email) LIKE ?', [$like])
                  ->orWhereRaw(
                      "LOWER(TRIM(CONCAT_WS(' ', firstName, lastName, otherNames))) LIKE ?",
                      [$like]
                  );
            })
            ->orWhereRaw('LOWER(chfId) LIKE ?', [$like]);
        });
    })
    ->when($status, fn ($q) => $q->whereHas('latestStatus', fn ($s) => $s->where('status', $status)))
    ->when($doctorId, fn ($q) => $q->whereHas('doctor', fn ($d) => $d->where('doctor', $doctorId)))
    ->when($cancerType, fn ($q) => $q->whereHas('cancer', fn ($c) =>
        $c->whereRaw('LOWER(cancerName) LIKE ?', ["%".strtolower($cancerType)."%"])
    ))
    ->when($startDate, fn ($q) => $q->whereDate('created_at', '>=', $startDate))
    ->when($endDate, fn ($q) => $q->whereDate('created_at', '<=', $endDate))
    // ->with(['doctor', 'user', 'cancer', 'latestStatus.status_details'])
    ->with(['user', 'doctor', 'cancer', 'latestStatus.status_details'])
    ->orderByDesc('updated_at')
    ->paginate($perPage);


    return response()->json($patients);
}




    // LIST OF ALL DOCTORS IN A HOSPITAL
    public function hospitalDoctors(Request $request)
    {
        $hospitalAdminId = Auth::id();

        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();

        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }

        $hospitalId = $currentHospital->hospitalId;

        // Retrieve doctors who belong to the same hospital
        $doctors = User::where('role', 2)
            ->whereHas('hospital_admins', function ($query) use ($hospitalId) { // Pass hospitalId into closure
                $query->where('hospitalId', $hospitalId);
            })
            ->get();


        return response()->json($doctors);
    }



    public function retrieveAllPatients()
    {
        $patients = Patient::with('doctor', 'hmo')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
            return response()->json($patients);
    }


    public function searchPatient(Request $request)
    {
        $query = $request->query('queryParameter'); // Retrieve query parameter
        $patients = Patient::where('hospitalFileNumber', '=', "$query")
            ->orWhere('phoneNumber', '=', "$query")
            ->orWhere('email', '=', "$query")
            ->orWhere('patientId', '=', "$query")
            ->get();
        return response()->json($patients);
    }


    public function store(Request $request)
    {
        // Directly get the data from the request
        $data = $request->all();

        // Create a new user with the data (ensure that the fields are mass assignable in the model)
        $patients = Patient::create($data);

        // Return a response, typically JSON
        return response()->json([ $patients,
        ], 201); // HTTP status code 201: Created
    }


    public function assignDoctor(Request $request)
{
    // Find the patient by ID
    $patient = Patient::find($request->patientId);

    // If the patient doesn't exist, return an error response
    if (!$patient) {
        return response()->json([
            'error' => 'Patient not found',
        ], 404); // HTTP status code 404: Not Found
    }

    // Get the data from the request
    $data['doctor'] = $request->doctorId;

    // Update the patient record
    $patient->update($data);

    // Return the updated patient record as a response
    return response()->json([
        'message' => 'Patient updated successfully',
        'data' => $patient,
    ], 200); // HTTP status code 200: OK
}


// Patient funds utilization
public function fundsUtilization(){

    $patient = Patient::where('userId', Auth::id())->first();
    $utilization = Billing::where('patientId', $patient->patientId)->sum('cost');
    return response()->json($utilization);
}


// Delete Patient
public function deletePatient($patientId){
    $patient = Patient::find($patientId);
if ($patient) {
$patient->delete();
}
return response()->json($patient, 201);
}


// A doctor should see all patients referred by him
public function getPatientReferralPerDoctor(){
    $hospitalAdminId = Auth::id();

        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();

        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }

    $referrals = PatientReferral::with('referred_hospital', 'user')
    ->where('referringHospital', $currentHospital->hospitalId)
    ->get();
    return response()->json($referrals);
}


// A doctor should see all patients referred by him
public function getPatientTransferPerDoctor(){
    $hospitalAdminId = Auth::id();

        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();

        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }

    $transfers = PatientTransfer::with('transferred_hospital', 'user')
    ->where('transferringHospital', $currentHospital->hospitalId)
    ->get();
    return response()->json($transfers);
}

public function initiatePatientReferral(Request $request)
    {
        $hospitalAdminId = Auth::id();

        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();

        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }

        $referringHospital = $currentHospital->hospitalId;

        $validator = Validator::make($request->all(), [
            'patientId' => 'required|exists:users,id',
            'hospitalId' => 'required|exists:hospitals,hospitalId',
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,serviceId',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $referral = PatientReferral::create([
                'patientUserId' => $request->patientId,
                'referringHospital' => $referringHospital,
                'referredHospital' => $request->hospitalId,
                'referringDoctor' => Auth::id(),
                'referringDoctorComment' => $request->comment,
                'status' => 'pending_mdt_approval',
            ]);

            foreach ($request->services as $serviceId) {
                PatientReferralService::create([
                    'patientUserId' => $request->patientId,
                    'referralId' => $referral->referralId,
                    'serviceId' => $serviceId,
                    'hospitalId' => $request->hospitalId,
                ]);
            }

            return response()->json(['message' => 'Referral submitted successfully.'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to submit referral.', 'details' => $e->getMessage()], 500);
        }
    }



    public function initiatePatientTransfer(Request $request)
    {
        $hospitalAdminId = Auth::id();

        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();

        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }

        $referringHospital = $currentHospital->hospitalId;

        $validator = Validator::make($request->all(), [
            'patientUserId' => 'required|exists:users,id',
            'hospitalId' => 'required|exists:hospitals,hospitalId',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $referral = PatientTransfer::create([
                'patientUserId' => $request->patientUserId,
                'transferringHospital' => $referringHospital,
                'transferredHospital' => $request->hospitalId,
                'transferringDoctor' => Auth::id(),
                'transferringDoctorComment' => $request->comment,
                'status' => 'pending_mdt_approval',
            ]);



            return response()->json(['message' => 'Transfer request submitted successfully.'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to submit transfer request.', 'details' => $e->getMessage()], 500);
        }
    }


}
