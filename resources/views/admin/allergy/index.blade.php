@extends('admin.layouts.app')
@section('title','Allergies')
@section('right-panel')

  <h2 class="text-left mt-4">Allergies</h2>

  <div class="error" role="alert"></div>

  <div class="row mt-4">
    <div class="col-md-6 col-12 mt-4"><!--<i class="fa fa-search" aria-hidden="true"></i>-->
      <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
    </div>

    <div id="add" class="col-md-6 col-12 mt-4">
      <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Allergies</button>
    </div>
  </div>

  <div class="row mt-2">
  <!-- Table-to-load-the-data Part -->
    <div class="col-12 col-md-11">
      <table class="table mt-4">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th class="media-480-delete">Created at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="allergy-list" name="allergy-list">
        @foreach ($allergies as $allergy)
        <tr id="allergy{{$allergy->id}}">
          <td id="id">{{$allergy->id}}</td>
          <td>{{$allergy->name}}</td>
          <td class="media-480-delete">{{$allergy->created_at}}</td>
          <td>
            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$allergy->id}}">Edit</button>
            <button class="btn btn-danger btn-xs btn-delete delete-allergy" value="{{$allergy->id}}">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div><!-- End of Table-to-load-the-data Part -->

  <!-- Modal (Pop up when detail button clicked) -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Allergies Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <form id="formAllergies" name="formAllergies" class="form-horizontal" novalidate="">
            {{ csrf_field() }}
            <div class="form-group error">
              <label for="name" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Allergy name" value="">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="allergy_id" name="allergy_id" value="0">
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
  <script src="{{asset('/js/admin/allergy/ajax-crud.js')}}"></script>


@endsection
