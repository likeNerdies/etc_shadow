@extends('admin.layouts.app')
@section('title','Admins')
@section('right-panel')

    <h2>Admins</h2>

    <div class="error" role="alert"></div>

    <div class="d-flex justify-content-end mt-5">



        @if(Auth::user()->can_create)
        <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Admin</button></div>
        @endif

        <div class="col-md-6"><!--<i class="fa fa-search" aria-hidden="true"></i>-->
            <input type="text" id="search" class="form-control" placeholder="Search by ID or name"></div>
    </div>

    <div class="mt-5">
        <!-- Table-to-load-the-data Part -->
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone Number</th>
                @if(Auth::user()->can_create)
                <th>Actions</th>
                @endif
            </tr>
            </thead>
            <tbody id="admin-list" name="admin-list">
            @foreach ($admins as $admin)
                <tr id="admin{{$admin->id}}">
                    <td id="id">{{$admin->id}}</td>
                    @if($admin->dni==null)
                        <td></td>
                    @else
                        <td>{{$admin->dni}}</td>
                    @endif
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->first_surname}}</td>
                    <td>{{$admin->email}}</td>
                    @if($admin->phone_number==null)
                        <td></td>
                    @else
                        <td>{{$admin->phone_number}}</td>
                    @endif
                    @if(Auth::user()->can_create)
                    <td>
                        <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$admin->id}}">Edit</button>
                        <button class="btn btn-danger btn-xs btn-delete delete-admin" value="{{$admin->id}}">Delete</button>
                    </td>
                    @endif
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
                        <h4 class="modal-title" id="myModalLabel">Admin Editor</h4>
                    </div>

                    <div id="ajaxerror"></div>

                    <div class="modal-body">
                        <form id="formAdmins" name="formAdmins" class="form-horizontal" novalidate="">

                            {{ csrf_field() }}
                            <div class="form-group error">
                                <label for="dni" class="col-sm-3 control-label">DNI</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="dni" name="dni" placeholder="dni" value="">
                                </div>
                            </div>

                            <div class="form-group error">
                                <label for="name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Laura" value="" required>
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="first_surname" class="col-sm-3 control-label">First Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="first_surname" name="first_surname" placeholder="Martinez" value="" required>
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="second_surname" class="col-sm-3 control-label">Second Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="second_surname" name="second_surname" placeholder="Gimenez" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="" requireds>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="col-sm-5 control-label">Phone number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="123456789" value="">
                                </div>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label" for="can_create">
                                    <input class="form-check-input" type="checkbox" value="1" id="can_create" name="can_create" required>
                                    Super Admin Permission
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <input type="hidden" id="admin_id" name="admin_id" value="0">
                    </div>

                </div><!-- / modal-content -->

            </div>
        </div><!-- / modal -->
    </div>


@endsection

@section('scripts')
    <script src="{{asset('/js/admin/ajax-crud.js')}}"></script>

@endsection
