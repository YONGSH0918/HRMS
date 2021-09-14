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
            <label>Position</label>
            <select name="position" id="position" class="form-control">
              @foreach($positions as $position)
              <option value="{{ $position->name }}" @if($jobtitle->jobtitle_name==$position->name)
                selected
                @endif
                >{{ $position->name }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Department</label>
            <select name="department" id="department" class="form-control">
              @foreach($departments as $department)
              <option value="{{ $department->department_name }}" @if($jobtitle->department_id==$department->department_name)
                selected
                @endif
                >{{ $department->department_name }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Rate per hour (RM)</label>
            <input type="text" class="form-control" id="rate_per_hour" name="rate_per_hour" value="{{ $jobtitle->rate_per_hour }}" required>

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