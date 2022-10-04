<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerchantsCategoryController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingAppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankController;
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
});

Route::prefix('panel')->middleware('auth')->group(function () {
    // roles
    Route::resource('/roles', RolesController::class);
    // user
    Route::resource('/user', UserController::class);
    // merchants_category
    Route::resource('/merchants_c', MerchantsCategoryController::class);
    // Bank
    Route::resource('/bank', BankController::class);
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
