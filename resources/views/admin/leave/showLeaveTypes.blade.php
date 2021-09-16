@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Type</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#}">Leave</a></li>
                    <li class="breadcrumb-item active">Leave Type</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success')}}
    </div>
@endif

@include('admin.leave.createLeaveType')

<div class="container">

    <div style="margin-bottom: 20px;">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeaveType">
            Create Leave Type
        </button>

    </div>

   <table id="leaveTypesTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <td>ID</td>
            <td>Leave Type Name</td>
            <td>Minimum Number of Days</td>
            <td>Action</td>
         </tr>
      </thead>

      <tbody>
         @foreach($leaveTypes as $leaveType)
         <tr>
            <td>{{$leaveType->id}}</td>
            <td>{{$leaveType->name}}</td>
            <td>{{$leaveType->min_num_of_days}}</td>
            <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editLeaveType{{$leaveType->id}}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <a href="{{ route('deleteLeaveType', ['id' => $leaveType->id]) }}" class="btn btn-danger" onclick="return confirm('Delete {{$leaveType->name}}?')">
                    <i class="bi bi-trash-fill"></i>
                </a>
            </td>
            @include('admin.leave.editLeaveType')
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection
