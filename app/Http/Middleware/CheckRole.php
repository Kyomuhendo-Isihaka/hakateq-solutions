<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the required role
        if (Auth::check() && Auth::user()->user_type == $role) {
            return $next($request);
        }

        // Redirect to home if the user doesn't have the required role
        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}
