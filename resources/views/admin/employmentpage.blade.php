@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Employment</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">Employment</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.addemployment')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployment">
                Add Employment
            </button>
        </div>

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <table id="employmentTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Employment Type</th>
                    <th>Working Time</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($employments as $employment)
            <tr>
                <td>{{ $employment->id }}</td>
                <td>{{ $employment->employment_name }}</td>
                <td>{{ $employment->workingtime_id }}</td>
                   
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editEmployment{{$employment->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deleteEmployment', ['id' => $employment->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('admin.editemployment')
            </tr>
            @endforeach
        </table>
        <a href="{{ route('showEmployment') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#employmentTableid').DataTable({
                "pagingType": "full_numbers",
            });
        });
    </script>
@endsection