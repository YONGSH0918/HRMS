@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Online Recruitment Management</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Online Recruitment Management</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.recruitment') }}" class="btn btn-primary">
                Back
            </a>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('search.applicant') }}">
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

        <table id="onlineTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>NO IC</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($onlineapplicants as $onlineapplicant)
            <tr>
                <td>{{ $onlineapplicant->id }}</td>
                <td><img src="{{ asset('images/') }}/{{$onlineapplicant->image}}" alt="" width="50"></td>
                <td>{{ $onlineapplicant->name }}</td>
                <td>{{ $onlineapplicant->ic }}</td>
                <td>{{ $onlineapplicant->gender }}</td>
                <td>{{ $onlineapplicant->email }}</td>
                <td>{{ $onlineapplicant->phone_num }}</td>

                <td style="text-align:center;">
                    <a href="{{ route('admin.recruitment.view', ['id' => $onlineapplicant->id]) }}" class="btn btn-primary"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="view detail">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('send.success', ['id' => $onlineapplicant->id]) }}" class="btn btn-success"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="send approve mail">
                        <i class="bi bi-check-lg"></i>
                    </a>
                    <a href="{{ route('send.fail', ['id' => $onlineapplicant->id]) }}" class="btn btn-danger"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="send reject mail">
                        <i class="bi bi-x-lg"></i>
                    </a>
                    <a href="{{ route('move.record', ['id' => $onlineapplicant->id]) }}" class="btn btn-warning"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="add to employee">
                        <i class="bi bi-person-plus"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.recruitment') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#onlineTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection