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

<div>
   @foreach($admins as $admin)
   <p class="font-weight-bold">
      Admin's ID: {{ $admin->id }}
   </p>

   <p class="font-weight-bold">
      Admin's Name: {{ $admin->full_name }}
   </p>

   <p class="font-weight-bold">
      Admin's Leave Grade: {{ $admin->leave_grade }} {{ $admin->leaveGradeName }}
   </p>

   @if($admin->leave_grade == 'Unassigned')
   <p>Leave grade is not yet assigned.</p>
   @endif

   <div style="margin-bottom: 20px;">
        <a href="{{ route('setAdminsLeaveGrade', ['id' => $admin->id]) }}" class="btn btn-primary">Change Leave Grade</a>
   </div>

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
      <tr>

      </tr>
   </table>

   @endforeach
</div>


@endsection
