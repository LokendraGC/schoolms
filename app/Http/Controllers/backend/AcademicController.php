<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index()
    {
        return view('backend.layouts.academic_yr');
    }

    public function store( Request $request ){
        dd( $request->all()); 
    }
}
