@extends('healthFacility-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Edit Health Facility
                    <a href="{{ route('viewHealthFacility') }}" class="float-right btn btn-info col-sm-3 col-xs-5 btn-margin" style="font-size: initial; width: 110px;">
                        <i></i>{{ __('Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form name="formEditHealthFacility" class="form-horizontal" role="form" method="POST" action="{{ route('updateHealthFacility') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($hfs as $hf)
                        <input type="hidden" name="ID" id="ID" value="{{$hf->id}}" style="width: -webkit-fill-available;">
                        <!--Name -->
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" value="{{$hf->name}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Address-->
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <textarea id="address" name="address" style="width: -webkit-fill-available;" required>{{$hf->address}}</textarea>
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