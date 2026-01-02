<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BeneficiariesController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\CancerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DoctorAssessmentController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DrugRequestController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\PatientBiodataController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Models\Cancer;
use App\Models\HMOs;
use App\Models\Languages;
use App\Models\ProductType;
use App\Models\State;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware(['cors'])->group(function () {
// Public routes
Route::post('/sign-up', [UsersController::class, 'patientSignUp']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::get('/users/profile', [AuthController::class, 'profile'])->middleware('auth.jwt'); // Use auth.jwt instead of auth:api



Route::get('/announcement', [AnnouncementController::class, 'index']);


// Protected routes with JWT authentication
Route::middleware(['auth.jwt'])->group(function () {

    // 🔓 Any authenticated user
    Route::get('/user', function () {
        $user = auth()->user();

        return response()->json([
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'otherNames' => $user->otherNames,
            'email' => $user->email,
            'role' => $user->user_role->roleName,
            'applicationStatus' => $user->application_status->statusId ?? null,
        ]);
    });

    // General Routes
    Route::get('/product-types', function () {
        $product_types = ProductType::orderBy('typeId')->get();
        return response()->json($product_types);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:Admin')->group(function () {
        Route::apiResource('roles', RolesController::class)->only(['index', 'store']);
        Route::apiResource('users', UsersController::class)->only(['index', 'store']);
        Route::apiResource('states', StateController::class)->only(['index', 'store']);
    });

    Route::middleware('role:DOCTOR')->group(function () {
        Route::post('/patient/doctor/careplan', [DoctorAssessmentController::class, 'doctorcarePlan']);
        Route::get('/patient/doctor/all', [DoctorAssessmentController::class, 'doctorPatients']);
        Route::get('/patient/doctor/reviewed', [DoctorAssessmentController::class, 'doctorReviewedPatients']);
        Route::get('/patient/doctor/pending', [DoctorAssessmentController::class, 'doctorPendingPatients']);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN & HOSPITAL
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:HOSPITAL_ADMIN')->group(function () {
        Route::get('/patients', [PatientsController::class, 'retrieveAll']);
        Route::get('/hospital/patients', [PatientsController::class, 'hospitalPatients']);
        Route::get('/patient/billings', [BillingController::class, 'patientBillings']);
        Route::get('/hospital/doctors', [PatientsController::class, 'hospitalDoctors']);
        Route::post('/patient/doctor/assign', [PatientsController::class, 'assignDoctor']);
        Route::get('/hospital/ewallet/balance', [HospitalController::class, 'hospitalEwalletBalance']);
        Route::get('/patient/ewallet/balance', [PatientsController::class, 'fundsUtilization']);


        Route::get('/requests', [DrugRequestController::class, 'index']);
        Route::post('/requests', [DrugRequestController::class, 'store']);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN & PHARMACIST
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:SUPER_ADMIN,PHARMACIST')->group(function () {
        Route::get('/stock', [StockController::class, 'index']);
        Route::post('/stock', [StockController::class, 'store']);

        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/products', [ProductController::class, 'store']);

        Route::get('/product-pricelist', [ProductController::class, 'productPriceList']);
        Route::post('/product-pricelist', [ProductController::class, 'storeProductPriceList']);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY – PARTNERS / SUPPLIERS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:PATIENT,SUPER_ADMIN')->group(function () {
        Route::post('/patient/biodata', [PatientBiodataController::class, 'store']);
        Route::get('/patients/biodata/{phoneNumber}', [PatientBiodataController::class, 'retrievePatient']);
        Route::get('patient/{phoneNumber}/status', [PatientBiodataController::class, 'currentStatus']);

        Route::get('/cancers', function () {
            $cancers = Cancer::orderBy('cancerName')->get();
            return response()->json($cancers);
        });

        Route::post('/cancers', function (Request $request) {
            $cancers = $request->all(); // Expecting an array of states

            // Bulk insert
            Cancer::insert($cancers);

            return response()->json([
                'message' => 'Cancers created successfully',
                'data' => $cancers
            ]);
        });


        Route::post('/states', function (Request $request) {
            $states = $request->all(); // Expecting an array of states

            // Bulk insert
            State::insert($states);

            return response()->json([
                'message' => 'States created successfully',
                'data' => $states
            ]);
        });

        Route::get('/states', [StateController::class, 'index']);

        Route::post('/hmos', function (Request $request) {
            $hmos = $request->all(); // Expecting an array of states

            // Bulk insert
            HMOs::insert($hmos);

            return response()->json([
                'message' => 'HMOs created successfully',
                'data' => $hmos
            ]);
        });

        Route::get('/hmos', function () {
            $hmos = HMOs::orderBy('hmoName')->get();
            return response()->json($hmos);
        });

        Route::get('/suppliers', [DistributorController::class, 'index']);
        Route::post('/suppliers', [DistributorController::class, 'store']);


        Route::get('/partners', [PartnersController::class, 'index']);
        Route::post('/partners', [PartnersController::class, 'store']);

        Route::get('/manufacturers', [ManufacturerController::class, 'index']);
        Route::post('/manufacturers', [ManufacturerController::class, 'store']);

        Route::get('/hospitals', [HospitalController::class, 'index']);
        Route::post('/hospitals', [HospitalController::class, 'store']);

        Route::get('/diseases', [CancerController::class, 'index']);
        Route::post('/diseases', [CancerController::class, 'store']);
    });
});


Route::post('/languages', function (Request $request) {
    $languages = $request->all(); // Expecting an array of states

    // Bulk insert
    Languages::insert($languages);

    return response()->json([
        'message' => 'Languages created successfully',
        'data' => $languages
    ]);
});

Route::get('/languages', function () {
    $languages = Languages::orderBy('languageId')->get()->makeHidden(['created_at', 'updated_at', 'deleted_at']);
    return response()->json($languages);
});
