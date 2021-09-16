@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Admin Leave List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Admin Leave List</li>
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

   <div style="margin-botton: 20px;">
      <a href="{{ route('showAdminApplyLeavePage') }}" class="btn btn-primary">Apply Leave</a>
   </div>


<div class="container">
   <table id="adminOwnLeaveApplicationList" class="table table-bordered table-hover">
      <thead>
         <tr>
            <th>Leave Application ID</th>
            <th>Leave Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Reason</th>
            <th>File</th>
            <th>Action</th>
         </tr>
      </thead>

      <tbody>
         @foreach($adminLeaveApplications as $adminLeaveApplication)
         <tr>
            <td>{{ $adminLeaveApplication->id }}</td>
            <td>{{ $adminLeaveApplication->leaveTypeName }}</td>
            <td>{{ $adminLeaveApplication->start_date }}</td>
            <td>{{ $adminLeaveApplication->end_date }}</td>
            <td>{{ $adminLeaveApplication->status }}</td>
            <td>{{ $adminLeaveApplication->reason }}</td>
            <td>
               @if ($adminLeaveApplication->document != '')
               <a href="{{ asset('documents/') }}/{{$adminLeaveApplication->document}}" class="link" target="_blank">File</a>
               @else
               -
               @endif
            </td>
            <td>
               @php
                  $today=date("Y-m-d");
                  $leaveDate=$adminLeaveApplication->start_date;
               @endphp

               @if (($today < $leaveDate) && ($adminLeaveApplication->status !== 'Cancelled'))
               <a href="{{ route('cancelLeaveAdmin', ['adminId' => $adminLeaveApplication->admin, 'id' => $adminLeaveApplication->id])}}" class="btn btn-danger" onclick="return confirm('Cancel this leave application?')">Cancel</a>
               @else
               -
               @endif
            </td>

         </tr>
         @endforeach
      </tbody>   
   </table>
</div>
@endsection
