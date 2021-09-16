@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Entitlement</h3>
            </div>
            <div class="col-sm-6">
            @foreach($leaveGrades as $leaveGrade)
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Leave</a></li>
                    <li class="breadcrumb-item"> <a href="#">{{ $leaveGrade->name }}</a></li>
                    <li class="breadcrumb-item active">Leave Entitlement</li>
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

<div class="container">

      <table id="leaveEntitlementTable" class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Leave Type ID</th>
               <th>Leave Type Name</th>
               <th>Number of Days Entitled</th>
               <th>Action</th>
            </tr>
         </thead>

         <tbody>
            @foreach($currentEntitlements as $currentEntitlement)
            <tr>
               <td>{{ $currentEntitlement->leaveTypeId}}</td>
               <td>{{ $currentEntitlement->leaveTypeName }}</td>
               <td>{{ $currentEntitlement->num_of_days }}</td>
               <td>
                  <a href="{{ route('editLeaveEntitlement', ['leaveGradeId' => $leaveGrade->id,'id' => $currentEntitlement->id]) }}" class="btn btn-warning" >
                     <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="{{ route('deleteLeaveEntitlement', ['leaveGradeId' => $leaveGrade->id,'id' => $currentEntitlement->id]) }}" class="btn btn-danger" onclick="return confirm('Delete {{$currentEntitlement->leaveTypeName}}?')">
                     <i class="bi bi-trash-fill"></i>
                  </a>
            </td>
            </tr>
            @endforeach
         </tbody>      
      </table>

   <br>
   <br>

   <form action="{{ route('addLeaveEntitlement', ['id' => $leaveGrade->id]) }}" method="post">
      @csrf
      <div class="card-body" style="width: 400px; margin: 0 auto;">
         <input type="hidden" name="id" value="{{ $leaveGrade->id }}">
         <div class="mb-3">
            <label for="leavesEntitled" class="form-label">Leave Type: </label>
            <select class="form-select form-select-sm" name= "leaveType" id= "leaveType" required>
               @foreach($leaveTypes as $leaveType)

                  @php $added = 0; @endphp
                  @foreach($currentEntitlements as $currentEntitlement)
                     @if($leaveType->id==$currentEntitlement->leaveTypeId)
                        @php $added = 1; @endphp
                     @endif
                  @endforeach

                  @if($added==0 && $leaveType->status!='Deleted')
                  <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                  @endif

               @endforeach
            </select>
         </div>
         <div class="mb-3">
            <label for="num_of_days" class="form-label">Number of days entitled:</label>
            <input type="number" class="form-control form-control-sm" name="num_of_days" min="0" value="" required>
         </div>
         <input type="submit" name="addLeaveType" value="Add leave type" class="btn btn-info">
      </div>
   </form>
   @endforeach
</div>
@endsection
