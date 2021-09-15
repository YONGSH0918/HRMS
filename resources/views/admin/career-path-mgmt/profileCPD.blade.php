@extends('admin.career-path-mgmt.base')

@section('action-content')

<style>
    .tablelist td {
        padding: 0 40px 0 0;
    }
</style>

<div class="container-fluid">
    @foreach($cpds as $cpd)
    <div class="row">
        <div class="col-md-12">
            <h5 class="page-title" style=" padding: 0 0 20px 0; ">{{ __('Career Path Development Information') }}
                <div style="text-align: -webkit-right;">
                    <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewCPD') }}">Back</a>
                </div>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 float-left">
            <div class="box box-success" style="padding: 20px; background-color: whitesmoke; border-radius: 10px;">
                <div class="box-body employee-info">
                    <div class="author" style="text-align: center;">
                        <img class="border-white" src="{{ asset('images/careerpath.png') }}" width="300px" height="250px" style="border-radius: 5px;" alt="profile photo" />
                    </div>
                    <p class="description text-center">
                    <h4 class="title">{{$cpd->employee_Name}}</h4>
                    <table style="width: 100%" class="profile-tbl">
                        <tbody style="font-size: 14px;">
                            <tr>
                                <td>
                                    <div>{{ __('Employee ID') }}</div>
                                </td>
                                <td>
                                    <div>EMP-{{$cpd->employee_ID}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>{{ __('Current Job Title / Position') }}</div>
                                </td>
                                <td>
                                    <div>{{$cpd->current_JobTitle}}</div>
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
                <div class="box-header with-border" style="padding: 10px 0;">{{ __('Career Path Development Information') }}</div>
                <br>
                <div class="box-body employee-info">
                    <table class="tablelist">
                        <tbody>
                            <tr>
                                <td>
                                    <p>{{ __('CPD ID') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->marital_Status}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Program Title') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->program_Title}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Supervisor Name') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->supervisor_Name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Program Description') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->program_Desc}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Period Plan From') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->periodPlan_From}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Period Plan To') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->periodPlan_To}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Tranning Name Or Course Name') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->tranningOrCourse_Name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Status') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->status}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{ __('Date Completed') }}</p>
                                </td>
                                <td>
                                    <p>{{$cpd->scheduled_Date_Completed}}</p>
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