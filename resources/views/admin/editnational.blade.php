
  <div class="modal fade" id="editNational{{$nationality->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit National</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateNational')}}" enctype="multipart/form-data">
            @csrf 
                <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $nationality->id }}">
                <div class="mb-3">
                    <label>National</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $nationality->name }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div> 
      </div>
    </div>
  </div>
