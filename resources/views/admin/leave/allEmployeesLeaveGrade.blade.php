@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Employee Leave Grade</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Employee Leave Grade</li>
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

@if(Session::has('primary'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('primary')}}
    </div>
@endif

@if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger')}}
    </div>
@endif

    <div style="margin-bottom: 20px;">

        <a href="{{ route('createLeaveRecord') }}" class="btn btn-primary">Refresh</a>
        
    </div>

<div>
   <table id="allEmployeesLeaveGradeTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Leave Grade</th>
            <th>Action</th>
         </tr>
      </thead>

      <tbody>
         @foreach($employees as $employee)
         <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->full_name }}</td>
            <td>{{ $employee->leave_grade }} {{ $employee->leaveGradeName }}</td>
            <td>
               <a href="{{ route('employeesLeaveGrade', ['id' => $employee->id]) }}" class="btn btn-primary">View/Edit Leave Information</a>
            </td>
         </tr>
         @endforeach
      </tbody>

   </table>

</div>


@endsection
