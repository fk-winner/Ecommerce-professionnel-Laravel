@extends('admin.admin_layouts')

@section('admin_content')

 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Category Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category Liste
            <a href="#" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Ajouter Nouveau</a>
        </h6>


        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Category name</th>
                <th class="wd-20p">Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($category as $key=>$rows)
              <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $rows->category_name }}</td>
                <td>
                    <a href="{{ URL::to('edit/cateory/'.$rows->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ URL::to("delete/category/".$rows->id) }}" class="btn btn-sm btn-danger" id="delete">Supprimer</a>
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
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter Category</h6>
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

        <form action="{{ route('store.category') }}" method="POST">
            @csrf
        <div class="modal-body pd-20">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Cayegory Name</label>
                  <input type="text" name="category_name" class="form-control"  placeholder="add category">

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
