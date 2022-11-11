<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\MerchantRegisterController;
use App\Http\Controllers\Auth\MerchantLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MerchantsCategoryController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingAppController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BussinessController;
use App\Http\Controllers\Admin\RekPoolingController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\MerchantApproveController;
use App\Http\Controllers\Admin\MerchantRejectController;
use App\Http\Controllers\Admin\MerchantUploadController;
use App\Http\Controllers\Admin\ApprovalLogMerchantController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\MdrLogController;
use App\Http\Controllers\Admin\MerchantOpTimeController;
use App\Http\Controllers\Admin\OTPController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Merchant\HomeController;
use App\Http\Controllers\Merchant\MerchantProfileController;
use App\Http\Controllers\Merchant\MerchantTransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/tes', function() {
    $tes = Hash::make('12345678');
    dd($tes);
});

/**
 * Login Admin
 */
Route::controller(LoginController::class)->group(function() {
    Route::get('/panel/login', 'showLoginForm')->name('admin_auth.login');
    Route::post('/panel/login', 'login')->name('admin_auth.store');
    Route::post('/panel/logout', 'logout')->name('admin_auth.logout');
});

/**
 * Login Merchant
 */
Route::controller(MerchantLoginController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login/store', 'handleLogin')->name('login.store');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(MerchantRegisterController::class)->group(function() {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.store');
    Route::get('/tos', 'tos')->name('tos');
});
Route::controller(ForgotPasswordController::class)->group(function() {
    Route::get('/forgot_password', 'showForgetPasswordForm')->name('merchants.forgot_password');
    Route::get('/reset_password/{token}', 'showResetPasswordForm')->name('merchants.reset_password');
    Route::post('/forgot_password', 'submitForgetPasswordForm')->name('merchants.forgot_password_store');
    Route::post('/reset_password', 'submitResetPasswordForm')->name('merchants.reset_passsword_store');
});
/**
 * Route Merchant
 */
Route::middleware(['auth:merchant', 'merchant_auth'])->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
        Route::get('/filter_transaction_month', 'filter_month_transaction')->name('home.filter_month_transaction');
        Route::post('/merchant/change_password', 'change_password')->name('merchant.change_password');
    });
    Route::prefix('merchant')->group(function() {
        Route::controller(MerchantProfileController::class)->group(function(){
            Route::get('/profile', 'index')->name('merchants.profile');
            Route::post('/profile/update_personal', 'update_personal')->name('merchants.update_personal');
            Route::post('/profile/update_password', 'update_password')->name('merchants.update_password');
            Route::post('/profile/update_bank', 'update_bank')->name('merchants.update_bank');
            Route::post('/profile/update_document', 'update_document')->name('merchants.update_document');
            Route::post('/profile/update_pic', 'update_pic')->name('merchants.update_pic');
        });
        Route::controller(MerchantTransactionController::class)->group(function() {
            Route::get('/transaction', 'index')->name('merchant_transaction.index');
        });
    });
});



/**
 * Route Admin Panel
 */
Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});
Route::prefix('panel')->middleware('auth:web')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::put('/change_password', 'change_password')->name('dashboard.change_password');
        Route::post('/filter_year', 'filter_transaction_year')->name('dashboard.filter_year');
        Route::post('/filter_date_merchant', 'filter_date_merchant')->name('dashboard.filter_date_merchant');
        Route::post('/filter_month_transasction', 'filter_month_transaction')->name('dashboard.filter_month_transaction');
    });
    // roles
    Route::resource('/roles', RolesController::class);
    // user
    Route::resource('/user', UserController::class);
    // merchants_category
    Route::resource('/merchants_c', MerchantsCategoryController::class);
    // merchant
    Route::controller(MerchantController::class)->group(function() {
        Route::get('merchant/excel', 'export_excel')->name('merchant.excel');
        Route::put('merchant/{id}/toggle-active', 'toggleActive')->name('merchant.toggleActive');
    });
    Route::controller(MerchantApproveController::class)->group(function() {
        Route::get('merchant/approval', 'index')->name('merchant.approval');
        Route::put('merchant/approve', 'approve')->name('merchant.approve');
    });
    Route::controller(MerchantRejectController::class)->group(function() {
        Route::get('merchant/reject', 'reject')->name('merchant.rejected');
    });
    Route::controller(MerchantUploadController::class)->group(function(){
        Route::post('merchant/import_excel', 'import_excel')->name('merchant.import_excel');
    });


    Route::resource('merchant', MerchantController::class);
    Route::resource('merchant.optime', MerchantOpTimeController::class);
    Route::resource('otp', OTPController::class);

    // MASTER WILAYAH
    Route::resource('province', ProvinceController::class);
    Route::resource('city', CityController::class);
    Route::resource('district', DistrictController::class);
    Route::resource('village', VillageController::class);

    Route::resource('transaction', TransactionController::class);
    // Bank
    Route::resource('/bank', BankController::class);
    //Bussiness
    Route::resource('bussiness', BussinessController::class);
    //Rekening Poolling
    Route::resource('/rek_pooling', RekPoolingController::class);
    // setting app
    Route::controller(SettingAppController::class)->group(function () {
        Route::get('/settingApp/{id}', 'index')->name('settingApp.index');
        Route::put('/settingApp/update/{id}', 'update')->name('settingApp.update');
    });

    Route::controller(ApprovalLogMerchantController::class)->group(function(){
        Route::get('/approval_merchant_log', 'index')->name('approved_log_merchant.index');
        Route::get('/getDetailApp/{id}', 'getDetailApp');
    });

    Route::controller(MdrLogController::class)->group(function(){
        Route::get('/mdr_log', 'index')->name('mdr_log.index');
        Route::get('/getDetailMdr/{id}', 'getDetailMdr');
    });

    // activity log
    Route::controller(ActivityLogController::class)->group(function () {
        Route::get('/activity_log', 'index')->name('activity_log.index');
    });
});
