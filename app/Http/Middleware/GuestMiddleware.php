<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if( Auth::check() ){    //Auth::check(): Checks if the user is already authenticated it routes to dashboard

            return redirect()->route('admin.dashboard');  
            
        }
        return $next($request);    //If the user is not authenticated (guest), the request continues to the next middleware or controller
    }
}
