@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Application List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Leave Application List</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
   function approve() {
      document.getElementById("leaveProcessing").action = "{{ route('approveMultipleLeave') }}";
   }

   function reject() {
      document.getElementById("leaveProcessing").action = "{{ route('rejectMultipleLeave') }}";
   }

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

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success')}}
    </div>
@endif

<div class="container">
   <form id="leaveProcessing" action="" method="get">
      @csrf

      <div class="mb-3">
         <input type="submit" name="submitButton" value="Approve" class="btn btn-success" onclick="approve()">
         <input type="submit" name="submitButton" value="Reject" class="btn btn-warning" onclick="reject()">
      </div>


      <table id="employeeLeaveApplicationListAdminView" class="table table-bordered table-hover">
         <thead>
            <tr style="font-size: 15px;">
               <th>
                  <input type="checkbox" id="selectAllCheckbox" value="" onchange="selectAll()">
               </th>
               <th>Leave Application ID</th>
               <th>Leave Type</th>
               <th>Employee</th>
               <th>Start Date Time</th>
               <th>End Date Time</th>
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
                  @if (($today < $leaveDate) && ($leaveApplication->status !== 'Cancelled'))
                  <input type="checkbox" name="leaveApplication[]" value="{{ $leaveApplication->id }}">
                  @endif
               </td>
               <td>{{ $leaveApplication->id }}</td>
               <td>{{ $leaveApplication->leaveTypeName }}</td>
               <td>{{ $leaveApplication->employee }} {{ $leaveApplication->employeeName }}</td>
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
                  @if (($today < $leaveDate) && ($leaveApplication->status !== 'Cancelled'))
                     @if ($leaveApplication->status !== 'Approved')
                     <a href="{{ route('approveLeave', ['employeeId' => $leaveApplication->employee, 'id' => $leaveApplication->id]) }}" class="btn btn-success" >Approve</a>
                     @endif

                     @if ($leaveApplication->status !== 'Rejected')
                     <a href="{{ route('rejectLeave', ['employeeId' => $leaveApplication->employee, 'id' => $leaveApplication->id]) }}" class="btn btn-warning" >Reject</a>
                     @endif
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
