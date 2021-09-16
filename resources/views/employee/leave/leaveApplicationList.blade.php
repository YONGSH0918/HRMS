@extends('layouts.empapp')

<script type="text/javascript">
function selectAll() {
   var checkboxes = document.getElementsByName("leaveApplication[]");

   if(document.getElementById("selectAllCheckbox").checked) {
      //check all checkboxes
      for(var i=0; i<checkboxes.length; i++) {
         checkboxes[i].checked = true;
      }
   } else {
      //uncheck all checkboxes
      for(var i=0; i<checkboxes.length; i++) {
         checkboxes[i].checked = false;
      }
   }
}
</script>

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Leave</li>
                    <li class="breadcrumb-item active">Leave List</li>
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

   <div>
      <a href="{{ route('showApplyLeavePage') }}" class="btn btn-primary">Apply Leave</a>
   </div>

   <form class="" action="{{ route('cancelMultiple') }}" method="get">

      <div style="float: right; margin-bottom: 20px;">
         <input type="submit" name="cancelButton" value="Cancel" class="btn btn-success">
      </div>

      <table id="employeeLeaveApplicationList" class="table table-bordered table-hover">
         <thead>
            <tr style="font-size: 14px;">
               <th>
                  <input type="checkbox" id="selectAllCheckbox" value="" onchange="selectAll()">
               </th>
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
            @foreach($leaveApplications as $leaveApplication)
            @php
               $today=date("Y-m-d");
               $leaveDate=$leaveApplication->start_date;
            @endphp

            <tr>
               <td>
                  @if($today < $leaveDate)
                  <input type="checkbox" name="leaveApplication[]" value="{{ $leaveApplication->id }}">
                  @endif
               </td>
               <td>{{ $leaveApplication->id }}</td>
               <td>{{ $leaveApplication->leaveTypeName }}</td>
               <td>{{ $leaveApplication->start_date }}</td>
               <td>{{ $leaveApplication->end_date }}</td>
               <td>{{ $leaveApplication->status }}</td>
               <td>{{ $leaveApplication->reason }}</td>
               <td>
                  @if ($leaveApplication->document != '')
                  <a href="{{ asset('documents/') }}/{{$leaveApplication->document}}" class="link" target="_blank">File</a>
                  @else
                  -
                  @endif
               </td>
               <td>
                  @php
                     $today=date("Y-m-d");
                     $leaveDate=$leaveApplication->start_date;
                  @endphp

                  @if (($today < $leaveDate) && ($leaveApplication->status !== 'Cancelled'))
                  <a href="{{ route('cancelLeave', ['employeeId' => $leaveApplication->employee, 'id' => $leaveApplication->id])}}" class="btn btn-danger" onclick="return confirm('Cancel this leave application?')">Cancel</a>
                  @else
                  -
                  @endif
               </td>
            </tr>
            @endforeach
         </tbody>                  
      </table>
   </form>

</div>
@endsection
