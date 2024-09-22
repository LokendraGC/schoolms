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

    public function login(Request $request){

           $request->validate([
            'email' => 'required | email',
            'password' => 'required'
           ]);

           if( Auth::attempt( $request->only('email','password')) ){

            return redirect()->route('admin.dashboard');

           }

           return back()->withErrors([
            'autherror' => 'The provided credential do not match'
           ]);
    }

}
