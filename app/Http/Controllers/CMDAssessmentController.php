<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMDAssessment;
use App\Models\User;
use App\Models\HospitalStaff;
use App\Models\Patient;
use App\Models\NICRATAssessment;
use App\Models\ApplicationReview;
use Illuminate\Support\Facades\Auth;

class CMDAssessmentController extends Controller
{
    public function RetrieveAll()
    {
        $cmdassessment = CMDAssessment::all();
        return response()->json($cmdassessment);
       
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
    
        
        $cmdassessment = CMDAssessment::create($data);
    
       
        return response()->json($cmdassessment, 201); 
    }



    

    public function CMDPatients(Request $request)
    {
        $hospitalAdminId = Auth::id(); 
    
        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();
    
        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }
    
        $hospitalId = $currentHospital->hospitalId;
    
        // Retrieve patients who belong to the same hospital and have users with roleId = 1
        $patients = Patient::where('hospital', $hospitalId)
        ->where('status', 5)
        ->orWhere('status', 6)
    ->whereHas('user', function ($query) {
        $query->where('role', 1); // Ensure user has roleId = 1
    })
    ->with([
        'doctor',
        'user',
        'cancer',
        'status.status_details',
        'social_welfare_assessment',
        'mdt_assessment',
        'cmd_assessment'
    ])
    ->orderBy('updated_at', 'desc')
    ->get();

    
        return response()->json($patients);
    }



    public function CMDPendingPatients(Request $request)
    {
        $hospitalAdminId = Auth::id(); 
    
        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();
    
        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }
    
        $hospitalId = $currentHospital->hospitalId;
    
        // Retrieve patients who belong to the same hospital and have users with roleId = 1
        $patients = Patient::where('hospital', $hospitalId)
        ->where('status', 5)
    ->whereHas('user', function ($query) {
        $query->where('role', 1); // Ensure user has roleId = 1
    })
    ->with([
        'doctor',
        'user',
        'cancer',
        'status.status_details',
        'social_welfare_assessment',
        'mdt_assessment',
        'cmd_assessment'
    ])
    ->orderBy('updated_at', 'desc')
    ->get();

    
        return response()->json($patients);
    }


// ALL REVIEWED APPLICATIONS 
    public function CMDReviewedPatients(Request $request)
    {
        $hospitalAdminId = Auth::id(); 
    
        // Retrieve the hospitalId of the logged-in admin from the HospitalStaff table
        $currentHospital = HospitalStaff::where('userId', $hospitalAdminId)->first();
    
        if (!$currentHospital) {
            return response()->json(['message' => 'Hospital admin not found'], 404);
        }
    
        $hospitalId = $currentHospital->hospitalId;
    
        // Retrieve patients who belong to the same hospital and have users with roleId = 1
        $patients = Patient::where('hospital', $hospitalId)
        ->where('status', 6)
    ->whereHas('user', function ($query) {
        $query->where('role', 1); // Ensure user has roleId = 1
    })
    ->with([
        'doctor',
        'user',
        'cancer',
        'status.status_details',
        'social_welfare_assessment' ,
        'mdt_assessment',
        'cmd_assessment'
    ])
    ->orderBy('updated_at', 'desc')
    ->get();

    
        return response()->json($patients);
    }




    

// CMD ASSESSMENT
public function CMDAssessment(Request $request)
{
   

    // Find the patient by ID
    $patient = Patient::findOrFail($request->patientId);

    // Prepare data for update
    $data = [
        'patientUserId' => $patient->userId,
        'reviewerId' => Auth::id(),
        'comments' => $request->comments,
        'status' => 6, 
    ];

    // Update patient record
    // $patient->update($data);
  CMDAssessment::firstOrCreate($data);

    $status_data['patientUserId'] = $patient->userId;
        $status_data['reviewerId'] = Auth::id();
        $status_data['reviewerRole'] = 7;
        $status_data['statusId'] = 6;

        $application_status = ApplicationReview::create($status_data);

        Patient::where('userId', $patient->userId)->update(['status' => 6]);

    // Return response based on status
            return response()->json([
            'message' => $request->status === 'approved' ? 'Patient successfully approved' : 'Patient approval declined',
            'data' => $patient,
       
    ], 200);
}


}
