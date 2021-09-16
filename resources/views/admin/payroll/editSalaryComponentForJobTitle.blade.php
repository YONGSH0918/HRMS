@extends('layouts.adminapp')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Bank Name</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                    <li class="breadcrumb-item active">Bank Name</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
@foreach($titleComponents as $titleComponent)
document.getElementById("amount").value=Math.abs({{ $titleComponent->amount }});
@endforeach
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
<div class="container">
   <form method="post" action="{{ route('editSalaryComponentForJobTitle') }}" enctype="multipart/form-data">
      @csrf
      @foreach($titleComponents as $titleComponent)
      <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" name="id" id="id" value="{{ $titleComponent->id }}" readonly>
      </div>
      <div class="mb-3">
         <label for="categoryOfSalaryComponent" class="form-label">Category</label>
         <select class="form-select" id="categoryOfSalaryComponent" name="categoryOfSalaryComponent" onchange="changeSalaryComponent()">
            @foreach($currentSalaryComponents as $currentSalaryComponent)
               @php
                  $current=$currentSalaryComponent->category;
               @endphp
            @endforeach

            @foreach($categoriesOfSalaryComponent as $category)
            <option value="{{ $category->id }}"
               @if($category->id == $current)
                  selected
               @endif>
               {{ $category->name }}
            </option>
            @endforeach
         </select>
      </div>
      <div class="mb-3">
         <label for="salaryComponent" class="form-label">Salary Component: </label>
         <select name= "salaryComponent" class="form-select" required>
            <option class="salaryComponentOption" value="{{ $titleComponent->salary_component }}">{{ $titleComponent->salaryComponentName }}</option>
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
            <input type="number" class="form-control" name="amount" min="0" id="amount" value="" required>
      </div>
      @endforeach
      <div class="mb-3">
            <input type="submit" class="btn btn-success" name="update" value="Update">
      </div>
   </form>
</div>
@endsection
