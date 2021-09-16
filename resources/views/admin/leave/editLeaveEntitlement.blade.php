@extends('layouts.adminapp')

<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success')}}
    </div>
@endif

@foreach($leaveGrades as $leaveGrade)

<div class="container" style="width: 400px;">

   @foreach($leaveEntitlements as $leaveEntitlement)
   <form action="{{ route('updateLeaveEntitlement', ['leaveGradeId'=>$leaveGrade->id,'id' => $leaveEntitlement->id]) }}" method="post">
      @csrf
      <div class="card-body">

         <div class="mb-3">
            <label for="leavesEntitled" class="form-label">Leave Type: </label>
            <select name= "leaveType" id= "leaveType" class="form-select" required>
               <option name= "leaveType" value="{{ $leaveEntitlement->leaveType}}">{{ $leaveEntitlement->leaveTypeName }}</option>

               @foreach($leaveTypes as $leaveType)
                  @php $added = 0; @endphp
                  @foreach($currentEntitlements as $currentEntitlement)
                     @if($leaveType->id==$currentEntitlement->leaveTypeId)
                        @php $added = 1; @endphp
                     @endif
                  @endforeach

               @if($added==0)
                  <option name= "leaveType" value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
               @endif
               @endforeach
            </select>
         </div>
         <div class="mb-3">
               <label for="num_of_days" class="form-label">Number of days entitled:</label>
               <input type="number"class="form-control" name="num_of_days" min="0" value="{{ $leaveEntitlement->num_of_days }}" required>
         </div>
            
         <input type="submit" name="updateLeaveEntitlement" value="Update" class="btn btn-primary">
         <a href="{{ route('leaveEntitlement', ['id' => $leaveGrade->id]) }}" class="btn btn-info">Back</a>

      </div>      
   </form>
   @endforeach
@endforeach
</div>
@endsection


