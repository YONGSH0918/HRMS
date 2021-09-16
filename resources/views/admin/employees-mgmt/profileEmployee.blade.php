@extends('admin.employees-mgmt.base')

@section('action-content')

<style>
    .tablelist td {
        padding: 0 40px 0 0;
    }
</style>

<div class="container-fluid">
    @foreach($employees as $employee)
    <div class="row">
        <div class="col-md-12">
            <h5 class="page-title" style=" padding: 0 0 20px 0; ">{{ __('Employee Profile') }}
                <div style="text-align: -webkit-right;">
                    <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployee') }}">Back</a>
                </div>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 float-left">
            <div class="box box-success" style="padding: 20px; background-color: whitesmoke; border-radius: 10px;">
                <div class="box-body employee-info">
                    <div class="author" style="text-align: center;">
                        @if($employee->image != null)
                        <img class="border-white" src="{{ asset('images/employeesImages') }}/{{$employee->image}}" width="200px" height="250px" style="border-radius: 5px;" alt="profile photo" />
                        @else
                        <img class="border-white" src="{{ asset('images/employeesImages/default.png') }}" width="200px" height="250px" style="border-radius: 5px;" alt="profile photo" />
                        @endif
                    </div>
                    <p class="description text-center">
                    <h4 class="title">{{$employee->employee_Name}}</h4>
                    <table style="width: 100%" class="profile-tbl">
                        <tbody style="font-size: 14px;">
                            <tr>
                                <td>
                                    <div>{{ __('IC No.') }}</div>
                                </td>
                                <td>
                                    <div>{{$employee->ic}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>{{ __('Email') }}</div>
                                </td>
                                <td>
                                    <div>{{$employee->email}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>{{ __('Contact Number') }}</div>
                                </td>
                                <td>
                                    <div>{{$employee->contact_Number}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>{{ __('Employee ID') }}</div>
                                </td>
                                <td>
                                    <div>EMP-{{$employee->employee_ID}}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8 float-left" style="border-radius: 10px; background-color: whitesmoke;">
            <div class="box box-success" style="padding: 10px;">
                <div class="box-header with-border" style="padding: 10px 0;">{{ __('Personal Information') }}</div>
                
                <div class="box-body employee-info">
                    <table class="tablelist">
                        <tbody>
                            <tr>
                                <td>
                                    <p>{{ __('Marital Status') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->marital_Status}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Gender') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->gender}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Race') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->race}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Date Of Birth') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->date_of_birth}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('National') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->national}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Country') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->country}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('State') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->state}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('City') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->city}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Home Address') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->address}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6>{{ __('Designation') }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Status') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->status}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Department') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->department}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Supervisor') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->supervisor}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Job Title / Position') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->jobtitle}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Salary') }}</p>
                                </td>
                                <td>
                                    <p>{{ __('RM') }} {{$employee->salary}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Working Schedule') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->workingSchedule}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Employment ID') }}</p>
                                </td>
                                <td>
                                    @foreach($employments as $employment)
                                    @if($employee->employment_ID ==$employment->id)
                                    <p>{{ $employment->employment_name }}</p>
                                    @endif
                                    @endforeach   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Leave Grade') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->leave_grade}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Start Date') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->start_Date}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('End Date') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->end_Date}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="ui dividing header">{{ __('Emergency Contact') }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Emergency Name') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->emergency_Name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Emergency Contact') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->emergency_Contact_Number}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="ui dividing header">{{ __('Others') }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Bank Name') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->bank_Name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Bank Account Number') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->bank_account_number}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('EPF Number') }}</p>
                                </td>
                                <td>
                                    <p>{{$employee->epf_number}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection