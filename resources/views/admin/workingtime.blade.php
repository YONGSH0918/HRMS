@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Working Time</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">Working Time</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

@include('admin.addworkingtime')

<script>

    function Calc()
    {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;

        var split1 = "{start}".split(":");
        var split2 = "{end}".split(":");

        var time1 = split1[0] + split1[1] + split1[2];
        var time2 = split2[0] + split2[1] + split2[2];

        var diff = time2 - time1;

        document.getElementById("duration").value = diff;
    }

</script>

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addWRKtime">
                Add Working Time
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchWRKtime') }}">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="search">
                    <button class="btn btn-dark" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <table id="timeTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="25%">Start Time</th>
                    <th width="25%">End Time</th>
                    <th width="25%">Duration</th>
                    <th width="20%" style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($workingtimes as $workingtime)
            <tr>
                <td>{{ $workingtime->id }}</td>
                <td>{{ $workingtime->start }}</td>
                <td>{{ $workingtime->end }}</td>
                <td>{{ $workingtime->duration }}</td>
                    
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editWRKtime{{$workingtime->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deleteWRKtime', ['id' => $workingtime->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this deparment?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('admin.editworkingtime')
                </tr>
            @endforeach
        </table>
        <a href="{{ route('showWRKtime') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#timeTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection
