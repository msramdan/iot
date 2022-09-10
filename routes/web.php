<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
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
    Route::resource('/roles', RolesController::class);
});
