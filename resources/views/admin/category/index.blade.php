@extends('admin.index')

@section('panel-right')

<div class="container-narrow">

  <h2 class="text-center">categories</h2>

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
        <tr id="category{{category->id}}">
          <td>{{category->id}}</td>
          <td>{{category->name}}</td>
          <td>{{category->info}}</td>
          <td>{{category->created_at}}</td>
          <td>
            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$category->id}}">Edit</button>
            <button class="btn btn-danger btn-xs btn-delete delete-category" value="{{$category->id}}">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
