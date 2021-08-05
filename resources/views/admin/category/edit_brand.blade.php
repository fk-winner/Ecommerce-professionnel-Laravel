@extends('admin.admin_layouts')

@section('admin_content')

 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Update Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update brand

        </h6>


        <div class="table-wrapper">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ url('update/brand/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-body pd-20">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Brand Name</label>
              <input type="text" value="{{ $brand->brand_name }}" name="brand_name" class="form-control"  placeholder="add category">

            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Brand logo</label>
              <input type="file" value="{{ $brand->brand_logo }}" name="brand_logo" class="form-control"  placeholder="add category">

            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Old Brand Logo</label>
              <img src="{{ URL::to($brand->brand_logo) }}" height="70px;" width="90px;">
              <input type="hidden" name="old_logo" value="{{ $brand->brand_logo}}">

            </div>


    </div><!-- modal-body -->
    <div class="modal-footer">
      <button type="submit" class="btn btn-info pd-x-20">Modifier</button>

    </div>
</form>

        </div><!-- table-wrapper -->
      </div><!-- card -->

  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->



@endsection
