@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Employee's Leave Grade</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Employee's Leave Grade</li>
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
   @foreach($employees as $employee)
   <p class="font-weight-bold">
      Employee's ID: {{ $employee->id }}
   </p>

   <p class="font-weight-bold">
      Employee's Name: {{ $employee->full_name }}
   </p>

   <p class="font-weight-bold">
      Employee's Leave Grade: {{ $employee->leave_grade }} {{ $employee->leaveGradeName }}
   </p>

   @if($employee->leave_grade == 'Unassigned')
   <p>Leave grade is not yet assigned.</p>
   @endif

   <div style="margin-bottom: 20px;">

      <a href="{{ route('setEmployeesLeaveGrade', ['id' => $employee->id]) }}" class="btn btn-primary">Change Leave Grade</a>

   </div>

   <table id="employeesLeaveGradeTable" class="table table-bordered table-hover">
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
         @foreach($employeeLeaves as $employeeLeave)
         <tr>
            <td>{{ $employeeLeave->leave_type }}</td>
            <td>{{ $employeeLeave->leaveTypeName }}</td>
            <td>{{ $employeeLeave->total_days }}</td>
            <td>{{ $employeeLeave->leaves_taken }}</td>
            <td>{{ $employeeLeave->remaining_days }}</td>
            <td>{{ $employeeLeave->year }}</td>
            <td>{{ $employeeLeave->status }}</td>
         </tr>
         @endforeach
      </tbody>         
   </table>

   @endforeach
</div>


@endsection
