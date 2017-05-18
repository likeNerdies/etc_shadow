@extends('admin.layouts.app')
@section('title','categories')
@section('right-panel')

  <div class="wrapper-content">

          <h2 class="text-left mt-4">Categories</h2>

          <div class="error" role="alert"></div>



          <div class="row mt-4">
            <div class="col-md-6 col-12 mt-4">
              <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
            </div>

            <div id="add" class="col-md-6 col-12 mt-4">
              <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Category</button>
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
          <th class="media-480-delete">Created at</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody id="category-list" name="category-list">
        @foreach ($categories as $category)
          <tr id="category{{$category->id}}">
            <td id="id">{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->info}}</td>
            <td class="media-480-delete">{{$category->created_at}}</td>
            <td>
              <button class="btn btn-warning btn-xs btn-detail open-modal hidden-sm-down" value="{{$category->id}}">Edit</button>
              <button class="btn btn-warning hidden-md-up open-modal" value="{{$category->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></button>

              <button class="btn btn-danger btn-xs btn-delete delete-category hidden-sm-down" value="{{$category->id}}">Delete</button>
              <button class="btn btn-danger hidden-md-up delete-category" value="{{$category->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table> <!-- End of Table-to-load-the-data Part -->
    </div>

  </div>
</div>




  <!-- Modal (Pop up when detail button clicked) -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Category Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <form id="formCategories" name="formCategories" class="form-horizontal" novalidate="">
            {{ csrf_field() }}
            <div class="form-group error">
              <label for="name" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Dairy" value="" onblur="validateName(this)">
              </div>
            </div>

            <div class="form-group">
              <label for="info" class="col-sm-3 control-label">Info</label>
              <div class="col-sm-9">
                <textarea  class="form-control" name="info" rows="5" cols="38" placeholder="" onblur="validateName(this)"></textarea>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="category_id" name="category_id" value="0">
        </div>

      </div><!-- / modal-content -->

    </div>
  </div><!-- / modal -->
</div>


@endsection

@section('scripts')
  <script src="{{asset('/js/admin/category/ajax-crud.js')}}"></script>
@endsection
