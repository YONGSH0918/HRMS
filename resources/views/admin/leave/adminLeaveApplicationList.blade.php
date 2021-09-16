@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Admin Apply List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Admin Apply List</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
   function approve() {
      document.getElementById("leaveProcessing").action = "{{ route('approveMultipleAdminLeave') }}";
   }

   function reject() {
      document.getElementById("leaveProcessing").action = "{{ route('rejectMultipleAdminLeave') }}";
   }

   function selectAll() {
      var checkboxes = document.getElementsByName("adminLeaveApplication[]");

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

      <div style="margin-botton: 20px;">
         <input type="submit" name="submitButton" value="Approve" class="btn btn-success" onclick="approve()">
         <input type="submit" name="submitButton" value="Reject" class="btn btn-warning" onclick="reject()">
      </div>

      
      <table id="adminLeaveApplicationListTable" class="table table-bordered table-hover">
         <thead>
            <tr>
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
            @foreach($adminLeaveApplications as $adminLeaveApplication)
               @php
                  $today=date("Y-m-d");
                  $leaveDate=$adminLeaveApplication->start_date;
               @endphp
            <tr>
               <td>
                  @if (($today < $leaveDate) && ($adminLeaveApplication->status !== 'Cancelled'))
                  <input type="checkbox" name="adminLeaveApplication[]" value="{{ $adminLeaveApplication->id }}">
                  @endif
               </td>
               <td>{{ $adminLeaveApplication->id }}</td>
               <td>{{ $adminLeaveApplication->leaveTypeName }}</td>
               <td>{{ $adminLeaveApplication->admin }} {{ $adminLeaveApplication->adminName }}</td>
               <td>{{ $adminLeaveApplication->start_date }}</td>
               <td>{{ $adminLeaveApplication->end_date }}</td>
               <td>{{ $adminLeaveApplication->status }}</td>
               <td>{{ $adminLeaveApplication->reason }}</td>
               <td>
                  @if ($adminLeaveApplication->document != '')
                  <a href="{{ asset('documents/') }}/{{ $adminLeaveApplication->document }}" class="link" target="_blank">File</a>
                  @else
                  -
                  @endif
               </td>
               <td>
                  @if (($today < $leaveDate) && ($adminLeaveApplication->status !== 'Cancelled'))
                     @if ($adminLeaveApplication->status !== 'Approved')
                     <a href="{{ route('approveAdminLeave', ['adminId' => $adminLeaveApplication->admin, 'id' => $adminLeaveApplication->id]) }}" class="btn btn-success" >Approve</a>
                     @endif

                     @if ($adminLeaveApplication->status !== 'Rejected')
                     <a href="{{ route('rejectAdminLeave', ['adminId' => $adminLeaveApplication->admin, 'id' => $adminLeaveApplication->id]) }}" class="btn btn-warning" >Reject</a>
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
