@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Job Title</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">Job Title</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.addjobtitle')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobtitle">
                Add Job Title
            </button>
        </div>

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <table id="jobtitleTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Job Title</th>
                    <th width="30%">Department</th>
                    <th>Description</th>
                    <th width="15%" style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($jobtitles as $jobtitle)
            <tr>
                <td>{{ $jobtitle->id }}</td>
                <td>{{ $jobtitle->jobtitle_name }}</td>
                <td>{{ $jobtitle->department_id }}</td>
                <td>{{ $jobtitle->description }}</td>
                    
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editJobtitle{{$jobtitle->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deleteJobtitle', ['id' => $jobtitle->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this Job title?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('admin.editjobtitle')
            </tr>
            @endforeach
        </table>
        <a href="{{ route('showJobtitle') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#jobtitleTableid').DataTable({
                "pagingType": "full_numbers",
            });
        });
    </script>
@endsection