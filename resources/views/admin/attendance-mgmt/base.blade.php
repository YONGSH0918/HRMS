@extends('layouts.adminapp')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2>
            Employee Attendance
        </h2>
        <ol class="breadcrumb">
            <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
            <li class="active">Attendance</li>
        </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
</div>
@endsection