@extends('admin.vaccination-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Edit Vaccination Appointment Information
                    <div style="text-align: -webkit-right;">
                        <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewVA') }}">Back</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form name="formAddVA" class="form-horizontal" role="form" method="POST" action="{{ route('updateVA') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($vas as $va)
                        <input type="hidden" name="ID" id="ID" value="{{$va->id}}" style="width: -webkit-fill-available;">
                        <!--VA ID -->
                        <div class="form-group">
                            <label for="employee_Vaccination_ID" class="col-md-4 control-label">Vaccination Appointment ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_Vaccination_ID" id="employee_Vaccination_ID" value="{{$va->employee_Vaccination_ID}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee ID -->
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_ID" id="employee_ID" value="{{$va->employee_ID}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee Name -->
                        <div class="form-group">
                            <label for="employee_Name" class="col-md-4 control-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_Name" id="employee_Name" value="{{$va->employee_Name}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee IC -->
                        <div class="form-group">
                            <label for="employee_IC" class="col-md-4 control-label">Identification Card Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_IC" id="employee_IC" value="{{$va->employee_IC}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Vaccine Name-->
                        <div class="form-group">
                            <label for="vaccine_Type" class="col-md-4 control-label">Vaccine Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="vaccine_Type" name="vaccine_Type" style="width: -webkit-fill-available;" onchange="if (this.value=='Others'){this.form['Others'].style.visibility='visible'} else {this.form['Others'].style.visibility='hidden'};">
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    <option value="Pfizer - BioNTech" @if($va->vaccine_Type == "Pfizer - BioNTech") selected @endif>Pfizer - BioNTech</option>
                                    <option value="Sinovac - Coronavac" @if($va->vaccine_Type == "Sinovac - Coronavac") selected @endif>Sinovac - Coronavac</option>
                                    <option value="AstraZeneca" @if($va->vaccine_Type == "AstraZeneca") selected @endif>AstraZeneca</option>
                                    <option value="Sinopharm - Covilo" @if($va->vaccine_Type == "Sinopharm - Covilo") selected @endif>Sinopharm - Covilo</option>
                                    <option value="Others" @if($va->vaccine_Type == "Others") selected @endif>Others</option>
                                </select>
                                <input type="text" name="Others" id="vaccine_Type" value="{{$va->vaccine_Type}}" style=" visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <!--Health Facility-->
                        <div class="form-group">
                            <label for="health_Facility" class="col-md-4 control-label">Health Facility<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="health_Facility" id="health_Facility" class="form-control healthFacility">
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    @foreach($hfs as $hf)
                                    <option value="{{ $hf->id }}" @if($va->health_Facility ==$hf->id) selected @endif>{{ $hf->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Vaccination Location-->
                        <div class="form-group">
                            <label for="vaccination_Location" class="col-md-4 control-label">Vaccination Location<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="vaccination_Location" value="{{$va->vaccination_Location}}" class=" healthFacilityAddress" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Date-->
                        <div class="form-group">
                            <label for="vaccination_Date" class="col-md-4 control-label">Date<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="vaccination_Date" name="vaccination_Date" value="{{$va->vaccination_Date}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Date-->
                        <div class="form-group">
                            <label for="vaccination_Time" class="col-md-4 control-label">Time<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="time" id="vaccination_Time" name="vaccination_Time" value="{{$va->vaccination_Time}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Status-->
                        <div class="form-group">
                            <label for="vaccination_Status" class="col-md-4 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="vaccination_Status" name="vaccination_Status" style="width: -webkit-fill-available;">
                                    <option value="0" disabled="true" selected="true">Please Select</option>
                                    <option value="N/A" @if($va->vaccination_Status == "N/A") selected @endif>---</option>
                                    <option value="Unvaccinated" @if($va->vaccination_Status == "Unvaccinated") selected @endif>Unvaccinated</option>
                                    <option value="Vaccinated" @if($va->vaccination_Status == "Vaccinated") selected @endif>Vaccinated</option>
                                </select>
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

        $(document).on('change', '.healthFacility', function() {
            //console.log("hmn its change");

            var hf_id = $(this).val();
            //console.log(hf_id);


            var a = $(this).parent();

            console.log(hf_id);
            var op = "";

            $.ajax({
                type: 'get',
                url: "{{ route('findAddress') }}",
                data: {
                    'id': hf_id
                },
                dateType: 'json', //return data will be json
                success: function(data) {
                    console.log("address");
                    console.log(data.address);

                    a.find('.healthFacilityAddress').val(data.address);
                    $('.healthFacilityAddress').val(data.address);
                },

                error: function() {

                }
            });

        });

    });
</script>