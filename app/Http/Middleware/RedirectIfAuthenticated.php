<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        if (Auth::check()){
            if (!Auth::guard('merchant')->check()) {
                return redirect(RouteServiceProvider::PANEL);
            } else {
                return redirect('/');
            }
        }


        return $next($request);
    }
}
