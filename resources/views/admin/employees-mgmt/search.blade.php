@extends('admin.employees-mgmt.base')
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
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('insertEmployee') }}">Add new employee</a>
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
          <table id="employeeTableid" class="table table-bordered table-hover dataTable">
            <thead>
              <tr role="row">
                <th width="6%">Images</th>
                <th width="9%" class="sorting_asc">Employee ID</th>
                <th width="12%" class="sorting hidden-xs">Employee Name</th>
                <th width="8%" class="sorting hidden-xs">DOB</th>
                <th width="12%" class="sorting hidden-xs">Department</th>
                <th width="8%" class="sorting hidden-xs">Supervisor</th>
                <th width="8%" class="sorting hidden-xs">Job Title</th>
                <th width="8%" class="sorting hidden-xs">Hired Date</th>
                <th width="8%" class="sorting hidden-xs">Status</th>
                <th tabindex="0">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr role="row" class="odd">
                <td><img src="{{ asset('images/employeesImages') }}/{{ $employee->image }}" width="50px" height="50px" /></td>
                <td class="sorting_1">EMP-{{ $employee->employee_ID }}</td>
                <td class="hidden-xs">{{ $employee->employee_Name }}</td>
                <td class="hidden-xs">{{ $employee->date_of_birth }}</td>
                <td class="hidden-xs">{{ $employee->department }}</td>
                <td class="hidden-xs">{{ $employee->supervisor }}</td>
                <td class="hidden-xs">{{ $employee->jobtitle }}</td>
                <td class="hidden-xs">{{ $employee->start_Date }}</td>
                @if($employee->status == "Active")
                  <td class="hidden-xs" style="color: #00CB14;">{{ $employee->status }}</td>
                  @elseif($employee->status == "Inactive")
                  <td class="hidden-xs" style="color: #FC0000;">{{ $employee->status }}</td>
                  @else
                  <td class="hidden-xs" style="color: #2515D9;">{{ $employee->status }}</td>
                  @endif
                <td>
                  <a href="{{ route('employee.detail', ['id' => $employee->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                    <i class="fa fa-search"></i>
                  </a>
                  <!--('editEmployee', ['employee_ID' => $employee->employee_ID])-->
                  <a href="{{ route('editEmployee', ['id' => $employee->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                    <i class="fa fa-edit"></i>
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
  <div style="text-align: -webkit-right;">
    <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployee') }}">Back</a>
  </div>
  <!-- /.box-body -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#employeeTableid').DataTable({
      "pagingType": "full_numbers",
      "searching": false,
    });
  });
</script>
@endsection