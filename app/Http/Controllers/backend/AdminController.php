<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            // $user = Auth::user();

            // if( $user->hasRole('admin') ){

            return redirect()->route('admin.dashboard');

            // }

            // Auth::logout();

            // return back()->withErrors([
            //     'autherror' => 'You do not have permission to access'
            // ]);
        }

        return back()->withErrors([
            'autherror' => 'The provided credential do not match'
        ]);
    }
}
