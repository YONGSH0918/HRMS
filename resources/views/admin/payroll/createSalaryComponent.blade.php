<div class="modal fade" id="addSalaryComponent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salary Component</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addSalaryComponent') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Salary Component Name</label>
                <input class="form-control" name="name" placeholder="Enter salary component name" /> 
            </div>
            <div class="mb-3">
               <label for="category" class="form-label">Category</label>
               <select name="category" id="category" class="form-select">
                  <option value="default">-- Select category --</option>
                  @foreach($categoriesOfSalaryComponent as $categoryOfSalaryComponent)
                  <option value="{{ $categoryOfSalaryComponent->id }}">{{ $categoryOfSalaryComponent->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>