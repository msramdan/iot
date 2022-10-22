<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class MerchantAuthAPI extends Middleware
{
    protected function authenticate($request, array $guards)
    {

        if ($this->auth->guard('merchant-api')->check()) {
            return $this->auth->shouldUse('merchant-api');
        }

        $this->unauthenticated($request, ['merchant-api']);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('api.unauthorize');
        }
    }

    
}
