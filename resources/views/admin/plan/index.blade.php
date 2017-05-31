@extends('admin.layouts.app')
@section('title','Plans')
@section('right-panel')
  <div class="wrapper-content">

    <h2 class="text-left mt-4">Plans</h2>

    <div class="error" role="alert"></div>


    <div class="row mt-4">
      <div class="col-md-6 col-12 mt-4">
        <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
      </div>

      <div id="add" class="col-md-6 col-12 mt-4">
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Plan</button>
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
              <th>Price</th>
              <th class="media-767-delete">Info</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="plan-list" name="plan-list">
            @foreach ($plans as $plan)
              <tr id="plan{{$plan->id}}">
                <td id="id">{{$plan->id}}</td>
                <td>{{$plan->name}}</td>
                <td>{{$plan->price}}</td>
                <td class="media-767-delete">{{$plan->info}}</td>
                <td>
                  <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$plan->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up"></i></button>
                  <button class="btn btn-danger btn-xs btn-delete delete-plan" value="{{$plan->id}}"><span class="hidden-sm-down">Delete</span> <i class="fa fa-trash hidden-md-up"></i></button>
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
          <h4 class="modal-title" id="myModalLabel">Plan Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <form id="formPlans" name="formPlans" class="form-horizontal" novalidate="">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder=" plan name"required />
              </div>
            </div>

            <div class="form-group">
              <label for="price" class="col-sm-3 control-label">Price</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="price" name="price" placeholder="example: 9.95" required />
              </div>
            </div>

            <div class="form-group">
              <label for="info" class="col-sm-3 control-label">Info</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="info" rows="5" placeholder="Plan information" required></textarea>
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
@endsection
