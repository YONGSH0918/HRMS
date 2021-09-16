@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Salary Component</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item active">Salary Component</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
@include('admin.payroll.createSalaryComponent')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
   {{ Session::get('success')}}
</div>
@endif

<div class="container">

         <div style="margin-bottom: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSalaryComponent">
                Create Salary Component
            </button>
        </div>

   <table id="salaryComponentTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <td>ID</td>
            <td>Salary Component Name</td>
            <td>Category</td>
            <td>Action</td>
         </tr>
      </thead>

      <tbody>
         @foreach($salaryComponents as $salaryComponent)
         <tr>
            <td>{{$salaryComponent->id}}</td>
            <td>{{$salaryComponent->name}}</td>
            <td>{{$salaryComponent->categoryName}}</td>
            <td>
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editSalaryComponent{{$salaryComponent->id}}">
                  <i class="bi bi-pencil-square"></i>
               </button>
               <a href="{{ route('deleteSalaryComponent',['id' => $salaryComponent->id]) }}" class="btn btn-danger" onclick="return confirm('Delete {{$salaryComponent->name}}?')">
                  <i class="bi bi-trash-fill"></i>
               </a>
            </td>
            @include('admin.payroll.editSalaryComponent')
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
   $('#salaryComponentTable').DataTable({
      "pagingType": "full_numbers",
   });
});
</script>
@endsection
