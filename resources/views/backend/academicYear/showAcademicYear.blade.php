@extends('backend.layouts.app')

@section('main-content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Year List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Academic Years</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Academic Years</h3>
                        </div>

                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created Time</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if ($data->isNotEmpty())
                                        @foreach ($data as $item)
                                            @php
                                                $dateTime = new DateTime(
                                                    $item->created_at,
                                                    new DateTimeZone('UTC'),
                                                ); // Original UTC time
                                                $dateTime->setTimezone(new DateTimeZone('Asia/Kathmandu')); 

                                            @endphp
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->academicyear }}</td>
                                                <td>{{ $dateTime->format('Y-m-d H:i:s') }}</td>
                                                <td><a href=""><button class="btn btn-primary">Edit</button></a></td>
                                                <td><a href=" {{ route('academic.delete', $item->id ) }} "><button class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">No data available.</td>
                                        </tr>
                                    @endif


                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
