@extends('admin.career-path-mgmt.base')
@section('action-content')

<!-- Main content -->
<section class="content" style="font-size: small;">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="box-title">List of employees</h5>
        </div>
        <div class="col-sm-4" style="text-align: -webkit-right;">
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployeeCPD') }}">Back</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
    </div>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row" style="width: -webkit-fill-available;">
        <div class="col-sm-12">
          <table id="cpTableid" class="table table-bordered table-hover dataTable">
            <thead>
              <tr role="row">
                <th width="9%">Employee ID</th>
                <th width="20%">Employee Name</th>
                <th width="20%">Department</th>
                <th width="12%">Job Title</th>
                <th tabindex="0">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr role="row" class="odd">
                <td class="sorting_1">EMP-{{ $employee->employee_ID }}</td>
                <td class="hidden-xs">{{ $employee->employee_Name }}</td>
                <td class="hidden-xs">{{ $employee->department }}</td>
                <td class="hidden-xs">{{ $employee->jobtitle }}</td>
                <td>
                  <a href="{{ route('insertCPD', ['id' => $employee->id])}}" class="btn btn-success col-sm-3 col-xs-5 btn-margin">
                    <i class="fa fa-plus"></i>
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