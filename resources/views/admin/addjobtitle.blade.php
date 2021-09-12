<div class="modal fade" id="addJobtitle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Job Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addJobtitle') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Job Title</label>
                <input class="form-control" id="jobtitle_name" name="jobtitle_name" placeholder="Enter job title" />      
            </div>
            <div class="mb-3">
                <label for="">Department</label>
                <select name="department" id="department" class="form-control">
                    @foreach($departments as $dept)
                        <option value="{{ $dept->department_name }}">
                            {{ $dept->department_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description of the job"></textarea>
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