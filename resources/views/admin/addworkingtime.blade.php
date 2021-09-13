<div class="modal fade" id="addWRKtime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Working Time</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addWRKtime') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="">Start Time</label>
            <input type="time" class="form-control" id="start" name="start" placeholder="Enter start time" />
          </div>
          <div class="mb-3">
            <label for="">End Time</label>
            <input type="time" class="form-control" id="end" name="end" placeholder="Enter end time" />
          </div>
          <div class="mb-3">
            <label for="">Duration of Working Time</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration of time" value="">
              <button class="btn btn-warning" onclick="Calc()">Calculate</button>
            </div>
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

<script type="text/javascript">
  function Calc() {
    var start = document.getElementById('start').value;
    var end = document.getElementById('end').value;

    var split1 = start.split(":");
    var split2 = end.split(":");

    var time1 = split1[0] + split1[1] + split1[2];
    var time2 = split2[0] + split2[1] + split2[2];

    time1 - time2;
    var ans;
    if (time1 < time2) {
      var diff = getTimeDiff('{time2}', '{time1}', 'm');
      ans = diff / 60;
    } else {
      var diff1 = getTimeDiff('24:00', '{time1}', 'm');
      var diff2 = getTimeDiff('{time2}', '00:00', 'm');
      ans = (diff1 + diff2) / 60;

    };

    document.getElementById("duration").value = ans;
  }
</script>