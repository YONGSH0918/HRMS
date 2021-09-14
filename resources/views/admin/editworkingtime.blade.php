
  <div class="modal fade" id="editWRKtime{{$workingtime->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Working Time</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateWRKtime')}}" enctype="multipart/form-data">
            @csrf 
              <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $workingtime->id }}">
              <div class="mb-3">
                  <label>Start Time</label>
                  <input type="time" class="form-control" id="start" name="start" value="{{ $workingtime->start }}">
              </div>
              <div class="mb-3">
                  <label>End Time</label>
                  <input type="time" class="form-control" id="end" name="end" value="{{ $workingtime->end }}">
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
