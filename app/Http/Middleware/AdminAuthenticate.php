<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class AdminAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the guard is admin
        if (! $request->expectsJson()) {
            // If the request is for admin guard, redirect to admin.login route
            if (in_array('admin', $this->guards)) {
                return route('admin.login');
            }
            // Default redirect to login route
            return route('login');
        }
    }
}
