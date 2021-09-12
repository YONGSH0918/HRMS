<div class="modal fade" id="addEmployment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addEmployment') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Employment Name</label>
                <input class="form-control" name="employment_name" placeholder="Enter employment name" />      
            </div>
            <div class="mb-3">
                <label for="">Working Time</label>
                <select name= "worktime" id= "worktime" class="form-control">
                    @foreach($workingtimes as $workingtime)
                        <option value=" {{ $workingtime->start }}{{ __('-') }}{{ $workingtime->end }}">
                            {{ $workingtime->start }}{{ __('-') }}{{ $workingtime->end }}
                        </option>
                    @endforeach
                </select>
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