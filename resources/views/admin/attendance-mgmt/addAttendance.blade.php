@extends('admin.attendance-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Add Employee Attendance
                    <div style="text-align: -webkit-right;">
                        <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployeeA') }}">Back</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form name="formAddA" class="form-horizontal" role="form" method="POST" action="{{ route('addA') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

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
                        <!--Date-->
                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Date<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="date" name="date" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Time in-->
                        <div class="form-group">
                            <label for="time_In" class="col-md-4 control-label">Time In<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="time" id="time_In" name="time_In" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Time out-->
                        <div class="form-group">
                            <label for="time_Out" class="col-md-4 control-label">Time Out<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="time" id="time_Out" name="time_Out" style="width: -webkit-fill-available;" required>
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