@extends('carrer-path-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Add new employee</div>
                <div class="panel-body">
                    <form name="formAddCDP" class="form-horizontal" role="form" method="POST" action="{{ route('addCDP') }}" enctype="multipart/form-data" onSubmit="">
                        {{ csrf_field() }}
                        <!--Employee ID -->
                        @foreach($employees as $employee)
                        <div class="form-group">
                            <label for="employee_CareerPath_Info_ID" class="col-md-4 control-label">Career Path Development ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_CareerPath_Info_ID" id="employee_CareerPath_Info_ID" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee IC -->
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="employee_ID" id="employee_ID" class="form-control" style="width: -webkit-fill-available;">
                                    <option value="{{ $employee->id }}">{{ $employee->employee_ID }}</option>
                                </select>
                            </div>
                        </div>
                        <!--Employee Images -->
                        <div class="form-group">
                            <label for="supervisor_Name" class="col-md-4 control-label">Supervisor Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="supervisor_Name" name="supervisor_Name" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Status-->
                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="radio" id="status" name="status" value="Active">Active
                                <input type="radio" id="status" name="status" value="Inactive">Inactive
                            </div>
                        </div>
                        <!--Employee Gender-->
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="radio" id="gender" name="gender" value="Male">Male
                                <input type="radio" id="gender" name="gender" value="Female">Female
                            </div>
                        </div>
                        <!--Employee DOB-->
                        <div class="form-group">
                            <label for="date_of_birth" class="col-md-4 control-label">Date Of Birth<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="date_of_birth" name="date_of_birth" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Race-->
                        <div class="form-group">
                            <label for="race" class="col-md-4 control-label">Race<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="race" name="race" style="width: -webkit-fill-available;" onchange="if (this.value=='others'){this.form['others'].style.visibility='visible'}else {this.form['others'].style.visibility='hidden'};">
                                    <option value="malay">Malay</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="indian">Indian</option>
                                    <option value="others">Others</option>
                                </select>
                                <input type="text" name="others" id="race" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <!--Employee Country-->
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Country<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="country" id="country" name="country" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee National-->
                        <div class="form-group">
                            <label for="national" class="col-md-4 control-label">National<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="national" name="national" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Address-->
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <textarea id="address" name="address" style="width: -webkit-fill-available;" required></textarea>
                            </div>
                        </div>
                        <!--Employee Contact Number-->
                        <div class="form-group">
                            <label for="contact_Number" class="col-md-4 control-label">Contact Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="contact_Number" name="contact_Number" style="width: -webkit-fill-available;" placeholder="i.e. +60161234567" ​pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required>
                            </div>
                        </div>
                        <!--Employee Email-->
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        @endforeach
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