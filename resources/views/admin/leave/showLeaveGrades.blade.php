@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Grade</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
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

<script type="text/javascript">
function validate(leaveGradeId) {
   var number=0;

   @foreach($employees as $employee)
   $employeeLeaveGrade={{ $employee->leave_grade }}
   if($employeeLeaveGrade==leaveGradeId) {
      number=number+1;
   }
   @endforeach

   if(number!=0) {
      alert('The leave grade is assigned to at least an employee!');
      return false;
   } else {
      var leaveGradeName="";
      @foreach($leaveGrades as $leaveGrade)
      if({{ $leaveGrade->id }}==leaveGradeId) {
         leaveGradeName="{{ $leaveGrade->name }}";
      }
      @endforeach

      return confirm("Delete " + leaveGradeName + "?");
   }
}
</script>

@include('admin.leave.createLeaveGrade')

<div class="container">

   <div style="margin-bottom: 20px;">

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeaveGrade">
         Create Leave Grade
      </button>

   </div>

   <table id="leaveGradeTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <td>ID</td>
            <td>Leave Grade Name</td>
            <td>Action</td>
         </tr>
      </thead>

      <tbody>
         @foreach($leaveGrades as $leaveGrade)
         <tr>
            <td>{{$leaveGrade->id}}</td>
            <td>{{$leaveGrade->name}}</td>
            <td>
               <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editLeaveGrade{{$leaveGrade->id}}">
                  <i class="bi bi-pencil-square"></i>
               </button>
               <a href="{{ route('deleteLeaveGrade', ['id' => $leaveGrade->id]) }}" class="btn btn-danger" onclick="return validate({{ $leaveGrade->id }})" onclick="">
                  <i class="bi bi-trash-fill"></i>
               </a>
               <a href="{{ route('leaveEntitlement', ['id' => $leaveGrade->id]) }}" class="btn btn-info" >Leave Entitlement</a>
            </td>
            @include('admin.leave.editLeaveGradeName')
         </tr>
         @endforeach
      </tbody>   
   </table>
</div>
@endsection
