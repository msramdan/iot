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
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;



Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);
/**
 * Login Merchant
 */

Route::controller(ForgotPasswordController::class)->group(function() {
    Route::get('/forgot_password', 'showForgetPasswordForm')->name('merchants.forgot_password');
    Route::get('/reset_password/{token}', 'showResetPasswordForm')->name('merchants.reset_password');
    Route::post('/forgot_password', 'submitForgetPasswordForm')->name('merchants.forgot_password_store');
    Route::post('/reset_password', 'submitResetPasswordForm')->name('merchants.reset_passsword_store');
});
/**
 * Route Merchant
 */

