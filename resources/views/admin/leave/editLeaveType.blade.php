<div class="modal fade" id="editLeaveType{{$leaveType->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Leave Type</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateLeaveType')}}" enctype="multipart/form-data">
            @csrf 
                  <div class="mb-3">
                     <label for="id" class="label" class="form-label">ID</label>
                     <input type="text" class="form-control" name="id" id="id" value="{{ $leaveType->id}}" readonly>
                  </div>
                  <div class="mb-3">
                     <label for="name" class="label" class="form-label">Leave Type Name</label>
                     <input type="text" class="form-control" name="name" id="name" value="{{ $leaveType->name}}">
                  </div>
                  <div class="mb-3">
                     <label for="min_num_of_days" class="label" class="form-label">Minimum Number of Days</label>
                     <input type="number" class="form-control" name="min_num_of_days" id="min_num_of_days" value="{{ $leaveType->min_num_of_days }}">
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