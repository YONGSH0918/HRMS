<div class="modal fade" id="editHealthFacility{{$hf->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Health Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('updateHealthFacility') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $hf->id }}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{$hf->name}}" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" id="address" name="address">{{$hf->address}}</textarea>
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