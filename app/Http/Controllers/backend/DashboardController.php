<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function getTable(){
        return view('backend.layouts.table');
    }

    public function getForm(){
        return view('backend.layouts.form');
    }

    public function logout( Request $request ){
        
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login');    
    }
}
