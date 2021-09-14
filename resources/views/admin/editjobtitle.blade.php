
  <div class="modal fade" id="editJobtitle{{$jobtitle->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Job Title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateJobtitle')}}" enctype="multipart/form-data">
            @csrf 
                <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $jobtitle->id }}">
                <div class="mb-3">
                    <label>Job Title</label>
                    <input type="text" class="form-control" id="jobtitle_name" name="jobtitle_name" value="{{ $jobtitle->jobtitle_name }}">
                </div>
                <div class="mb-3">
                  <label>Department</label>
                  <select name= "department" id= "department" class="form-control">
                      @foreach($departments as $department)
                          <option value="{{ $department->department_name }}"
                          @if($jobtitle->department_id==$department->department_name)
                          selected
                          @endif
                          >{{ $department->department_name }}
                          </option>   
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea type="text" class="form-control" id="description" name="description">
                        {{ $jobtitle->description }}
                    </textarea>
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