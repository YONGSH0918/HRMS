@extends('admin.healthFacility-mgmt.base')
@section('action-content')

<!-- Main content -->
<section class="content" style="font-size: small;">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="box-title">List of Health Facility</h5>
        </div>
        <div class="col-sm-4" style="text-align: -webkit-right;">
          <a class="btn btn-primary" style="font-size: small;" href="{{ route('insertHealthFacility') }}">Add New Health Facility</a>
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
                <th tabindex="0" aria-controls="example2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($hfs as $hf)
              <tr role="row" class="odd">
                <td class="sorting_1">{{ $hf->id }}</td>
                <td class="sorting_1">{{ $hf->name }}</td>
                <td class="hidden-xs">{{ $hf->address }}</td>
                <td>
                  <a href="{{ route('editHealthFacility', ['id' => $hf->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="{{ route('deleteHealthFacility', ['id' => $hf->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <a href="{{ route('viewHealthFacility') }}" type="submit" class="mt-2 btn btn-primary" style="float:right;">
            Back
        </a>
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