@extends('employees-mgmt.base')
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
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="6%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Images: activate to sort column descending" aria-sort="ascending">Images</th>
                <th width="9%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Id: activate to sort column descending" aria-sort="ascending">Employee ID</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee Name</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="DateofBirth: activate to sort column ascending">DOB</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="department: activate to sort column ascending">Department</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="jobtitle: activate to sort column ascending">Job Title</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="startDate: activate to sort column ascending">Hired Date</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="startDate: activate to sort column ascending">Status</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr role="row" class="odd">
                <td><img src="{{ asset('images/employeesImages') }}/{{ $employee->image }}" width="50px" height="50px" /></td>
                <td class="sorting_1">{{ $employee->employee_ID }}</td>
                <td class="hidden-xs">{{ $employee->employee_Name }}</td>
                <td class="hidden-xs">{{ $employee->date_of_birth }}</td>
                <td class="hidden-xs">{{ $employee->department }}</td>
                <td class="hidden-xs">{{ $employee->jobtitle }}</td>
                <td class="hidden-xs">{{ $employee->start_Date }}</td>
                <td class="hidden-xs">{{ $employee->status }}</td>
                <td>
                  <a href="{{ route('employee.detail', ['id' => $employee->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                    <i class="fa fa-search"></i>
                  </a>
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
      <div class="box-footer" style="width: -webkit-fill-available;">
        <div class="row">
          <div class="col-sm-8">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($employees)}} of {{count($employees)}} entries</div>
          </div>
          <div class="col-sm-7">
            <nav class=".pagination-circle" id="example2_paginate">
              {{ $employees->links() }}
          </div>
          <div class="col-sm-5" style="text-align: -webkit-right;">
            <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployee') }}">Back</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  </div>
  <!-- /.box-body -->
  </div>
</section>
<!-- /.content -->
</div>
@endsection