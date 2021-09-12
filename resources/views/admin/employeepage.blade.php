@extends('layouts.hrms')
@section('content')

    <div class="container">
        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <table class="table table-bordered table-hover dataTable">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($employees as $employee)
            <tbody>
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->employee_Name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->email }}</td>
                    <td><img src="{{ asset('images/') }}/{{$employee->image}}" alt="" width="50"></td>
                   
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Comfirm to delete?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection