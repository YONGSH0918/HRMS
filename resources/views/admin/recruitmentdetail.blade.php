@extends('layouts.adminapp')
@section('content')

    <div class="container" style="width: 90%">
        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link" id="defaultOpen" onclick="openForm(event, 'Aboutme')">About Me</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openForm(event, 'Resume')">Resume</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openForm(event, 'EmergencyContact')">Emergency Contact</button>
                </li>
            </ul>


        <form method="post" action="" enctype="multipart/form-data">
            @csrf

            @foreach($onlineapplicants as $onlineapplicant)

            <input type="hidden" name="" value="">
            
            <!-- About Me -->
            <div id="Aboutme" class="navcontent">
                <div class="row g-3" style="padding: 5%;">
                    <h4 class="mb-3"><a class="back" href="{{ route('admin.recruitment') }}"> < {{ $onlineapplicant -> name }}</a>/About Me</h4>
                    <div class="col-md-12">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $onlineapplicant -> name }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">NOIC</label>
                        <input type="text" class="form-control" id="noic" name="noic" value="{{ $onlineapplicant -> ic }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ $onlineapplicant -> dob }}" disabled>
                    </div>
                    <div class="col-md-4" style="padding-top: 35px; padding-left: 30px;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male" {{($onlineapplicant->gender=="Male")? "checked" : ""}} id="Male">
                            <label class="form-check-label" for="">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female"{{($onlineapplicant->gender=="Female")? "checked" : ""}} id="Male">
                            <label class="form-check-label" for="">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Marital Status</label>
                        <input type="text" name="maritalstatus" id="maritalstatus" class="form-control" value="{{ $onlineapplicant -> marital_status }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Race</label> <br/>
                        <input type="text" name="race" id="race" class="form-control" value="{{ $onlineapplicant -> race }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Religion</label> <br/>
                        <input type="text" name="religion" id="religion" class="form-control" value="{{ $onlineapplicant -> religion }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Nationality</label>
                        <input type="text" name="nationality" id="nationality" class="form-control" value="{{ $onlineapplicant -> nationality }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $onlineapplicant -> email }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $onlineapplicant -> phone_num }}" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Address</label>
                        <textarea type="text" class="form-control" name="address" id="address" disabled>{{$onlineapplicant->address}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">City</label><br/>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $onlineapplicant -> city }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">State</label>
                        <input type="text" name="state" id="state" class="form-control" value="{{ $onlineapplicant -> state }}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $onlineapplicant -> zipcode }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Country</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{ $onlineapplicant -> country }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Position Applied For</label>
                        <input type="text" name="position" id="position" class="form-control" value="{{ $onlineapplicant -> position_applied }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Expected Salary (RM)</label>
                        <input type="text" class="form-control" id="Esalary" name="Esalary" value="{{ $onlineapplicant -> expected_salary }}" disabled>
                    </div>
                </div>
            </div>
            <!-- End About Me -->

            <!-- Upload Resume -->
            <div id="Resume" class="navcontent">
                <div class="form-row" style="padding: 5%;">
                    <h4 class="col-md-12"><a class="back" href="{{ route('admin.recruitment') }}"> < {{ $onlineapplicant -> name }}</a>/Resume</h4>
                    <div class="col-md-12" style="padding: 5%;">
                        File Name: <input
                         type="text" name="resume-file" id="resume" 
                         value="{{ $onlineapplicant -> document }}" style="border: none; background-color: transparent;">
                    </div>
                    <a href="{{ route('resume.download', ['id' => $onlineapplicant -> id])}}" 
                        class="btn btn-warning" style="margin-left: 10%; font-size: 15px" value="{{ $onlineapplicant -> document }}">
                        <i class="bi bi-download"></i> Download
                    </a>
                </div>
                <div class="form-row" style="padding: 5%;">
                    <h4 class="col-md-12">Image</h4>
                    <div class="col-md-12" style="padding: 5%;">
                        <img src="{{ asset('images/') }}/{{$onlineapplicant->image}}" alt="" width="150">
                    </div>
                </div>
            </div>
            <!-- End Upload Resume -->

            <!-- Emergency Contact-->
            <div id="EmergencyContact" class="navcontent">
                <div class="row g-3" style="padding: 5%;">
                    <h4 class="mb-3"><a class="back" href="{{ route('admin.recruitment') }}"> < {{ $onlineapplicant -> name }}</a>/Emergency Contact</h4>
                    <div class="col-md-12">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Ename" name="Ename" value="{{ $onlineapplicant -> emergency_contact_name }}" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="Ephone" name="Ephone" value="{{ $onlineapplicant -> emergency_contact_number }}" disabled>
                    </div> 
                    <div class="col-md-12">
                        <label for="" class="form-label">Relationship</label>
                        <input type="text" class="form-control" id="Erelation" name="Erelation" value="{{ $onlineapplicant -> relation_emergency }}" disabled>
                    </div>
                </div>
            </div>
            <!-- End Emergency Contact -->
            @endforeach
        </form>
    </div>

@endsection