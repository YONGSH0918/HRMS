<div class="modal fade" id="addHealthFacility" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Health Facility</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addHealthFacility') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Name</label>
                <input class="form-control" name="name" placeholder="Enter Name" />      
            </div>
            <div class="mb-3">
                <label for="">Address</label>
                <textarea class="form-control" name="address" placeholder="Enter Address"></textarea>      
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