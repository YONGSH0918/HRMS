@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Salary Component<h5>All Job Title</h5></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payroll</li>
                    <li class="breadcrumb-item active">Salary Component for All JobTitle</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
   {{ Session::get('success')}}
</div>
@endif


<div>
   <table id="salaryStructureForAllJobTitleTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <td>ID</td>
            <td>Job Title</td>
            <td>Salary Component</td>
            <td>Action</td>
         </tr>
      </thead>

      <tbody>
         @foreach($jobTitles as $jobTitle)
         <tr>
            <td>{{$jobTitle->id}}</td>
            <td>{{$jobTitle->job_title_name}}</td>
            <td>
               @foreach($titleComponents as $titleComponent)
                  @if($titleComponent->job_title == $jobTitle->id)
                     {{ $titleComponent->salaryComponentName }}
                     <br>
                  @endif
               @endforeach
            </td>
            <td>
               <a href="{{ route('showSalaryComponentForAJobTitle',['id' => $jobTitle->id]) }}" class="btn btn-primary">
                  <i class="bi bi-eye-fill"></i>
               </a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>

@endsection

@section('script')
<script>
$(document).ready(function() {
   $('#salaryStructureForAllJobTitleTable').DataTable({
      "pagingType": "full_numbers",
   });
});
</script>
@endsection
