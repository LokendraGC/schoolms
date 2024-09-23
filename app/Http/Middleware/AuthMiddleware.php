<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        // dd($roles);
        if( Auth::check() && Auth::user()->hasAnyRole($roles)){
            
            return $next($request);

        }
        // return redirect()->route('admin.login');

        Auth::logout();

        return back()->withErrors([
                'autherror' => 'You do not have permission to access'
            ]);
    }
}
