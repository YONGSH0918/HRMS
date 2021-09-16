<div class="modal fade" id="addLeaveType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Leave Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addLeaveType') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
               <label for="name" class="label" class="form-label">Leave Type Name</label>
               <input type="text" name="name" id="name" class="form-control">      
            </div>
            <div class="mb-3">
               <label for="min_num_of_days" class="label" class="form-label">Minimum Number of Days</label>
               <input type="number" name="min_num_of_days" id="min_num_of_days" class="form-control">
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
