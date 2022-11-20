<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingAppController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Partner\HomeController;
// use App\Http\Controllers\Admin\ProvinceController;
// use App\Http\Controllers\Admin\CityController;
// use App\Http\Controllers\Admin\VillageController;
// use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\MerchantLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\InstanceLoginController;
use Illuminate\Support\Facades\Hash;

Route::get('/tes', function(){
    dd(Hash::make('12345678'));
});

Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);
/**
 * Login Partner
 */
Route::controller(InstanceLoginController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/login/store', 'handleLogin')->name('login.store');
});

Route::controller(ForgotPasswordController::class)->group(function() {
    Route::get('/forgot_password', 'showForgetPasswordForm')->name('instances.forgot_password');
    Route::get('/reset_password/{token}', 'showResetPasswordForm')->name('instances.reset_password');
    Route::post('/forgot_password', 'submitForgetPasswordForm')->name('instances.forgot_password_store');
    Route::post('/reset_password', 'submitResetPasswordForm')->name('instances.reset_passsword_store');
});

/**
 * Route Partner / Instance
 */
Route::middleware(['auth:instances'])->group(function() {
    Route::controller(HomeController::class)->group(function() {
        Route::get('/', 'index')->name('instances.dashboard');
        Route::post('/instance/change_password', 'change_password')->name('instances.change_password');
    });
});

Route::prefix('panel')->middleware('auth:web')->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::resource('invoice', InvoiceController::class);



    // roles
    Route::resource('/roles', RolesController::class);
    // user
    Route::resource('/user', UserController::class);
    // MASTER WILAYAH
    // Route::resource('province', ProvinceController::class);
    // Route::resource('city', CityController::class);
    // Route::resource('district', DistrictController::class);
    // Route::resource('village', VillageController::class);
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
