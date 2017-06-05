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
        @if(Auth::user()->can_create==1)
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Plan</button>
          @endif
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
              @if(Auth::user()->can_create==1)
              <th>Actions</th>
                @endif
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
                  @if(Auth::user()->can_create==1)
                  <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$plan->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up"></i></button>
                  <button class="btn btn-danger btn-xs btn-delete delete-plan" value="{{$plan->id}}"><span class="hidden-sm-down">Delete</span> <i class="fa fa-trash hidden-md-up"></i></button>
                  @endif
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
          <div class="display-center">
            <form id="formPlans" name="formPlans" class="form-horizontal" novalidate="">
              {{ csrf_field() }}
              <div class="d-flex flex-md-row display-767-column error">
                <div class="group-input">
                  <label for="name" class="col-form-label">Name</label>
                  <input type="text" class="form-control col-md-11 col-12 has-error" id="name" name="name" placeholder=" plan name"required />
                </div>
              </div>

              <div class="d-flex flex-md-row display-767-column">
                <div class="group-input">
                  <label for="price" class="col-form-label">Price</label>
                  <input type="text" class="form-control col-md-11 col-12" id="price" name="price" placeholder="example: 9.95" required />
                </div>
              </div>

              <div class="d-flex flex-md-row display-767-column">
                <div class="group-input">
                  <label for="info" class="col-form-label">Info</label>
                  <textarea class="form-control col-md-11 col-12" id="info" rows="5" placeholder="Plan information" required></textarea>
                </div>
              </div>
            </form>
          </div>
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
