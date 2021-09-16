@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Category of Salary Component</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Payroll</li>
                    <li class="breadcrumb-item active">Category of Salary Component</li>
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


<div class="container">

   <table id="categoryOfSalaryComponentTable" class="table table-bordered table-hover">
      <thead>
         <tr>
            <td>ID</td>
            <td>Category of Salary Component Name</td>
            <td>Salary Component</td>
         </tr>
      </thead>

      <tbody>
         @foreach($categoriesOfSalaryComponent as $category)
         <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
               @foreach($salaryComponents as $salaryComponent)
                  @if($salaryComponent->category == $category->id)
                     {{ $salaryComponent->name }}
                     <br>
                  @endif
               @endforeach
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
   $('#categoryOfSalaryComponentTable').DataTable({
      "pagingType": "full_numbers",
   });
});
</script>
@endsection
