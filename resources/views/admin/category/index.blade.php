@extends('admin.index')

@section('panel-right')

<h2 class="text-center">Categories</h2>

<div class="error" role="alert"></div>

<button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Category</button>

<div class="">
  <!-- Table-to-load-the-data Part -->
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Info</th>
        <th>Date Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="category-list" name="category-list">
      @foreach ($categories as $category)
      <tr id="category{{$category->id}}">
        <td id="id">{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->info}}</td>
        <td>{{$category->created_at}}</td>
        <td>
          <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$category->id}}">Edit</button>
          <button class="btn btn-danger btn-xs btn-delete delete-category" value="{{$category->id}}">Delete</button>
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
          <h4 class="modal-title" id="myModalLabel">Category Editor</h4>
        </div>
        <div class="modal-body">
          <form id="formCategories" name="formCategories" class="form-horizontal" novalidate="">
            {{ csrf_field() }}
            <div class="form-group error">
              <label for="inputCategory" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Category name" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Info</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="info" name="info" placeholder="Info" value="">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="category_id" name="category_id" value="0">
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('/js/category/ajax-crud.js')}}"></script>

@endsection
