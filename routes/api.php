<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MerchantController;
use App\Http\Controllers\API\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('unauthorize', function(){
    return response()->json(['message' => 'Unauthorize'], 401);
})->name('api.unauthorize');

Route::prefix('merchant')->controller(AuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('refresh', 'refresh');
    Route::post('logout', 'logout');
    Route::post('me', 'me')->middleware('merchant:merchant-api');
    Route::post('/forgot-password', 'forgotPassword')->name('password.email');
    Route::post('/reset-password', 'resetPassword')->name('password.reset');
});

Route::prefix('merchant')->middleware(['merchant:merchant-api'])->controller(MerchantController::class)->group(function(){
    Route::get('transactions/{merchantId}', 'transactions');
});


Route::get('kota/{provinsiId}', [WilayahController::class, 'kota'])->name('api.kota');
Route::get('kecamatan/{kotaId}', [WilayahController::class, 'kecamatan'])->name('api.kecamatan');
Route::get('kelurahan/{kecamatanId}', [WilayahController::class, 'kelurahan'])->name('api.kelurahan');
