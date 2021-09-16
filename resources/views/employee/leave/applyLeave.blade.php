@extends('layouts.empapp')


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Leave Application</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Leave</li>
                    <li class="breadcrumb-item active">Apply Leave</li>
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
   var employeeLeaveRemainingDays = 0;
   @foreach($employeeLeaves as $employeeLeave)
   var leaveType = "{{ $employeeLeave->leave_type }}";
   if(result === leaveType) {
      employeeLeaveRemainingDays = {{ $employeeLeave->remaining_days }};
   }
   @endforeach

   var pendingLeaveApplicationDays = 0;
   @foreach($leaveApplications as $leaveApplication)
   var applicationLeaveType = {{ $leaveApplication->leave_type_id }};
   if(result == applicationLeaveType) {
         pendingLeaveApplicationDays = pendingLeaveApplicationDays + {{ $leaveApplication->num_of_days }};
   }
   @endforeach

   var remainingAfterPending = employeeLeaveRemainingDays - pendingLeaveApplicationDays;

   if(employeeLeaveRemainingDays === 0) {
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

         if(dayDifference > employeeLeaveRemainingDays) {
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

function changeEmployeeLeave() {
   var selectedLeaveType = document.getElementById("leaveType");
   var result = selectedLeaveType.options[selectedLeaveType.selectedIndex].value;

   document.getElementById("leaveInformation").hidden = false;

   @foreach($employeeLeaves as $employeeLeave)
   if("{{ $employeeLeave->leave_type }}" === result) {
      document.getElementById("employeeLeaveLeaveType").innerHTML="{{ $employeeLeave->leave_type }}";
      document.getElementById("employeeLeaveLeaveTypeName").innerHTML="{{ $employeeLeave->leaveTypeName }}";
      document.getElementById("employeeLeaveTotalDays").innerHTML="{{ $employeeLeave->total_days }}";
      document.getElementById("employeeLeaveLeavesTaken").innerHTML="{{ $employeeLeave->leaves_taken }}";
      document.getElementById("employeeLeaveRemainingDays").innerHTML="{{ $employeeLeave->remaining_days }}";
   }
   @endforeach
}

</script>

<div class="container">
   <form method="post" action="{{ route('submitApplication') }}" enctype="multipart/form-data" onsubmit="return validate()">
      @csrf
      <div class="row g-3 mb-3">
         <div class="col-auto pt-1">
            <label for="leaveType" class="form-label">Leave Type</label>
         </div>
         <div class="col-md-3">
            <select class="form-select form-select-sm" name="leaveTypeId" id="leaveType" onchange="changeEmployeeLeave();checkAndCalculate()" required>
               @foreach($employeeLeaves as $employeeLeave)
               <option value="{{ $employeeLeave->leave_type }}">{{ $employeeLeave->leaveTypeName}}</option>
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
         @foreach($employeeLeaves as $employeeLeave)
         @if($number==0)
            @php $number=$number+1; @endphp
            <tr>
               <td id="employeeLeaveLeaveType">{{ $employeeLeave->leave_type }}</td>
               <td id="employeeLeaveLeaveTypeName">{{ $employeeLeave->leaveTypeName }}</td>
               <td id="employeeLeaveTotalDays">{{ $employeeLeave->total_days }}</td>
               <td id="employeeLeaveLeavesTaken">{{ $employeeLeave->leaves_taken }}</td>
               <td id="employeeLeaveRemainingDays">{{ $employeeLeave->remaining_days }}</td>
            </tr>
         @endif
         @endforeach
      </table>

      @foreach($employees as $employee)
      <input type="hidden" class="form-control" name="employee" value="{{ $employee->id }}">
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
