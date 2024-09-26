@extends('backend.layouts.app')

@section('main-content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Grades</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Grade</h3>
                        </div>


                        <form action="{{ route('grade.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Grade / Level</label>
                                    <input type="text" name="grade" class="form-control" id="exampleInputEmail1"
                                        placeholder="class 9">
                                </div>

                                @error('grade')
                                <p class="text-danger">{{ $message }}</p>   
                                @enderror

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection


@section('custom-js')
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection

<!-- Mirrored from adminlte.io/themes/v3/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:40 GMT -->
