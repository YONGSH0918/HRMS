@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Admin's Leave Grade</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Admin's Leave Grade</li>
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

<h1></h1>

<div>
   @foreach($admins as $admin)
   
   <div class="leave_grade" style="font-color: black; margin: 10px 0;" >
       <label for="">Admin's ID: {{ $admin->id }}</label><br />
       <label for="">Admin's Name: {{ $admin->full_name }}</label><br />
       <label for="">Admin's Leave Grade: {{ $admin->leave_grade }} {{ $admin->leaveGradeName }}</label><br />
   </div>
   
   @if($admin->leave_grade == 'Unassigned')
   <p>Leave grade is not yet assigned.</p>
   @endif

   <table id="adminOwnLeaveGradeTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <th>Leave Type ID</th>
            <th>Leave Type Name</th>
            <th>Number of Days Entitled</th>
            <th>Leaves Taken</th>
            <th>Remaining Days</th>
            <th>Year</th>
            <th>Status</th>
         </tr>
      </thead>

      <tbody>
         @foreach($adminLeaves as $adminLeave)
         <tr>
            <td>{{ $adminLeave->leave_type }}</td>
            <td>{{ $adminLeave->leaveTypeName }}</td>
            <td>{{ $adminLeave->total_days }}</td>
            <td>{{ $adminLeave->leaves_taken }}</td>
            <td>{{ $adminLeave->remaining_days }}</td>
            <td>{{ $adminLeave->year }}</td>
            <td>{{ $adminLeave->status }}</td>
         </tr>
         @endforeach
      </tbody>            
   </table>

   @endforeach
</div>


@endsection
