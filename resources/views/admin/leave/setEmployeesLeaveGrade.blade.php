@extends('layouts.adminapp')

<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success')}}
    </div>
@endif

<script type="text/javascript">
   function validate() {
      @foreach($employees as $employee)
      var selectedLeaveGrade = document.getElementById("employeesLeaveGrade");
      var result = selectedLeaveGrade.options[selectedLeaveGrade.selectedIndex].value;
      var currentLeaveGrade = {{ $employee->leave_grade }};

      if (result == currentLeaveGrade) {
         alert('The selected leave grade is the same as the current leave grade.');
         return false;
      }
      @endforeach
   }
</script>


<div>
   @foreach($employees as $employee)
      <form action="{{ route('updateEmployeesLeaveGrade') }}" method="post" onsubmit="return validate()">
         @csrf
         <p>
            <label for="employeeId">Employee ID</label>
            <input type="text" name="employee" value="{{ $employee->id }}" class="form-control" readonly>
         </p>

         <p>
            <label for="employeeName">Employee Name</label>
            <input type="text" name="full_name" value="{{ $employee->employee_Name}}" class="form-control" readonly>
         </p>

         <p>
            <label for="employeesLeaveGrade">Employee's Leave Grade</label>
            <select class="form-control" id="employeesLeaveGrade" name="leave_grade">
               @foreach($leaveGrades as $leaveGrade)
                  @if($leaveGrade->status !== 'Deleted')
                  <option value="{{ $leaveGrade->id }}"
                     @if($leaveGrade->id == $employee->leave_grade)
                     selected
                     @endif>
                     {{ $leaveGrade->name }}
                  </option>
                  @endif
               @endforeach
            </select>
         </p>

         <input type="hidden" name="originalLeaveGrade" value="{{ $employee->leave_grade }}">

         <input type="submit" name="assignButton" value="Assign">
      </form>
      @endforeach
</div>


@endsection
