@extends('admin.layouts.app')
@section('title','Brands')
@section('right-panel')

  <div class="wrapper-content">
    <h2 class="text-left mt-4">Brands</h2>

    <div class="error" role="alert"></div>

    <div class="row mt-4">
      <div class="col-md-6 col-12 mt-4"><!--<i class="fa fa-search" aria-hidden="true"></i>-->
        <input type="text" id="search" class="form-control" placeholder="Search...">
      </div>

      <div id="add" class="col-md-6 col-12 mt-4">
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Brand</button>
      </div>
    </div>

    <div class="row mt-2">
      <!-- Table-to-load-the-data Part -->
      <div class="col-12">
        <table class="table mt-4">
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Info</th>
            <th class="media-767-delete">Created at</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody id="brand-list" name="brand-list">
          @foreach ($brands as $brand)
            <tr id="brand{{$brand->id}}">
              <td id="id">{{$brand->id}}</td>
              <td>{{$brand->name}}</td>
              <td>{{$brand->info}}</td>
              <td class="media-767-delete">{{$brand->created_at}}</td>
              <td>
                <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$brand->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-xs btn-delete delete-brand" value="{{$brand->id}}"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div><!-- End of Table-to-load-the-data Part -->

  </div>

  <nav id="pagquit_search" class="mt-5">
    {{$brands->links()}}
  </nav>

    <!-- Modal (Pop up when detail button clicked) -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Brand Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <div class="display-center">
            <form id="formBrands" name="formBrands" class="form-horizontal" novalidate="">
              {{ csrf_field() }}
              <div class="d-flex flex-md-row display-767-column error">
                <div class="group-input">
                  <label for="name" class="col-form-label">Name</label>
                  <input type="text" class="form-control col-md-11 col-12 has-error" id="name" name="name" placeholder=" brand name" value="" required />
                </div>
              </div>

              <div class="d-flex flex-md-row display-767-column">
                <div class="group-input">
                  <label for="info" class="col-form-label">Info</label>
                  <textarea class="form-control col-md-11 col-12" name="info" id="info" type="text" rows="5" cols="38" placeholder=" some information.."></textarea>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="brand_id" name="brand_id" value="0">
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
  <script src="{{asset('/js/admin/brand/ajax-crud.js')}}"></script>
@endsection
