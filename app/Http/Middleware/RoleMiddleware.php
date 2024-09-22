<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guard('admin')->user()->role !== $role) {
            return redirect()->route('admin.login')->with('error', 'You are not authorized to access this page');
        }

        return $next($request);
    }
}