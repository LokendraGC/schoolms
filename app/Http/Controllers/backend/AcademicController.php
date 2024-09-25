<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index()
    {
        return view('backend.academicYear.academicYear_create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'academicyear' => 'required'
        ]);

        $data = new AcademicYear();
        $data->academicyear = $request->academicyear;
        $data->save();

        return redirect()->route('academic.create')->with('success', 'AcademicYear Added Successfully');
    }


    public function show()
    {
        $data = AcademicYear::get();

        return view('backend.academicYear.showAcademicYear', ['data' => $data]);
    }

    public function delete( $id )
    {
        $data = AcademicYear::find($id);
        $data->delete();

        return redirect()->route('academic.show')->with('success', 'AcademicYear deleted Successfully');
    }
}
