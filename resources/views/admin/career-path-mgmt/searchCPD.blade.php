@extends('admin.career-path-mgmt.base')
@section('action-content')

<!-- Main content -->
<section class="content" style="font-size: small;">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="box-title">List of Career Path Development</h5>
        </div>
        <div class="col-sm-4" style="text-align: -webkit-right;">
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewCPD') }}">Back</a>
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
          <table id="cpTableid" class="table table-bordered table-hover dataTable">
              <thead>
                <tr role="row">
                  <th width="12%">CPD ID</th>
                  <th width="12%">Employee ID</th>
                  <th width="23%">Program Title</th>
                  <th width="12%">Supervisor Name</th>
                  <th width="12%">Status</th>
                  <th width="15%">Date Completed</th>
                  <th tabindex="0">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cpds as $cpd)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $cpd->employee_CareerPath_Info_ID }}</td>
                  <td class="hidden-xs">EMP-{{ $cpd->employee_ID }}</td>
                  <td class="hidden-xs">{{ $cpd->program_Title }}</td>
                  <td class="hidden-xs">{{ $cpd->supervisor_Name }}</td>
                  @if($cpd->status == "Not Started")
                  <td class="hidden-xs" style="color: #F7A400;">{{ $cpd->status }}</td>
                  @elseif($cpd->status == "In Progress")
                  <td class="hidden-xs" style="color: #00CB14;">{{ $cpd->status }}</td>
                  @elseif($cpd->status == "Completed")
                  <td class="hidden-xs" style="color: #2515D9;">{{ $cpd->status }}</td>
                  @else
                  <td class="hidden-xs" style="color: #FC0000;">{{ $cpd->status }}</td>
                  @endif
                  <td class="hidden-xs">{{ $cpd->scheduled_Date_Completed}}</td>
                  <td>
                    <a href="{{ route('cpd.detail', ['id' => $cpd->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                      <i class="fa fa-search"></i>
                    </a>
                    <!-- route('cpd.detail', ['id' => $cpd->id])-->
                    <!--('editEmployee', ['employee_ID' => $employee->employee_ID])-->
                    <a href="{{ route('editCPD', ['id' => $cpd->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('deleteCPD', ['id' => $cpd->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                      <i class="fa fa-trash"></i>
                    </a>
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
    $('#cpTableid').DataTable({
      "pagingType": "full_numbers",
      "searching": false,
    });
  });
</script>
@endsection