@extends('layouts.empapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Grade</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Leave</li>
                    <li class="breadcrumb-item active">Leave Grade</li>
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

<div>
   @foreach($employees as $employee)

   <div class="leave_grade" style="font-color: black; margin: 10px 0;" >
       <label for=""> Employee's ID: {{ $employee->id }}</label><br />
       <label for="">Employee's Name: {{ $employee->employee_Name }}</label><br />
       <label for="">Employee's Leave Grade: {{ $employee->leave_grade }} {{ $employee->leaveGradeName }}</label><br />
   </div>

   @if($employee->leave_grade == 'Unassigned')
   <p>Leave grade is not yet assigned.</p>
   @endif

   <table class="table table-bordered table-hover">
      <tr>
         <th>Leave Type ID</th>
         <th>Leave Type Name</th>
         <th>Number of Days Entitled</th>
         <th>Leaves Taken</th>
         <th>Remaining Days</th>
         <th>Year</th>
         <th>Status</th>
      </tr>

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
      <tr>

      </tr>
   </table>

   @endforeach
</div>


@endsection
