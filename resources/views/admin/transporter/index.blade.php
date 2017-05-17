@extends('admin.layouts.app')
@section('title','Transporters')
@section('right-panel')

<h2>Transporters</h2>

<div class="error" role="alert"></div>

<div class="d-flex justify-content-end mt-5">
  <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Category</button></div>
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
        <th>CIF</th>
        <th>Phone Number</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="transporter-list" name="transporter-list">
      @foreach ($transporters as $transporter)
      <tr id="transporter{{$transporter->id}}">
        <td id="id">{{$transporter->id}}</td>
        <td>{{$transporter->name}}</td>
        <td>{{$transporter->cif}}</td>
        <td>{{$transporter->phone_number}}</td>
        <td>
          <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$transporter->id}}">Edit</button>
          <button class="btn btn-danger btn-xs btn-delete delete-transporter" value="{{$transporter->id}}">Delete</button>
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
          <h4 class="modal-title" id="myModalLabel">Transporter Editor</h4>
        </div>

        <div id="ajaxerror"></div>

        <div class="modal-body">
          <form id="formTransporters" name="formTransporters" class="form-horizontal" novalidate="">

            {{ csrf_field() }}

            <div class="form-group error">
              <label for="inputTransporter" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Laura" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="cif" class="col-sm-3 control-label">CIF</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="cif" name="cif" placeholder="A12345678" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="phone_number" class="col-sm-5 control-label">Phone number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="123456789" value="">
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
  <script src="{{asset('/js/transporter/ajax-crud.js')}}"></script>
  <!--<script src="{{asset('/fonts/Pe-icon-7-stroke.woff')}}"></script>-->

@endsection
