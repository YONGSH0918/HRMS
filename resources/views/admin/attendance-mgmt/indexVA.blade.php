@extends('admin.vaccination-mgmt.base')
@section('action-content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success')}}
</div>
@endif
@if(Session::has('update'))
<div class="alert alert-success" role="alert">
  {{ Session::get('update')}}
</div>
@endif
@if(Session::has('delete'))
<div class="alert alert-success" role="alert">
  {{ Session::get('delete')}}
</div>
@endif
<!-- Main content -->
<section class="content" style="font-size: small;">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="box-title">List of Vaccination Appointment</h5>
        </div>
        <div class="col-sm-4" style="text-align: -webkit-right;">
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('viewEmployeeVA') }}">Add Employee Vaccination Appointment</a>
        </div>
        <div style="margin-bottom: 10px;">
          <form method="POST" action="{{ route('searchVA') }}">
            @csrf
            <input type="text" id="search" name="search" placeholder="Search Vaccination Appointment ID or Employee ID Number" style="width: 450px;">
            <button type="submit" class="btn btn-primary">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              Search
            </button>
          </form>
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
            <table id="vaTableid" class="table table-bordered table-hover dataTable">
              <thead>
                <tr role="row">
                  <th width="12%" class="sorting_asc">Vaccination Appointment ID</th>
                  <th width="12%" class="sorting_asc">Employee ID</th>
                  <th width="25%" class="sorting_asc">Employee Name</th>
                  <th width="15%" class="sorting hidden-xs">Date</th>
                  <th width="15%" class="sorting hidden-xs">Status</th>
                  <th tabindex="0">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vas as $va)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $va->employee_Vaccination_ID }}</td>
                  <td class="hidden-xs">EMP-{{ $va->employee_ID }}</td>
                  <td class="hidden-xs">{{ $va->employee_Name }}</td>
                  <td class="hidden-xs">{{ $va->vaccination_Date}}</td>
                  <td class="hidden-xs">{{ $va->vaccination_Status}}</td>
                  <td>
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
    $('#vaTableid').DataTable({
      "pagingType": "full_numbers",
      "searching": false,
    });
  });
</script>
@endsection