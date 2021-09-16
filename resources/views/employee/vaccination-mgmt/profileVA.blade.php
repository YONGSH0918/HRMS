@extends('employee.vaccination-mgmt.base')

@section('action-content')

<style>
    .tablelist td {
        padding: 0 40px 0 0;
    }
</style>

<div class="container-fluid">
    @foreach($vas as $va)
    <div class="row">
        <div class="col-md-12">
            <h5 class="page-title" style=" padding: 0 0 20px 0; ">{{ __('Vaccination Appointment Information') }}
                <div style="text-align: -webkit-right;">
                    <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewMeVA') }}">Back</a>
                </div>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 float-left">
            <div class="box box-success" style="padding: 20px; background-color: whitesmoke; border-radius: 10px;">
                <div class="box-body employee-info">
                    <div class="author" style="text-align: center;">

                        <img class="border-white" src="{{ asset('images/vaccination.jpg') }}" width="320px" height="250px" style="border-radius: 5px;" alt="profile photo" />

                    </div>
                    <p class="description text-center">
                    <h4 class="title">{{$va->employee_Name}}</h4>
                    <table style="width: 100%" class="profile-tbl">
                        <tbody style="font-size: 14px;">
                            <tr>
                                <td>
                                    <div>{{ __('Employee ID') }}</div>
                                </td>
                                <td>
                                    <div>EMP-{{$va->employee_ID}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>{{ __('Identification Card Number') }}</div>
                                </td>
                                <td>
                                    <div>{{$va->employee_IC}}</div>
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
                <div class="box-header with-border" style="padding: 10px 0;">{{ __('Vaccination Appointment Information') }}</div>
                <br>
                <div class="box-body employee-info">
                    <table class="tablelist">
                        <tbody>
                            <tr>
                                <td>
                                    <p>{{ __('Vaccination Appointment ID') }}</p>
                                </td>
                                <td>
                                    <p>{{$va->employee_Vaccination_ID}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Vaccine Name') }}</p>
                                </td>
                                <td>
                                    <p>{{$va->vaccine_Type}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Vaccination Location') }}</p>
                                </td>
                                <td>
                                    <p>{{$va->vaccination_Location}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Date') }}</p>
                                </td>
                                <td>
                                    <p>{{$va->vaccination_Date}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Time') }}</p>
                                </td>
                                <td>
                                    <p>{{$va->vaccination_Time}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Vaccination Status') }}</p>
                                </td>
                                <td>
                                    <p>{{$va->vaccination_Status}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @if($va->vaccination_Status == 'N/A')
                    <form name="formEditMeVA" class="form-horizontal" role="form" method="POST" action="{{ route('updateMeVA', ['id' => $va->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" name="editMeVA" class="btn btn-primary" onclick="return confirm('Are you sure you have vaccinated already?')">
                            Vaccinated
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection