<div class="modal fade" id="takeAttendance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Attendance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addMeA') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Date</label>
                <input type="date" class="form-control" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" readonly>      
            </div>
            <div class="mb-3">
                <label for="">Time In</label>
                <input type="time" class="form-control" name="time_In" value="{{ Carbon\Carbon::now()->format('H:i:s') }}" readonly>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>