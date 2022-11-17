<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingAppController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Partner\HomeController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\DistrictController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;



Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);
/**
 * Login Merchant
 */
Route::controller(MerchantLoginController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::get('/login_otp', 'showOTPForm')->name('login.otp');
    Route::post('/login/store', 'handleLogin')->name('login.store');
    Route::post('/login/otp_store', 'handleOTP')->name('login.otp_store');
    Route::post('/login/otp_regenerate', 'regenerate_otp')->name('login.otp_regenerate');
    Route::post('/logout', 'logout')->name('logout');
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

    Route::prefix('partner')->group(function() {
        Route::controller(MerchantProfileController::class)->group(function(){
            Route::get('/profile', 'index')->name('merchants.profile');
            Route::post('/profile/update_personal', 'update_personal')->name('merchants.update_personal');
            Route::post('/profile/update_password', 'update_password')->name('merchants.update_password');
            Route::post('/profile/update_bank', 'update_bank')->name('merchants.update_bank');
            Route::post('/profile/update_document', 'update_document')->name('merchants.update_document');
            Route::post('/profile/update_pic', 'update_pic')->name('merchants.update_pic');
        });
    });
});



/**
 * Route Admin Panel
 */

 Route::controller(LoginController::class)->group(function() {
    Route::get('/panel/login', 'showLoginForm')->name('admin_auth.login');
    Route::post('/panel/login', 'login')->name('admin_auth.store');
    Route::post('/panel/logout', 'logout')->name('admin_auth.logout');
});
Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});
Route::prefix('panel')->middleware('auth:web')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::put('/change_password', 'change_password')->name('dashboard.change_password');
    });
    // roles
    Route::resource('/roles', RolesController::class);
    // user
    Route::resource('/user', UserController::class);
    // MASTER WILAYAH
    Route::resource('province', ProvinceController::class);
    Route::resource('city', CityController::class);
    Route::resource('district', DistrictController::class);
    Route::resource('village', VillageController::class);
    // setting app
    Route::controller(SettingAppController::class)->group(function () {
        Route::get('/settingApp/{id}', 'index')->name('settingApp.index');
        Route::put('/settingApp/update/{id}', 'update')->name('settingApp.update');
    });
    // activity log
    Route::controller(ActivityLogController::class)->group(function () {
        Route::get('/activity_log', 'index')->name('activity_log.index');
    });
});