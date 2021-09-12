@extends('healthFacility-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Add New Health Facility
                    <a href="{{ route('viewHealthFacility') }}" class="float-right btn btn-info col-sm-3 col-xs-5 btn-margin" style="font-size: initial; width: 110px;">
                        <i></i>{{ __('Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form name="formAddHealthFacility" class="form-horizontal" role="form" method="POST" action="{{ route('addHealthFacility') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!--Employee ID -->
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Address-->
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <textarea id="address" name="address" style="width: -webkit-fill-available;" required></textarea>
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