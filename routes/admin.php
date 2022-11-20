<?php
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\Admin\InstanceController;
use App\Http\Controllers\Admin\BussinessController;
use App\Http\Controllers\Admin\TicketController;

/**
 * Route Admin Panel
 */

Route::controller(LoginController::class)->group(function() {
    Route::get('login', 'showLoginForm')->name('admin_auth.login');
    Route::post('login', 'login')->name('admin_auth.store');
    Route::post('logout', 'logout')->name('admin_auth.logout');
});
Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});

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
//Bussiness
Route::resource('bussiness', BussinessController::class);
//Instance
Route::resource('instance', InstanceController::class);
// setting app
Route::controller(SettingAppController::class)->group(function () {
    Route::get('/settingApp/{id}', 'index')->name('settingApp.index');
    Route::put('/settingApp/update/{id}', 'update')->name('settingApp.update');
});
//ticket
Route::resource('tickets', TicketController::class);
// activity log
Route::controller(ActivityLogController::class)->group(function () {
    Route::get('/activity_log', 'index')->name('activity_log.index');
});
