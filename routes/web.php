<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerchantsCategoryController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingAppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BussinessController;
use App\Http\Controllers\RekPoolingController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantApproveController;
use App\Http\Controllers\MerchantRejectController;
use App\Http\Controllers\MerchantUploadController;
use App\Http\Controllers\ApprovalLogMerchantController;
use App\Http\Controllers\MdrLogController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;



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

Auth::routes(['register' => false]);

Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});
Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::put('/change_password', 'change_password')->name('dashboard.change_password');
});

Route::prefix('panel')->middleware('auth')->group(function () {
    // roles
    Route::resource('/roles', RolesController::class);
    // user
    Route::resource('/user', UserController::class);
    // merchants_category
    Route::resource('/merchants_c', MerchantsCategoryController::class);
    // merchant
    Route::controller(MerchantController::class)->group(function() {
        Route::get('merchant/excel', 'export_excel')->name('merchant.excel');
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
