@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Position</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">Position</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.addposition')

    <div class="container">

        <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPosition">
                Add Position
            </button>
        </div>

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <table id="positionTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Position</th>
                    <th width="15%" style="text-align:center;">Action</th>
                </tr>
            </thead>
            @foreach($positions as $position)
            <tr>
                <td>{{ $position->id }}</td>
                <td>{{ $position->name }}</td>
                    
                <td style="text-align:center;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPosition{{$position->id}}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="{{ route('deletePosition', ['id' => $position->id])}}" class="btn btn-danger" onclick="return confirm('Comfirm to delete this Position?')">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
                @include('admin.editposition')
            </tr>
            @endforeach
        </table>
        <a href="{{ route('showPosition') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#positionTableid').DataTable({
                "pagingType": "full_numbers",
            });
        });
    </script>
@endsection