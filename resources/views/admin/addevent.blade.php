<div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addEvent') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Event Name</label>
                <input type="text" class="form-control" name="eventname" placeholder="Enter event name" />      
            </div>
            <div class="mb-3">
                <label for="">Enter Color</label>
                <input type="color" class="form-control" name="color" placeholder="Enter the color" style="height: 40px;" />
            </div>
            <div class="mb-3">
                <label for="">Start Date</label>
                <input type="date" id="start" class="form-control" name="start_date" placeholder="Enter start date" />
            </div>
            <div class="mb-3">
                <label for="">End Date</label>
                <input type="date" id="end" class="form-control" name="end_date" placeholder="Enter end date" />
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