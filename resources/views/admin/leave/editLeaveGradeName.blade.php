<div class="modal fade" id="editLeaveGrade{{$leaveGrade->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Leave Grade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateLeaveGradeName')}}" enctype="multipart/form-data">
            @csrf 
               <div class="mb-3">
                     <label for="id" class="label">ID</label>
                     <input type="text" class="form-control" name="id" id="id" value="{{ $leaveGrade->id}}" readonly>
               </div>
               <div class="mb-3">
                     <label for="name" class="label">Leave Type Name</label>
                     <input type="text" class="form-control" name="name" id="name" value="{{ $leaveGrade->name}}">
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
