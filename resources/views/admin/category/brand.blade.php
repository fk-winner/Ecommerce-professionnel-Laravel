@extends('admin.admin_layouts')

@section('admin_content')

 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Brand Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand Liste
            <a href="#" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Ajouter Nouveau</a>
        </h6>


        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Brand name</th>
                <th class="wd-15p">Brand logo</th>
                <th class="wd-20p">Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($brand as $key=>$rows)
              <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $rows->brand_name }}</td>
                <td> <img src="{{ URL::to($rows->brand_logo) }}" height="70px;" width="80px;"></td>
                <td>
                    <a href="{{ URL::to('edit/brand/'.$rows->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ URL::to("delete/brand/".$rows->id) }}" class="btn btn-sm btn-danger" id="delete">Supprimer</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->




  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter Brand</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body pd-20">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control"  placeholder="add Brand">

                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
                  <input type="file" name="brand_logo" class="form-control"  >

                </div>


        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Ajouter</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Fermer</button>
        </div>
    </form>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

@endsection
