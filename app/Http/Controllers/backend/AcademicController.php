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


    public function edit($id)
    {
        $data = AcademicYear::find($id);

        return view('backend.academicYear.academicYear_edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = AcademicYear::find($request->id);
        $data->academicyear = $request->academicyear;
        $data->update();
        return redirect()->route('academic.edit',$data->id)->with('success', 'AcademicYear updated Successfully');

    }

    public function delete($id)
    {
        $data = AcademicYear::find($id);
        $data->delete();

        return redirect()->route('academic.show')->with('success', 'AcademicYear deleted Successfully');
    }
}
