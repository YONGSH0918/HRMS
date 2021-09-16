@extends('admin.career-path-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Add New Career Path Development
                    <div style="text-align: -webkit-right;">
                        <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployeeCPD') }}">Back</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form name="formAddCPD" class="form-horizontal" role="form" method="POST" action="{{ route('addCPD') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!--CPD ID -->
                        <div class="form-group">
                            <label for="employee_CareerPath_Info_ID" class="col-md-4 control-label">CPD ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_CareerPath_Info_ID" id="employee_CareerPath_Info_ID" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee ID -->
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($employees as $employee)
                                <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                                <input type="text" name="employee_ID" id="employee_ID" value="{{$employee->employee_ID}}" style="width: -webkit-fill-available;" readonly>
                                @endforeach
                            </div>
                        </div>
                        <!--Employee Name -->
                        <div class="form-group">
                            <label for="employee_Name" class="col-md-4 control-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($employees as $employee)
                                <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                                <input type="text" name="employee_Name" id="employee_Name" value="{{$employee->employee_Name}}" style="width: -webkit-fill-available;" readonly>
                                @endforeach
                            </div>
                        </div>
                        <!--Supervisor Name-->
                        <div class="form-group">
                            <label for="supervisor_Name" class="col-md-4 control-label">Supervisor<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="supervisor_Name" id="supervisor_Name" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    <option value="Boss">Boss</option>
                                    @foreach($supervisors as $supervisor)
                                    <option value="{{ $supervisor->employee_ID }}">EMP-{{ $supervisor->employee_ID }}, {{ $supervisor->department }}</option>
                                    @endforeach
                                </select>
                              <!--  <input type="text" id="supervisor_Name" name="supervisor_Name" style="width: -webkit-fill-available;" required>-->
                            </div>
                        </div>
                        <!--Current Job Title-->
                        <div class="form-group">
                            <label for="current_JobTitle" class="col-md-4 control-label">Current Job Title<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($employees as $employee)
                                <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                                <input type="text" id="current_JobTitle" name="current_JobTitle" value="{{$employee->jobtitle}}" style="width: -webkit-fill-available;" readonly>
                                @endforeach
                            </div>
                        </div>
                        <!--Program Title-->
                        <div class="form-group">
                            <label for="program_Title" class="col-md-4 control-label">Program Title<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="program_Title" name="program_Title" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Program Description-->
                        <div class="form-group">
                            <label for="program_Desc" class="col-md-4 control-label">Program Description<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <textarea id="program_Desc" name="program_Desc" style="width: -webkit-fill-available;" required></textarea>
                            </div>
                        </div>
                        <!--Plan From-->
                        <div class="form-group">
                            <label for="periodPlan_From" class="col-md-4 control-label">Period Plan From<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="periodPlan_From" name="periodPlan_From" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Plan From-->
                        <div class="form-group">
                            <label for="periodPlan_To" class="col-md-4 control-label">Period Plan To<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="periodPlan_To" name="periodPlan_To" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Course Name-->
                        <div class="form-group">
                            <label for="tranningOrCourse_Name" class="col-md-4 control-label">Tranning Name or Course Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="tranningOrCourse_Name" name="tranningOrCourse_Name" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Status-->
                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="radio" id="status" name="status" value="Not Started" checked>Not Started
                                <input type="radio" id="status" name="status" value="In Progress">In Progress
                                <br>
                                <input type="radio" id="status" name="status" value="Completed">Completed
                                <input type="radio" id="status" name="status" value="Incompleted">Incompleted
                            </div>
                        </div>
                        <!--Date Completed-->
                        <div class="form-group">
                            <label for="scheduled_Date_Completed" class="col-md-4 control-label">Date Completed</label>
                            <div class="col-md-6">
                                <input type="date" id="scheduled_Date_Completed" name="scheduled_Date_Completed" style="width: -webkit-fill-available;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection