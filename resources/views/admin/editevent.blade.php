
  <div class="modal fade" id="editEvent{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{route('updateEvent')}}" enctype="multipart/form-data">
          @csrf 
            <input type="hidden" class="form-control" id="ID" name="id" value="{{ $event->id }}"> 
            <div class="mb-3">
                <label>Event Name</label>
                <input type="text" class="form-control" id="eventname" name="eventname" value="{{ $event->eventname }}">
            </div>
            <div class="mb-3">
                <label for="">Enter Color</label>
                <input type="color" class="form-control" id="color" name="color" value="{{ $event->color }}" style="height: 40px;">
            </div>
            <div class="mb-3">
                <label for="">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $event->start_date }}">
            </div>
            <div class="mb-3">
                <label for="">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end_date }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div> 
        </form>
      </div>
    </div>
  </div>
