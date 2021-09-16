@extends('layouts.empapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Vaccination Appoinment Management</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Vaccination Appointment</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @yield('action-content')

@endsection