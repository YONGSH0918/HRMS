@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">National</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">National</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.addnational')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNational">
                Add National
            </button>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('searchNational') }}">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="search">
                    <button class="btn btn-dark" type="button">Search</button>
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

        <table id="nationalTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>National</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($nationalities as $nationality)
                <tr>
                    <td>{{ $nationality->id }}</td>
                    <td>{{ $nationality->name }}</td>
                    
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editNational{{$nationality->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="{{ route('deleteNational', ['id' => $nationality->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this nationality?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                    @include('admin.editnational')
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('showNational') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
        Back
    </a>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#nationalTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection