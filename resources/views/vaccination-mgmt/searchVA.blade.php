@extends('vaccination-mgmt.base')
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
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewVA') }}">Back</a>
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
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th width="12%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Id: activate to sort column descending" aria-sort="ascending">Vaccination Appointment ID</th>
                  <th width="12%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Id: activate to sort column descending" aria-sort="ascending">Employee ID</th>
                  <th width="25%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Id: activate to sort column descending" aria-sort="ascending">Employee Name</th>
                  <th width="15%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
                  <th width="15%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="DateofBirth: activate to sort column ascending">Status</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vas as $va)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $va->employee_Vaccination_ID }}</td>
                  <td class="hidden-xs">{{ $va->employee_ID }}</td>
                  <td class="hidden-xs">{{ $va->employee_Name }}</td>
                  <td class="hidden-xs">{{ $va->vaccination_Date }}</td>
                  <td class="hidden-xs">{{ $va->vaccination_Status}}</td>
                  <td>
                    <a href="{{ route('va.detail', ['id' => $va->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                      <i class="fa fa-search"></i>
                    </a>
                    <!-- route('cpd.detail', ['id' => $cpd->id])-->
                    <!--('editEmployee', ['employee_ID' => $employee->employee_ID])-->
                    <a href="{{ route('editVA', ['id' => $va->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('deleteVA', ['id' => $va->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                      <i class="fa fa-trash"></i>
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
              <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($vas)}} of {{count($vas)}} entries</div>
            </div>
            <div class="col-sm-7">
              <nav class=".pagination-circle" id="example2_paginate">
                {{ $vas->links() }}
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