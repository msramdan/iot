<?php

use App\Http\Controllers\Partner\SubInstanceController;
use App\Http\Controllers\Partner\TicketController;
use App\Http\Controllers\Partner\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\InstanceLoginController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\Partner\ClusterController;
use App\Http\Controllers\Partner\DeviceController;
use App\Http\Controllers\Partner\ParsedGasMeterController;
use App\Http\Controllers\Partner\ParsedPowerMeterController;
use App\Http\Controllers\Partner\ParsedWaterMeterController;
use App\Http\Controllers\Partner\MasterLatestDataController;
use App\Models\ParsedGasMater;

Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);

Route::controller(CallbackController::class)->group(function () {
    Route::post('/callback/gateway/uplink', 'index')->name('callback.index');
});
/**
 * Login Partner
 */
Route::controller(InstanceLoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/login/store', 'handleLogin')->name('login.store');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forgot_password', 'showForgetPasswordForm')->name('instances.forgot_password');
    Route::get('/reset_password/{token}', 'showResetPasswordForm')->name('instances.reset_password');
    Route::post('/forgot_password', 'submitForgetPasswordForm')->name('instances.forgot_password_store');
    Route::post('/reset_password', 'submitResetPasswordForm')->name('instances.reset_passsword_store');
});

/**
 * Route Partner / Instance
 */
Route::middleware(['auth:instances'])->name('instances.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::post('/instance/change_password', 'change_password')->name('change_password');
    });
    Route::resources(['tickets' => TicketController::class]);
    Route::controller(SubInstanceController::class)->group(function () {
        Route::get('/subinstance', 'index')->name('subinstance.index');
    });
    Route::resource('subinstance.cluster', ClusterController::class);

    Route::controller(DeviceController::class)->group(function () {
        Route::get('/device', 'index')->name('device.index');
        Route::get('/device/detail/{id}', 'detail')->name('device.detail');
    });
    Route::controller(ParsedWaterMeterController::class)->group(function () {
        Route::get('/parsed-wm', 'index')->name('parsed-wm.index');
    });
    Route::controller(ParsedPowerMeterController::class)->group(function () {
        Route::get('/parsed-pm', 'index')->name('parsed-pm.index');
    });
    Route::controller(ParsedGasMeterController::class)->group(function () {
        Route::get('/parsed-gm', 'index')->name('parsed-gm.index');
    });

    Route::controller(MasterLatestDataController::class)->group(function () {
        //Water meter
        Route::get('/master-water-meter', 'waterMeterMaster')->name('master_water_meter.index');
        Route::get('/master-water-meter/detail/{id}', 'detailWaterMeter')->name('master_water_meter.detail');
        //Power Meter
        Route::get('/master-power-meter', 'powerMeterMaster')->name('master_power_meter.index');
        Route::get('/master-power-meter/detail/{id}', 'detailPowerMeter')->name('master_power_meter.detail');
        //Gas Meter
        Route::get('/master-gas-meter', 'gasMeterMaster')->name('master_gas_meter.index');
        Route::get('/master-gas-meter/detail/{id}', 'detailGasMeter')->name('master_gas_meter.detail');
    });
});
