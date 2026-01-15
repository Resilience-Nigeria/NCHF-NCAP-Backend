<?php

namespace App\Http\Controllers;

use App\Jobs\SendSMSJob;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use App\Models\StaffType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Mail\WelcomeEmail;
use App\Mail\NicratWelcomeEmail;
use App\Mail\CHAIWelcomeEmail;
use App\Models\ApplicationReview;
use App\Models\Languages;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Http\JsonResponse;
use App\Models\Lgas;
use App\Models\Role;
use App\Models\StatusList;
use Illuminate\Queue\Queue;


class UsersController extends Controller
{
public function index()
{
    $users = User::with([
        'user_role:roleId,roleName', // include foreign key id
        'staff.hospital:hospitalId,hospitalName,acronym' // nested relationship: include id and hospitalName
    ])
    ->select('id', 'firstName', 'lastName', 'phoneNumber', 'email', 'role') // include foreign key for role relation
    ->get();
    // ->makeHidden(['id']);

    return response()->json($users);
}



public function admins(Request $request)
{
    $perPage = $request->query('per_page', 10);
    $role = $request->query('role');
    $search = $request->query('search');

    $query = User::whereIn('role', [2, 3, 4])->with('user_role'); // Combine roles

    if ($role) {
        $query->where('role', $role);
    }

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('firstName', 'like', "%$search%")
              ->orWhere('lastName', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('phoneNumber', 'like', "%$search%");
        });
    }

    $users = $query->paginate($perPage);

    return response()->json($users);
}


  public function supervisors()
{
    $users = User::with('staff.staff_type')
        ->whereHas('staff', function ($query) {
            $query->where('staffType', 3);
        })
        ->get();

    return response()->json($users);
}


    public function staff_type()
    {
        $staffTypes = StaffType::all();
        return response()->json($staffTypes);

    }

public function store(Request $request)
{
    // 1. Validate input
    $validatedData = $request->validate([
        'firstName'   => 'required|string|max:255',
        'lastName'    => 'required|string|max:255',
        'otherNames'  => 'nullable|string|max:255',
        'phoneNumber' => 'nullable|string|max:20',
        'email'       => 'nullable|email|max:255|unique:users,email',
        'password' => 'nullable|string|min:6',
        'role'      => 'required|exists:roles,roleId',
    ]);

    // 2. Generate default password
    $default_password = strtoupper(Str::random(2)) . mt_rand(1000000000, 9999999999);
    if ($request->filled('password')) {
        $default_password = $request->input('password');
    }
    // 3. Create user
    $user = User::create([
        'firstName'   => $validatedData['firstName'],
        'lastName'    => $validatedData['lastName'],
        'otherNames'  => $validatedData['otherNames'] ?? null,
        'phoneNumber' => $validatedData['phoneNumber'] ?? null,
        'email'       => $validatedData['email'] ?? null,
        'password'    => Hash::make($default_password),
        'role'        => $validatedData['role'],
    ]);

    Log::info('User created:', ['email' => $user->email]);

    // 4. Queue the welcome email
    if ($user->email) {
        try {
            Mail::to($user->email)->send(new CHAIWelcomeEmail(
                $user->firstName,
                $user->lastName,
                $user->email,
                $default_password,
                $user->user_role->roleName
            ));
            Log::info('Welcome email queued for ' . $user->email);
        } catch (\Exception $e) {
            Log::error('Failed to queue welcome email: ' . $e->getMessage());
        }
    }

    // 5. Load role relationship
    $user->load('user_role');

    // 6. Return response
    return response()->json([
        'message'     => 'User successfully created',
        'password'    => $default_password,
        'firstName'   => $user->firstName,
        'lastName'    => $user->lastName,
        'otherNames'  => $user->otherNames,
        'phoneNumber' => $user->phoneNumber,
        'email'       => $user->email,
        'role'        => $user->user_role->roleName,
        'id'          => $user->id,
    ], 201);
}



        public function update(Request $request, $staffId)
{
        $staff = Staff::find($staffId);
        if (!$staff) {
            return response()->json(['message' => 'Staff not found'], 404);
        }

        $staff->update($request->all());
        return response()->json($staff);
    }

       public function destroy($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }


//  Patient Application Signup
public function patientSignUp(Request $request)
{
    try {
        // Check if email or phone number already exists
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Email already exists. Please use a different email.'
            ], 400);
        }

        if (User::where('phoneNumber', $request->phoneNumber)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Phone number already exists. Please use a different phone number.'
            ], 400);
        }

        // Generate a random password
        $defaultPassword = strtoupper(Str::random(8));
        $data = $request->all();
        $data['password'] = Hash::make($defaultPassword);
        $patientRole = Role::where('roleName', 'PATIENT')->first();
        $data['role'] = $patientRole->roleId; // Default role is patient

        // Extract user details
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $phone = $request->phoneNumber; // User's phone number

        // Get list of statuses
        $statusId = StatusList::orderBy('statusId')->value('statusId');

        // Create user
        $user = User::create($data);

        // Store application status

        $status_data = [
            'patientUserId' => $user->id,
            'reviewerId' => $user->id,
            'reviewerRole' => $patientRole->roleId,
            'statusId' => 1
        ];
        ApplicationReview::create($status_data);

        // Queue the welcome email
        $languageId = $request->languageId;
        $getMessage = Languages::where('languageId', $request->languageId)->first();
        $welcomeMessage = $getMessage->welcomeMessage ?? 'Welcome to Cancer Health Fund';
        $salutation = $getMessage->salutation ?? 'Hi';
        Mail::to($email)->send(new WelcomeEmail($email, $firstName, $lastName, $defaultPassword, $welcomeMessage, $salutation, $languageId));

        // Prepare SMS message based on language
        // $smsMessage = match ($languageId) {
        //     1 => "Hello $firstName, thanks for registering on Cancer Health Fund! Your temporary password is: $defaultPassword.", // English
        //     3 => "Salam $firstName, godiya muke da yin rijista a Cancer Health Fund! Kalmar sirri ta wucin gadi ita ce: $defaultPassword.", // Hausa
        //     2 => "Salaamu ale $firstName, ope wa fun iforukosile re lori Cancer Health Fund! Oro asina igba die re ni: $defaultPassword.", // Yoruba
        //     4 => "Ndewo $firstName, daalu maka ndebanye aha gi na Cancer Health Fund! Okwuntughe nwa oge gi bu: $defaultPassword.", // Igbo
        //     default => "Hello $firstName, thanks for registering on Cancer Health Fund! Your temporary password is: $defaultPassword."
        // };

        // Queue SMS job
        SendSMSJob::dispatch($phone, $welcomeMessage);


        return response()->json([
            'success' => true,
            'message' => 'User registered successfully. A welcome email and WhatsApp notification have been queued.',
            // 'user' => $user
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'User registration failed. Please try again.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
