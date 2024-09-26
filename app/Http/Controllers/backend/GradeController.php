<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Post;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    public function index()
    {
        return view('backend.grades.create-grade');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'grade' => 'required'
        ]);

        $post = new Post();
        $post->record = $request->grade;
        $post->type = 'grade';

        $post->save();

        return redirect()->route('grade.create')->with('success', 'grade Added Successfully');
    }


    public function show()
    {
        $data = Grade::get();

        return view('backend.grades.show-grades', ['data' => $data]);
    }


    public function edit($id)
    {
        $data = Grade::find($id);

        return view('backend.grades.edit-grade', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = Grade::find($request->id);
        $data->grade = $request->grade;
        $data->update();
        return redirect()->route('grade.edit',$data->id)->with('success', 'Grade updated Successfully');

    }

    public function delete($id)
    {
        $data = Grade::find($id);
        $data->delete();

        return redirect()->route('grade.show')->with('success', 'Grade deleted Successfully');
    }
}
