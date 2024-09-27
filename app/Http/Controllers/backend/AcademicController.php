<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Post;
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

        $post = new Post();
        $post->record = $request->academicyear;
        $post->type = 'academicyear';
        
        $post->save();

        return redirect()->route('academic.create')->with('success', 'AcademicYear Added Successfully');
    }


    public function show()
    {
        $post = Post::where(['type' => 'academicyear'])->get();

        return view('backend.academicYear.showAcademicYear', ['post' => $post]);
    }


    public function edit( $id )
    {
        $data = Post::find( $id );

        return view('backend.academicYear.academicYear_edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = Post::find($request->id);
        $data->record = $request->academicyear;
        $data->update();
        return redirect()->route('academic.edit',$data->id)->with('success', 'AcademicYear updated Successfully');

    }

    public function delete($id)
    {
        $data = Post::find($id);
        $data->delete();

        return redirect()->route('academic.show')->with('success', 'AcademicYear deleted Successfully');
    }
}
