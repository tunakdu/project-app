<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

class ApiLoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Route::currentRouteName() == 'passport.token') {
            return $next($request);
        }

        return redirect()->route('passport.token');
    }
}
