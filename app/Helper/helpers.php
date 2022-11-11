<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

if (!function_exists('set_active')) {
    function set_active($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return 'active';
                }
            }
        } else {
            if (Route::is($uri)) {
                return 'active';
            }
        }
    }
}

function setting_web()
    {
        $setting = DB::table('setting_app')->first();
    return $setting->app_name;
    }

function set_show($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return 'show';
                }
            }
        } else {
            if (Route::is($uri)) {
                return 'show';
            }
        }
    }


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    echo $hasil_rupiah;
}