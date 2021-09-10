@extends('employees-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Edit employee
                <a href="{{ route('viewEmployee') }}" class="float-right btn btn-info col-sm-3 col-xs-5 btn-margin" style="font-size: initial; width: 110px;">
                    <i></i>{{ __('Back') }}
                </a>
                </div>
                <div class="panel-body">
                    <form name="formEditEmployee" class="form-horizontal" role="form" method="POST" action="{{ route('updateEmployee') }}" enctype="multipart/form-data" onSubmit="return formValidation();">
                        @csrf
                        @foreach($employees as $employee)
                        <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                        <!--Employee ID -->
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_ID" id="employee_ID" value="{{$employee->employee_ID}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee IC -->
                        <div class="form-group">
                            <label for="ic" class="col-md-4 control-label">Identification Card Numbers<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="ic" id="ic" value="{{$employee->ic}}" style="width: -webkit-fill-available;" placeholder="i.e. 000000-00-0000" ​pattern="^[0-9]{6}-*[0-9]{2}-*[0-9]{4}$" required>
                            </div>
                        </div>
                        <!--Employee Name -->
                        <div class="form-group">
                            <label for="employee_Name" class="col-md-4 control-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_Name" id="employee_Name" value="{{$employee->employee_Name}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Images -->
                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Images</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="employees-image" value="">
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
                                <input type="date" id="date_of_birth" name="date_of_birth" value="{{$employee->date_of_birth}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Race-->
                        <div class="form-group">
                            <label for="race" class="col-md-4 control-label">Race<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="race" name="race" style="width: -webkit-fill-available;" onchange="if (this.value=='others'){this.form['others'].style.visibility='visible'}else {this.form['others'].style.visibility='hidden'};">
                                    <option value="Malay">Malay</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Others">Others</option>
                                </select>
                                <input type="text" name="others" id="race" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <!--Employee Country-->
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Country<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="country" id="country" name="country" value="{{$employee->country}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee National-->
                        <div class="form-group">
                            <label for="national" class="col-md-4 control-label">National<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="national" name="national" value="{{$employee->national}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Address-->
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <textarea id="address" name="address" style="width: -webkit-fill-available;" required>{{$employee->address}}</textarea>
                            </div>
                        </div>
                        <!--Employee Contact Number-->
                        <div class="form-group">
                            <label for="contact_Number" class="col-md-4 control-label">Contact Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="contact_Number" name="contact_Number" value="{{$employee->contact_Number}}" style="width: -webkit-fill-available;" placeholder="i.e. +60161234567" ​pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required>
                            </div>
                        </div>
                        <!--Employee Email-->
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" value="{{$employee->email}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Department-->
                        <div class="form-group">
                            <label for="department" class="col-md-4 control-label">Department<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="department" name="department" value="{{$employee->department}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Job Title-->
                        <div class="form-group">
                            <label for="jobtitle" class="col-md-4 control-label">Job Title<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="jobtitle" name="jobtitle" value="{{$employee->jobtitle}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Salary-->
                        <div class="form-group">
                            <label for="salary" class="col-md-4 control-label">Salary<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="salary" name="salary" value="{{$employee->salary}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Start Date-->
                        <div class="form-group">
                            <label for="start_Date" class="col-md-4 control-label">Hired Date<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="start_Date" name="start_Date" value="{{$employee->start_Date}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee End Date-->
                        <div class="form-group">
                            <label for="end_Date" class="col-md-4 control-label">End Date</span></label>
                            <div class="col-md-6">
                                <input type="date" id="end_Date" name="end_Date" value="{{$employee->end_Date}}" style="width: -webkit-fill-available;">
                            </div>
                        </div>
                        <!--Employee Emergency Name-->
                        <div class="form-group">
                            <label for="emergency_Name" class="col-md-4 control-label">Emergency Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="emergency_Name" name="emergency_Name" value="{{$employee->emergency_Name}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Emergency Contact Number-->
                        <div class="form-group">
                            <label for="emergency_Contact_Number" class="col-md-4 control-label">Emergency Contact Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="tel" id="emergency_Contact_Number" name="emergency_Contact_Number" value="{{$employee->emergency_Contact_Number}}" style="width: -webkit-fill-available;" placeholder="i.e. +60161234567" ​pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$"" required>
                            </div>
                        </div>
                        <!--Employee Document-->
                        <div class=" form-group">
                                <label for="document" class="col-md-4 control-label">Additional Document</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="employees-document" value="">
                                </div>
                            </div>
                            <!--Employee Employment ID-->
                            <div class="form-group">
                                <label for="employment_ID" class="col-md-4 control-label">Employment ID<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="employment_ID" name="employment_ID" value="{{$employee->employment_ID}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee Marital Status-->
                            <div class="form-group">
                                <label for="marital_Status" class="col-md-4 control-label">Marital Status<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="marital_Status" name="marital_Status" value="{{$employee->marital_Status}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee Salary Structure-->
                            <div class="form-group">
                                <label for="salary_structure" class="col-md-4 control-label">Salary Structure<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="salary_structure" name="salary_structure" value="{{$employee->salary_structure}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee Leave Grade-->
                            <div class="form-group">
                                <label for="leave_grade" class="col-md-4 control-label">Leave Grade<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="leave_grade" name="leave_grade" value="{{$employee->leave_grade}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee Grade-->
                            <div class="form-group">
                                <label for="employee_grade" class="col-md-4 control-label">Employee Grade<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="employee_grade" name="employee_grade" value="{{$employee->employee_grade}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee EPF Number-->
                            <div class="form-group">
                                <label for="epf_number" class="col-md-4 control-label">EPF Number</label>
                                <div class="col-md-6">
                                    <input type="text" id="epf_number" name="epf_number" value="{{$employee->epf_number}}" style="width: -webkit-fill-available;">
                                </div>
                            </div>
                            <!--Employee Bank Name-->
                            <div class="form-group">
                                <label for="bank_Name" class="col-md-4 control-label">Bank Name<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="bank_Name" name="bank_Name" value="{{$employee->bank_Name}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee Bank Account Number-->
                            <div class="form-group">
                                <label for="bank_account_number" class="col-md-4 control-label">Bank Account Number<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="bank_account_number" name="bank_account_number" value="{{$employee->bank_account_number}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            <!--Employee Working Schedule-->
                            <div class="form-group">
                                <label for="workingSchedule" class="col-md-4 control-label">Working Schedule<span style="color:red">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" id="workingSchedule" name="workingSchedule" value="{{$employee->workingSchedule}}" style="width: -webkit-fill-available;" required>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" name="edit" class="btn btn-primary">
                                        Update
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