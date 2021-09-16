@extends('employee.attendance-mgmt.base')
@section('action-content')

<!-- Main content -->
<section class="content" style="font-size: small;">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="box-title">List of Attendance </h5>
        </div>
        <div class="col-sm-4" style="text-align: -webkit-right;">
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewMeA') }}">Back</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row" style="width: -webkit-fill-available;">
          <div class="col-sm-12">
            <table id="aTableid" class="table table-bordered table-hover dataTable">
              <thead>
                <tr role="row">
                  <th width="12%" class="sorting_asc">Employee ID</th>
                  <th width="15%" class="sorting_asc">Date</th>
                  <th width="15%" class="sorting hidden-xs">Time In</th>
                  <th width="15%" class="sorting hidden-xs">Time Out</th>
                  <!-- <th width="15%" class="sorting hidden-xs">Duration</th>-->
                  <th tabindex="0">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($attendances as $attendance)
                <tr role="row" class="odd">
                  <td class="hidden-xs">EMP-{{ $attendance->employee_ID }}</td>
                  <td class="hidden-xs">{{ $attendance->date }}</td>
                  <td class="hidden-xs">{{ $attendance->time_In}}</td>
                  <td class="hidden-xs">{{ $attendance->time_Out}}</td>

                  <td>
                    @if( $attendance->time_Out == '00:00:00')
                    <form name="formEditMeA" class="form-horizontal" role="form" method="POST" action="{{ route('updateMeA', ['id' => $attendances->id]) }}" enctype="multipart/form-data">
                      @csrf
                      <button type="submit" name="editMeA" class="btn btn-success col-sm-3 col-xs-5 btn-margin">
                        Time Out
                      </button>
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- /.box-body -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#aTableid').DataTable({
      "pagingType": "full_numbers",
      "searching": false,
    });
  });
</script>
@endsection