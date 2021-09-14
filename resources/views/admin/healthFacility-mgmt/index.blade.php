@extends('admin.healthFacility-mgmt.base')
@section('action-content')
@include('admin.healthFacility-mgmt.addHealthFacility')
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
<!-- Main content -->
<section class="content" style="font-size: small;">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="box-title">List of Health Facility</h5>
        </div>
        <div class="col-sm-4" style="text-align: -webkit-right;">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHealthFacility">Add New Health Facility</button>
        </div>
        <div style="margin-bottom: 10px;">
          <form method="POST" action="{{ route('searchHealthFacility') }}">
            @csrf
            <input type="text" id="search" name="search" placeholder="Search ID or Health Facility Name" style="width: 250px;">
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
    </div>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row" style="width: -webkit-fill-available;">
        <div class="col-sm-12">
          <table id="hfTableid" class="table table-bordered table-hover dataTable">
            <thead>
              <tr role="row">
                <th width="5%" class="sorting_asc">ID</th>
                <th width="20%" class="sorting_asc">Name</th>
                <th width="40%" class="sorting hidden-xs">Address</th>
                <th tabindex="0">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($hfs as $hf)
              <tr role="row" class="odd">
                <td class="sorting_1">{{ $hf->id }}</td>
                <td class="sorting_1">{{ $hf->name }}</td>
                <td class="hidden-xs">{{ $hf->address }}</td>
                <td>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editHealthFacility{{$hf->id}}">
                    <i class="fa fa-edit"></i>
                  </button>
                  <a href="{{ route('deleteHealthFacility', ['id' => $hf->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
                @include('admin.healthFacility-mgmt.edit')
              </tr>
              @endforeach
            </tbody>
          </table>
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

@section('script')
<script>
  $(document).ready(function() {
    $('#hfTableid').DataTable({
      "pagingType": "full_numbers",
      "searching": false,
    });
  });
</script>
@endsection