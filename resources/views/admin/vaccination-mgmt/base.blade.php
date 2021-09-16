@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Employee Vaccination Management</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                    <li class="breadcrumb-item active">Vaccination</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @yield('action-content')

@endsection