@extends('admin.layouts.app')
@section('title','Plans')
@section('right-panel')

<h2>Plans</h2>

<div class="error" role="alert"></div>

<div class="d-flex justify-content-end mt-5">
  <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Plan</button></div>
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
        <th>Price</th>
        <th>Info</th>
      </tr>
    </thead>
    <tbody id="plan-list" name="plan-list">
      @foreach ($plans as $plan)
      <tr id="plan{{$plan->id}}">
        <td id="id">{{$plan->id}}</td>
        <td>{{$plan->name}}</td>
        <td>{{$plan->price}}</td>
        <td>{{$plan->info}}</td>
        <td>
          <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$plan->id}}">Edit</button>
          <button class="btn btn-danger btn-xs btn-delete delete-plan" value="{{$plan->id}}">Delete</button>
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
          <h4 class="modal-title" id="myModalLabel">Plan Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <form id="formPlans" name="formPlans" class="form-horizontal" novalidate="">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Plan name" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="price" class="col-sm-3 control-label">Price</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="info" class="col-sm-3 control-label">Info</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="info" rows="5"></textarea>
              </div>
            </div>



          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="price_id" name="price_id" value="0">
        </div>

      </div><!-- / modal-content -->

    </div>
  </div><!-- / modal -->
</div>


@endsection

@section('scripts')
  <script src="{{asset('/js/admin/plan/ajax-crud.js')}}"></script>
  <!--<script src="{{asset('/fonts/Pe-icon-7-stroke.woff')}}"></script>-->

@endsection
