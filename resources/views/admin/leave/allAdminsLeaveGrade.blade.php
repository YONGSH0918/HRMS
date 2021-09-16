@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">All Admin's Leave Grade</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">All Admin's Leave Grade</li>
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
   <table id="allAdminsLeaveGradeTable" class="table table-bordered table-hover">
      <tr>
         <th>ID</th>
         <th>Admin Name</th>
         <th>Leave Grade</th>
         <th>Action</th>
      </tr>

      @foreach($admins as $admin)
      <tr>
         <td>{{ $admin->id }}</td>
         <td>{{ $admin->full_name }}</td>
         <td>{{ $admin->leave_grade }} {{ $admin->leaveGradeName }}</td>
         <td>
            <a href="{{ route('adminsLeaveGrade', ['id' => $admin->id]) }}" class="btn btn-primary">View/Edit Leave Information</a>
         </td>
      </tr>
      @endforeach

   </table>

</div>


@endsection
