<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SettingApp;
use Config;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        View::composer(['layouts.auth_merchant'], function ($view) {
            $setting = SettingApp::first();
            $view->with('setting', $setting);
        });
    }
}
