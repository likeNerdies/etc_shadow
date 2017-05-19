
@extends('admin.layouts.app')

@section('title','Transporters')

@section('right-panel')

  <div class="wrapper-content">

    <h2 class="text-left mt-4">Transporters</h2>

    <div class="error" role="alert"></div>

    <div class="row mt-4">
      <div class="col-md-6 col-12 mt-4">
      <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
      </div>

      <div id="add" class="col-md-6 col-12 mt-4">
      <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Transporter</button>
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
              <th class="media-480-delete">CIF</th>
              <th>Phone Number</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="transporter-list" name="transporter-list">
            @foreach ($transporters as $transporter)
              <tr id="transporter{{$transporter->id}}">
                <td id="id">{{$transporter->id}}</td>
                <td>{{$transporter->name}}</td>
                <td class="media-480-delete">{{$transporter->cif}}</td>
                <td>{{$transporter->phone_number}}</td>
                <td>
                  <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$transporter->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>
                  <button class="btn btn-danger btn-xs btn-delete delete-transporter" value="{{$transporter->id}}"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div><!-- End of Table-to-load-the-data Part -->
  </div>
  <!-- Modal (Pop up when detail button clicked) -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Transporter Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <form id="formTransporters" name="formTransporters" class="form-horizontal" novalidate="">

            {{ csrf_field() }}

            <div class="form-group error">
              <label for="inputTransporter" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Laura" value="" onblur="validateName(this)">
              </div>
            </div>

            <div class="form-group">
              <label for="cif" class="col-sm-3 control-label">CIF</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="cif" name="cif" placeholder="A12345678" value="" onblur="validateCIF(this)">
              </div>
            </div>

            <div class="form-group">
              <label for="phone_number" class="col-sm-5 control-label">Phone number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="123456789" value="" onblur=validatePhone(this)>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="transporter_id" name="transporter_id" value="0">
        </div>

      </div><!-- / modal-content -->

    </div>
  </div><!-- / modal -->
</div>


@endsection

@section('scripts')

<script src="{{asset('/js/admin/transporter/ajax-crud.js')}}"></script>

@endsection
