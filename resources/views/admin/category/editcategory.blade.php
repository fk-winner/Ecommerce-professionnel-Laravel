@extends('admin.admin_layouts')

@section('admin_content')

 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Update Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Liste

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

    <form action="{{ url('update/category/'.$category->id) }}" method="POST">
        @csrf
    <div class="modal-body pd-20">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Cayegory Name</label>
              <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control"  placeholder="add category">

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
