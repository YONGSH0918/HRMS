@extends('layouts.empapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Event List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('emp.showCalendar') }}">Calendar</a></li>
                    <li class="breadcrumb-item active">Event List</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div style="margin-bottom: 20px;">
            <a href="{{ route('emp.showCalendar') }}" class="btn btn-success">
                Show Calendar
            </a>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('emp.searchEvent') }}">
                    @csrf
                    <input type="text" class="form-control" id="search" name="search" placeholder="search">
                    <button class="btn btn-dark" type="submit">Search</button>   
                    &nbsp;
                </form>
            </div>
            <div class="col-md-3" style="float:right;">
                <form class="input-group" method="post" action="{{ route('emp.searchByDate') }}">
                    @csrf
                    <input type="date" class="form-control" id="searchdate" name="searchdate" value="{{date('Y-m-d')}}">
                    <button class="btn btn-dark" type="submit">View</button>
                </form>
            </div>
        </div>

        <table id="eventTableid" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Event Name</th>
                    <th>Color</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->eventname }}</td>
                <td style="background-color:{{ $event->color }}"> </td>
                <td>{{ $event->start_date }}</td>
                <td>{{ $event->end_date }}</td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('emp.showEventList') }}" type="submit" class="mt-2 btn btn-warning" style="float:right;">
            Back
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#eventTableid').DataTable({
                "pagingType": "full_numbers",
                "searching": false,
            });
        });
    </script>
@endsection