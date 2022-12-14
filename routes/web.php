<?php

use App\Http\Controllers\Partner\SubInstanceController;
use App\Http\Controllers\Partner\TicketController;
use App\Http\Controllers\Partner\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\InstanceLoginController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\Partner\ClusterController;

Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);

Route::controller(CallbackController::class)->group(function () {
    Route::post('/callback/gateway/uplink', 'index')->name('callback.index');
});
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
Route::middleware(['auth:instances'])->name('instances.')->group(function() {
    Route::controller(HomeController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard');
        Route::post('/instance/change_password', 'change_password')->name('change_password');
    });
    Route::resources(['tickets' => TicketController::class]);
    Route::controller(SubInstanceController::class)->group(function() {
        Route::get('/subinstance', 'index')->name('subinstance.index');
    });
    Route::resource('subinstance.cluster', ClusterController::class);
});





