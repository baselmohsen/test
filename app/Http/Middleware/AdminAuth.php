<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
 
    public function handle(Request $request, Closure $next, $guard = null)
    {

        if(!auth()->guard($guard)->check())
        {
            return redirect(route('Admin.login'));
        }
        return $next($request);
    }
}
