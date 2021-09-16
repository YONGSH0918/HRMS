<div class="modal fade" id="editSalaryComponent{{$salaryComponent->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Salary Component</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('updateSalaryComponent') }}" enctype="multipart/form-data">
            @csrf 
               <div class="mb-3">
                     <label for="id" class="form-label">ID</label>
                     <input type="text" name="id" id="id" value="{{ $salaryComponent->id}}" readonly>
               </div>
               <div class="mb-3">
                     <label for="name" class="label">Salary Component Name</label>
                     <input type="text" name="name" id="name" value="{{ $salaryComponent->name}}">
               </div>
               <div class="mb-3">
                  <label for="categoryOfSalaryComponent" class="label">Category</label>
                  <select class="form-control" id="categoryOfSalaryComponent" name="categoryOfSalaryComponent">
                     @foreach($categoriesOfSalaryComponent as $category)
                        <option value="{{ $category->id }}"
                           @if($category->id == $salaryComponent->category)
                           selected
                           @endif>
                           {{ $category->name }}
                        </option>
                     @endforeach
                  </select>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
               </div>
          </form>
        </div> 
      </div>
    </div>
  </div>