@extends('layouts.empapp')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css" />

@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0">Full Calendar</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end mt-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Full Calendar</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="d-grid gap-2 d-md-block" style="margin-bottom: 20px;">
        <a href="{{ route('emp.showEventList')}}" class="btn btn-success">Event List</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background: #2e6da4; color: white">
                    Event Calendar
                </div>

                <div class="card-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

{!! $calendar->script() !!}
@endsection