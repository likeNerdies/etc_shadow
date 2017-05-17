@extends('admin.index')
@section('title','brands')
@section('right-panel')

<h2>Brands</h2>

<div class="error" role="alert"></div>

<div class="d-flex justify-content-end mt-5">
  <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Brand</button></div>
  <div class="col-md-6"><!--<i class="fa fa-search" aria-hidden="true"></i>-->
  <input type="text" id="search" class="form-control" placeholder="Search..."></div>
</div>

<div class="mt-5">
  <!-- Table-to-load-the-data Part -->
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Info</th>
        <th>Created at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="brand-list" name="brand-list">
      @foreach ($brands as $brand)
      <tr id="brand{{$brand->id}}">
        <td id="id">{{$brand->id}}</td>
        <td>{{$brand->name}}</td>
        <td>{{$brand->info}}</td>
        <td>{{$brand->created_at}}</td>
        <td>
          <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$brand->id}}">Edit</button>
          <button class="btn btn-danger btn-xs btn-delete delete-brand" value="{{$brand->id}}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table> <!-- End of Table-to-load-the-data Part -->

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
          <form id="formBrands" name="formBrands" class="form-horizontal" novalidate="">
            {{ csrf_field() }}
            <div class="form-group error">
              <label for="inputBrand" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Brand name" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Info</label>
              <div class="col-sm-9">
                <!--<input type="text" class="form-control" id="info" name="info" placeholder="Info" value="">-->
                <textarea name="info" id="info" type="text" rows="2" cols="80"></textarea>
              </div>
            </div>
          </form>
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
  <script src="{{asset('/js/brand/ajax-crud.js')}}"></script>
  <!--<script src="{{asset('/fonts/Pe-icon-7-stroke.woff')}}"></script>-->

@endsection
