
  <div class="modal fade" id="editEmployment{{$employment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Employment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateEmployment')}}" enctype="multipart/form-data">
            @csrf 
                <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $employment->id }}">
                <div class="mb-3">
                    <label>Employment Name</label>
                    <input type="text" class="form-control" id="employment_name" name="employment_name" value="{{ $employment->employment_name }}">
                </div>
                <div class="mb-3">
                  <label>Working Time</label>
                  <select name= "worktime" id= "worktime" class="form-control">
                      @foreach($workingtimes as $workingtime)
                          <option value="{{ $workingtime->start }}{{ __(' - ') }}{{ $workingtime->end }}"
                          @if($employment->employment_id==$workingtime->id)
                          selected
                          @endif
                          >{{ $workingtime->start }}{{ __(' - ') }}{{ $workingtime->end }}
                          </option>   
                      @endforeach
                  </select>
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