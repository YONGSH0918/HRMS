@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Salary Component for Job Title</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payroll</li>
                    @foreach($jobTitles as $jobTitle)
                    <li class="breadcrumb-item active">{{ $jobTitle->job_title_name }}</li>
                    <li class="breadcrumb-item active">Salary Component</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
function changeSalaryComponent() {
   //get selected category of salary component
   var selectedCategory = document.getElementById("categoryOfSalaryComponent");
   var result = selectedCategory.options[selectedCategory.selectedIndex].value;

   var salaryComponentOptions = document.getElementsByClassName("salaryComponentOption");

   for(var i=0; i<salaryComponentOptions.length; i++) {
      if(salaryComponentOptions[i].classList.contains(result)) {
         salaryComponentOptions[i].hidden = false;
      } else {
         salaryComponentOptions[i].hidden = true;
      }
   }

}
</script>

@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
   {{ Session::get('success')}}
</div>
@endif

<div class="container">

      <table id="salaryStructureForAJobTitleTable" class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Salary Component ID</th>
               <th>Salary Component Name</th>
               <th>Amount (RM)</th>
               <th>Action</th>
            </tr>
         </thead>

         <tbody>
            @foreach($currentTitleComponents as $currentTitleComponent)
            <tr>
               <td>{{ $currentTitleComponent->salary_component }}</td>
               <td>{{ $currentTitleComponent->salaryComponentName }}</td>
               <td>{{ $currentTitleComponent->amount }}</td>
               <td>
                  <a href="{{ route('showEditSalaryComponentForJobTitle', ['id' => $currentTitleComponent->id]) }}" class="btn btn-warning">
                     <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="{{ route('deleteSalaryComponentForJobTitle', ['id' => $currentTitleComponent->id]) }}" class="btn btn-danger" onclick="return confirm('Delete {{$currentTitleComponent->salaryComponentName}}?')">
                        <i class="bi bi-trash-fill"></i>
                  </a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

   <br>
   <br>

   <div class="card-body" style="width: 450px; margin: 0 auto;">
      <form action="{{ route('addSalaryComponentForJobTitle') }}" method="post">
         @csrf
         <input type="hidden" name="jobTitleId" value="{{ $jobTitle->id }}">
         <div class="mb-3">
            <label for="categoryOfSalaryComponent">Select from category:</label>
            <select class="form-control" id="categoryOfSalaryComponent" name="categoryOfSalaryComponent" onchange="changeSalaryComponent();">
               <option value="default">-- Select category --</option>
               @foreach($categoriesOfSalaryComponent as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="mb-3">
            <label for="salaryComponent" class="form-label">Salary Component: </label>
            <select name= "salaryComponent" class="form-select" required>
               <option value="default">-- Select salary component --</option>
               @foreach($categoriesOfSalaryComponent as $category)
                  @foreach($salaryComponents as $salaryComponent)
                     @if($salaryComponent->category == $category->id)
                        @php $added = 0; @endphp
                           @foreach($currentTitleComponents as $currentTitleComponent)
                              @if($salaryComponent->id == $currentTitleComponent->salary_component)
                                 @php $added = 1; @endphp
                              @endif
                           @endforeach

                           @if($added==0)
                           <option class="salaryComponentOption {{ $category->id }}" value="{{ $salaryComponent->id }}" hidden>{{ $salaryComponent->name }}</option>
                           @endif
                     @endif
                  @endforeach
               @endforeach
            </select>
         </div>
         <div class="mb-3">
               <label for="amount" class="form-label">Amount (RM):</label>
               <input type="number" name="amount" min="0" value="" class="form-control" required>
         </div>
         <input type="submit" name="add" value="Add Salary Component" class="btn btn-primary">
      </form>
   </div>
   @endforeach
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
   $('#salaryStructureForAJobTitleTable').DataTable({
      "pagingType": "full_numbers",
   });
});
</script>
@endsection
