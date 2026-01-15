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
use App\Http\Controllers\HospitalStockController;
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
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\RequisitionController;

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
    
    Route::middleware('role:SUPER_ADMIN,ADMIN')->group(function () {
        Route::apiResource('roles', RolesController::class)->only(['index', 'store']);
        Route::apiResource('users', UsersController::class)->only(['index', 'store']);
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
        Route::get('/patient/billings', [BillingController::class, 'patientBillings']);
        Route::get('/hospital/patients', [PatientsController::class, 'hospitalPatients']);
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
    Route::middleware('role:SUPER_ADMIN,PHARMACIST,CHAI')->group(function () {
        Route::get('/stock', [HospitalStockController::class, 'index']);
        Route::post('/stock', [HospitalStockController::class, 'store']);

        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::get('/products/priced', [ProductController::class, 'pricedProducts']); // new

        Route::post('/transactions', [TransactionsController::class, 'store']); // new


        Route::get('/product-pricelist', [ProductController::class, 'productPriceList']);
        Route::post('/product-pricelist', [ProductController::class, 'storeProductPriceList']);

        Route::get('/warehouses', [WarehouseController::class, 'index']);
        Route::post('/warehouses', [WarehouseController::class, 'store']);

        
        Route::get('/warehouse-stock/batches', [WarehouseController::class, 'getWarehouseStock']);
        Route::get('/warehouse-stock-list/{warehouseId}', [WarehouseController::class, 'summary']);
        Route::get('/hospital-stocks', [HospitalStockController::class, 'hospitalStocks']);
       
        Route::get('/hospital/patients', [PatientsController::class, 'hospitalPatients']);
        Route::get('/hospital/doctors', [PatientsController::class, 'hospitalDoctors']);

        Route::get('/all-warehouse-stocks', [WarehouseController::class, 'allStocksInWarehouses']);
        Route::post('/requisitions', [RequisitionController::class, 'stockRequest']);
        Route::get('/requisitions/hospital', [RequisitionController::class, 'hospitalIndex']); // for tracking
        Route::post('/requisitions/bulk', [RequisitionController::class, 'bulkStockRequest']);
        Route::get('/requisitions/{requisitionId}/items', [RequisitionController::class, 'requisitionItems']);
        Route::post('/warehouse-stock', [WarehouseController::class, 'addWarehouseStock']);


        Route::patch('/requisitions/items/{itemId}/cancel', [RequisitionController::class, 'cancel']);
        Route::get('/requisitions/pending-dispatch', [RequisitionController::class, 'hospitalIndex']);
        Route::patch('/requisitions/{requisitionId}/dispatch', [RequisitionController::class, 'dispatch']);
        Route::patch('/requisitions/{requisitionId}/receive', [RequisitionController::class, 'receive']);

        Route::get('patients/ncap', [PatientsController::class, 'ncapEnrolledPatients']);
        Route::post('patients/ncap', [PatientsController::class, 'ncapPatientEnrolment']);
        Route::get('patient/search', [TransactionsController::class, 'searchPatient']);
        
        Route::get('/hospital/escrow-account', [TransactionsController::class, 'getEscrowAccounts']);

        Route::get('transactions', [TransactionsController::class, 'index']);
        Route::patch('transactions/{transactionId}/confirm', [TransactionsController::class, 'updateStatus']);

        

        Route::get('/distributors/{distributorId}/manufacturers', [DistributorController::class, 'index']);
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

        Route::get('/supplier/staff', function () {
            $cancers = User::where('role', 12)->orderBy('cancerName')->get();
            return response()->json($cancers);
        });

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
        Route::get('/manufacturers/{manufacturerId}', [ManufacturerController::class, 'show']);
        Route::post('/manufacturers', [ManufacturerController::class, 'store']);
        Route::put('/manufacturers/{manufacturerId}', [ManufacturerController::class, 'update']);
        Route::delete('/manufacturers/{manufacturerId}', [ManufacturerController::class, 'destroy']);
        Route::get('/manufacturers/{manufacturerId}/staff', [ManufacturerController::class, 'manufacturerStaff']);
        Route::post('/manufacturers/{manufacturerId}/staff', [ManufacturerController::class, 'addManufacturerStaff']);
        Route::get('/manufacturers/{manufacturerId}/suppliers', [ManufacturerController::class, 'manufacturerDistributor']);
        Route::post('/manufacturers/{manufacturerId}/suppliers', [ManufacturerController::class, 'addManufacturerDistributor']);

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

Route::post('/states', [StateController::class, 'store']);
