@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Application</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"> <a href="#">Leave</a></li>
                    <li class="breadcrumb-item active">Leave Application</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
<script type="text/javascript">

function checkAndCalculate() {

   //get selected leave type
   var selectedLeaveType = document.getElementById("leaveType");
   var result = selectedLeaveType.options[selectedLeaveType.selectedIndex].value;

   //get remaining days for the leave type
   var adminLeaveRemainingDays = 0;
   @foreach($adminLeaves as $adminLeave)
   var leaveType = "{{ $adminLeave->leave_type }}";
   if(result === leaveType) {
      adminLeaveRemainingDays = {{ $adminLeave->remaining_days }};
   }
   @endforeach

   var pendingLeaveApplicationDays = 0;
   @foreach($adminLeaveApplications as $adminLeaveApplication)
   var applicationLeaveType = {{ $adminLeaveApplication->leave_type_id }};
   if(result == applicationLeaveType) {
         pendingLeaveApplicationDays = pendingLeaveApplicationDays + {{ $adminLeaveApplication->num_of_days }};
   }
   @endforeach

   var remainingAfterPending = adminLeaveRemainingDays - pendingLeaveApplicationDays;

   if(adminLeaveRemainingDays === 0) {
      document.getElementById("startDate").value = "";
      document.getElementById("endDate").value = "";
      alert("You have no remaining leave entitlement for this leave type! \nPlease apply for unpaid leaves for the exceeded days!");
   } else {
      var currentDate = new Date();

      var startDateInput = document.getElementById("startDate").value;
      var startDate = Date.parse(startDateInput);

      var endDateInput = document.getElementById("endDate").value;
      var endDate = Date.parse(endDateInput);

      if(currentDate > startDate) {
         alert("The start date cannot be later than today's date!");
         document.getElementById("startDate").value = "";
      } else if(currentDate > endDate) {
         alert("The end date cannot be later than today's date!");
         document.getElementById("endDate").value = "";
      } else if(startDate > endDate) {
         alert("The end date cannot be earlier than the start date!");
         document.getElementById("endDate").value = "";
      } else {
         var difference = endDate - startDate;
         var dayDifference = (difference / (1000 * 60 * 60 * 24)) + 1;

         //if users have not select any of the dates
         if(isNaN(dayDifference)) {
            dayDifference = 0;
         }

         if(dayDifference > adminLeaveRemainingDays) {
            //compare remaining days with day difference
            document.getElementById("endDate").value = "";
            alert("Your remaining leave entitlement for the leave type is not enough! \nPlease apply for unpaid leaves for the exceeded days!");
         } else if(dayDifference > remainingAfterPending) {
            //compare remaining days + total days of pending leave application for the leave type with day difference
            document.getElementById("endDate").value = "";
            alert("The total days of your pending leave application and current leave application exceed the remaining days for the leave type!")
         } else {
            document.getElementById("numOfDays").value = dayDifference;
         }
      }
   }
}

function changeAdminLeave() {
   var selectedLeaveType = document.getElementById("leaveType");
   var result = selectedLeaveType.options[selectedLeaveType.selectedIndex].value;

   document.getElementById("leaveInformation").hidden = false;

   @foreach($adminLeaves as $adminLeave)
   if("{{ $adminLeave->leave_type }}" === result) {
      document.getElementById("adminLeaveLeaveType").innerHTML="{{ $adminLeave->leave_type }}";
      document.getElementById("adminLeaveLeaveTypeName").innerHTML="{{ $adminLeave->leaveTypeName }}";
      document.getElementById("adminLeaveTotalDays").innerHTML="{{ $adminLeave->total_days }}";
      document.getElementById("adminLeaveLeavesTaken").innerHTML="{{ $adminLeave->leaves_taken }}";
      document.getElementById("adminLeaveRemainingDays").innerHTML="{{ $adminLeave->remaining_days }}";
   }
   @endforeach
}

</script>

<div class="container">
   <form method="post" action="{{ route('submitAdminApplication') }}" enctype="multipart/form-data" onsubmit="return validate()">
      @csrf
      <div class="row g-3 mb-3">
         <div class="col-auto pt-1">
            <label for="leaveType" class="label">Leave Type</label>
         </div>
         <div class="col-md-3">
            <select class="form-control" name="leaveTypeId" id="leaveType" onchange="changeAdminLeave();checkAndCalculate()" required>
               @foreach($adminLeaves as $adminLeave)
               <option value="{{ $adminLeave->leave_type }}">{{ $adminLeave->leaveTypeName}}</option>
               @endforeach
            </select>
         </div>
      </div>

      <table id="leaveInformation" class="table table-bordered table-hover">
         <tr>
            <th>Leave Type ID</th>
            <th>Leave Type Name</th>
            <th>Total Days</th>
            <th>Number of Leaves Taken</th>
            <th>Remaining Days</th>
         </tr>

         @php $number=0; @endphp
         @foreach($adminLeaves as $adminLeaves)
         @if($number==0)
            @php $number=$number+1; @endphp
            <tr>
               <td id="adminLeaveLeaveType">{{ $adminLeave->leave_type }}</td>
               <td id="adminLeaveLeaveTypeName">{{ $adminLeave->leaveTypeName }}</td>
               <td id="adminLeaveTotalDays">{{ $adminLeave->total_days }}</td>
               <td id="adminLeaveLeavesTaken">{{ $adminLeave->leaves_taken }}</td>
               <td id="adminLeaveRemainingDays">{{ $adminLeave->remaining_days }}</td>
            </tr>
         @endif
         @endforeach
      </table>

      @foreach($admins as $admin)
      <input type="hidden" class="form-control" name="admin" value="{{ $admin->id }}">
      @endforeach

      <div class="card-body" style="width: 450px; margin: 0 auto;">

         <div class="mb-3">
            <label for="startDate" class="form-label">Start date</label>
            <input type="date" class="form-control" name="startDate" id="startDate" required onchange="checkAndCalculate()">
         </div>

         <div class="mb-3">
            <label for="endDate" class="form-label">End date</label>
            <input type="date" class="form-control" name="endDate" id="endDate" required onchange="checkAndCalculate()">
         </div>

         <div class="mb-3">
            <label for="endDate" class="form-label">End date</label>
            <input type="date" class="form-control" name="endDate" id="endDate" required onchange="checkAndCalculate()">
         </div>

         <input type="hidden" id="numOfDays" name="numOfDays" value="">

         <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <textarea name="reason" class="form-control" rows="3" required></textarea>
         </div>

         <div class="mb-3">
            <label for="document" class="form-label">Document</label>
            <input type="file" class="form-control" name="document" value="">
         </div>

         <div class="mb-3" style="text-align:center; font-size: 17px;">
               <input class="btn btn-success" type="submit" name="create" value="Apply">
         </div>
      </div>
   </form>
</div>
@endsection
