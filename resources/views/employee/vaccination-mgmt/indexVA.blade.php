@extends('employee.vaccination-mgmt.base')
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
        <div style="margin-bottom: 10px;">
          <form method="POST" action="{{ route('searchMeVA') }}">
            @csrf
            <input type="text" id="search" name="search" placeholder="Search Vaccination Appointment ID" style="width: 300px;">
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
                  @if($va->vaccination_Status == "Vaccinated")
                  <td class="hidden-xs" style="color: #00CB14;">{{ $va->vaccination_Status}}</td>
                  @elseif($va->vaccination_Status == "Unvaccinated")
                  <td class="hidden-xs" style="color: #FC0000;">{{ $va->vaccination_Status }}</td>
                  @else
                  <td class="hidden-xs" style="color: #2515D9;">{{$va->vaccination_Status }}</td>
                  @endif
                  <td>
                    <a href="{{ route('vaMe.detail', ['id' => $va->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                      <i class="fa fa-search"></i>
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