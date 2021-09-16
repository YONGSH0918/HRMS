@extends('admin.employees-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Edit employee
                    <div style="text-align: -webkit-right;">
                        <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployee') }}">Back</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form name="formEditEmployee" class="form-horizontal" role="form" method="POST" action="{{ route('updateEmployee') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($employees as $employee)
                        <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="employee_ID" name="employee_ID" value="{{$employee->employee_ID}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee IC -->
                        <div class="form-group">
                            <label for="ic" class="col-md-4 control-label">Identification Card Numbers<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="ic" id="ic" style="width: -webkit-fill-available;" value="{{$employee->ic}}" placeholder="i.e. 000000-00-0000" ​pattern="^[0-9]{6}-*[0-9]{2}-*[0-9]{4}$" required>
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
                                <input type="radio" id="status" name="status" value="Active" @if($employee->status == "Active") checked @endif>Active
                                <input type="radio" id="status" name="status" value="Inactive" @if($employee->status == "Inactive") checked @endif>Inactive
                                <input type="radio" id="status" name="status" value="Probation Period" @if($employee->status == "Probation Period") checked @endif>Probation Period
                            </div>
                        </div>
                        <!--Employee Gender-->
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="radio" id="gender" name="gender" value="Male" @if($employee->gender == "Male") checked @endif>Male
                                <input type="radio" id="gender" name="gender" value="Female" @if($employee->gender == "Female") checked @endif>Female
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
                                <select id="race" name="race" style="width: -webkit-fill-available;" onchange="if (this.value=='Others'){this.form['Others'].style.visibility='visible'}else {this.form['Others'].style.visibility='hidden'};" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    <option value="Malay" @if($employee->race == "Malay") selected @endif>Malay</option>
                                    <option value="Chinese" @if($employee->race == "Chinese") selected @endif>Chinese</option>
                                    <option value="Indian" @if($employee->race == "Indian") selected @endif>Indian</option>
                                    <option value="Others" @if($employee->race == "Others") selected @endif>Others</option>
                                </select>
                                <input type="text" name="Others" id="race" value="{{$employee->race}}" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <!--Employee National-->
                        <div class="form-group">
                            <label for="national" class="col-md-4 control-label">National<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="national" id="national" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($nationalities as $nationality)
                                    <option value="{{ $nationality->name }}" @if($employee->national ==$nationality->name) selected @endif>{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee Country-->
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Country<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->name }}" @if($employee->country ==$country->name) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee State-->
                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="state" id="state" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->name }}" @if($employee->state ==$state->name) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee City-->
                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="city" id="city" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->name }}" @if($employee->city ==$city->name) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
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
                                <select name="department" id="department" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->department_name }}" @if($employee->department ==$department->department_name) selected @endif>{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee Job Title-->
                        <div class="form-group">
                            <label for="jobtitle" class="col-md-4 control-label">Job Title<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="jobtitle" id="jobtitle" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($positions as $position)
                                    <option value="{{ $position->name }}" @if($employee->jobtitle ==$position->name) selected @endif>{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee Supervisor-->
                        <div class="form-group">
                            <label for="supervisor" class="col-md-4 control-label">Supervisor<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="supervisor" id="supervisor" class="form-control" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    <option value="Boss" @if($employee->supervisor == "Boss") selected @endif>Boss</option>
                                    @foreach($supervisors as $supervisor)
                                    <option value="{{ $supervisor->employee_ID }}" @if($employee->supervisor ==$supervisor->employee_ID) selected @endif>EMP-{{ $supervisor->employee_ID }}, {{ $supervisor->department }}</option>
                                    @endforeach
                                    <option value="N/A" @if($employee->supervisor == "N/A") selected @endif>---</option>
                                </select>
                            </div>
                        </div>
                        <!--Employee Salary-->
                        <div class="form-group">
                            <label for="salary" class="col-md-4 control-label">Salary<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="salary" name="salary" value="{{ $employee->salary }}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Start Date-->
                        <div class="form-group">
                            <label for="start_Date" class="col-md-4 control-label">Hired Date<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="start_Date" name="start_Date" value="{{ $employee->start_Date }}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee End Date-->
                        <div class="form-group">
                            <label for="end_Date" class="col-md-4 control-label">End Date</span></label>
                            <div class="col-md-6">
                                <input type="date" id="end_Date" name="end_Date" value="{{ $employee->end_Date }}" style="width: -webkit-fill-available;">
                            </div>
                        </div>
                        <!--Employee Emergency Name-->
                        <div class="form-group">
                            <label for="emergency_Name" class="col-md-4 control-label">Emergency Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="emergency_Name" name="emergency_Name" value="{{ $employee->emergency_Name }}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee Emergency Contact Number-->
                        <div class="form-group">
                            <label for="emergency_Contact_Number" class="col-md-4 control-label">Emergency Contact Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="tel" id="emergency_Contact_Number" name="emergency_Contact_Number" value="{{ $employee->emergency_Contact_Number }}" style="width: -webkit-fill-available;" placeholder="i.e. +60161234567" ​pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required>
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
                                <select name="employment_ID" id="employment_ID" class="form-control employmentTb" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($employments as $employment)
                                    <option value="{{ $employment->id }}" @if($employee->employment_ID == $employment->id) selected @endif>{{ $employment->employment_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee Working Schedule-->
                        <div class="form-group">
                            <label for="workingSchedule" class="col-md-4 control-label">Working Schedule<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="workingSchedule" name="workingSchedule" class="workingScheduleTb" value="{{$employee->workingSchedule}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee Marital Status-->
                        <div class="form-group">
                            <label for="marital_Status" class="col-md-4 control-label">Marital Status<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="marital_Status" id="marital_Status" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    <option value="Single" @if($employee->marital_Status == "Single") selected @endif>Single</option>
                                    <option value="Married" @if($employee->marital_Status == "Married") selected @endif>Married</option>
                                    <option value="Widowed" @if($employee->marital_Status == "Widowed") selected @endif>Widowed</option>
                                    <option value="Divorced" @if($employee->marital_Status == "Divorced") selected @endif>Divorced</option>
                                </select>
                            </div>
                        </div>
                        <!--Employee Leave Grade-->
                        <div class="form-group">
                            <label for="leave_grade" class="col-md-4 control-label">Leave Grade<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="leave_grade" id="leave_grade" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($leavegrades as $leavegrade)
                                    <option value="{{ $leavegrade->id }}" @if($employee->leave_grade == $leavegrade->id) selected @endif>{{ $leavegrade->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="leave_grade" name="leave_grade" value="{{ $employee->leave_grade }}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee EPF Number-->
                        <div class="form-group">
                            <label for="epf_number" class="col-md-4 control-label">EPF Number</label>
                            <div class="col-md-6">
                                <input type="text" id="epf_number" name="epf_number" value="{{ $employee->epf_number }}" style="width: -webkit-fill-available;">
                            </div>
                        </div>
                        <!--Employee Bank Name-->
                        <div class="form-group">
                            <label for="bank_Name" class="col-md-4 control-label">Bank Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="bank_Name" id="bank_Name" class="form-control" style="width: -webkit-fill-available;" required>
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($banknames as $bankname)
                                    <option value="{{ $bankname->name }}" @if($employee->bank_Name ==$bankname->name) selected @endif>{{ $bankname->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Employee Bank Account Number-->
                        <div class="form-group">
                            <label for="bank_account_number" class="col-md-4 control-label">Bank Account Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="bank_account_number" name="bank_account_number" value="{{ $employee->bank_account_number }}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>

                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="edit" class="btn btn-primary" onclick="return confirm('Are you sure you want to edit this item?')">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {


        $(document).on('change', '.employmentTb', function() {
            //console.log("hmn its change");

            var employment_id = $(this).val();
            //console.log(hf_id);


            var a = $(this).parent();

            console.log(employment_id);
            var op = "";

            $.ajax({
                type: 'get',
                url: "{{ route('findWorkingSchedule') }}",
                data: {
                    'id': employment_id
                },
                dateType: 'json', //return data will be json
                success: function(data) {
                    console.log("workingtime_id");
                    console.log(data.workingtime_id);

                    a.find('.workingScheduleTb').val(data.workingtime_id);
                    $('.workingScheduleTb').val(data.workingtime_id);
                },

                error: function() {

                }
            });

        });

    });
</script>