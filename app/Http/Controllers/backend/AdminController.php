<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getLogin(){
        return view('backend.auth.login');
    }

    public function dashboard(){
        return view('backend.dashboard');
    }
    public function getForm(){
        return view('backend.layouts.form');
    }
    public function getTable(){
        return view('backend.layouts.table');
    }
}
