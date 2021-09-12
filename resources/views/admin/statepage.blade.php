@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">State</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">State</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.addstate')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addState">
                Add State
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchState') }}">
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

        <table id="stateTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>State</th>
                    <th width="20%" style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($states as $state)
            <tr>
                <td>{{ $state->id }}</td>
                <td>{{ $state->name }}</td>
                    
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editState{{$state->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deleteState', ['id' => $state->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this state?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('admin.editstate')
            </tr>
            @endforeach
        </table>
        <a href="{{ route('showState') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#stateTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection