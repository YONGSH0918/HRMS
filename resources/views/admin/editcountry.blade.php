<div class="modal fade" id="editCountry{{$country->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateCountry')}}" enctype="multipart/form-data">
            @csrf 
                <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $country->id }}">
                <div class="mb-3">
                    <label>Country Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}">
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