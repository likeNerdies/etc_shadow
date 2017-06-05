@extends('admin.layouts.app')
@section('title','Admins')
@section('right-panel')

        <div class="wrapper-content">

            <h2 class="text-left mt-4">Admin</h2>

            <div class="error" role="alert"></div>

            <div class="row mt-4">

                <div class="col-md-6 col-12 mt-4"><!--<i class="fa fa-search" aria-hidden="true"></i>-->
                    <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
                </div>

                @if(Auth::user()->can_create)
                    <div id="add" class="col-md-6 col-12 mt-4">
                        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Admin</button>
                    </div>
                @endif

            </div>
            <div class="row mt-2">
                <!-- Table-to-load-the-data Part -->
                <div class="col-12">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="media-767-delete">DNI</th>
                                <th>Name</th>
                                <th class="media-767-delete">Surname</th>
                                <th>Email</th>
                                <th class="media-767-delete">Phone Number</th>
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
                                        <td class="media-767-delete"></td>
                                    @else
                                        <td class="media-767-delete">{{$admin->dni}}</td>
                                    @endif
                                        <td>{{$admin->name}}</td>
                                        <td class="media-767-delete">{{$admin->first_surname}}</td>
                                        <td>{{$admin->email}}</td>
                                    @if($admin->phone_number==null)
                                        <td class="media-767-delete"></td>
                                    @else
                                        <td class="media-767-delete">{{$admin->phone_number}}</td>
                                    @endif
                                    @if(Auth::user()->can_create)
                                        <td>
                                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$admin->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger btn-xs btn-delete delete-admin" value="{{$admin->id}}"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></button>
                                        </td>
                                    @endif
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
                        <h4 class="modal-title" id="myModalLabel">Admin Editor</h4>
                    </div>

                    <div id="ajaxerror"></div>

                    <div class="modal-body">
                        <div class="display-center">
                            <form id="formAdmins" name="formAdmins" class="form-horizontal" novalidate="">

                                {{ csrf_field() }}
                                <div class="d-flex flex-md-row display-767-column error">
                                    <div class="group-input">
                                        <label for="dni" class="col-form-label">DNI</label>
                                        <input type="text" class="form-control has-error" id="dni" name="dni" placeholder=" dni" value="">
                                    </div>
                                </div>

                                <div class="fd-flex flex-md-row display-767-column error mt-2">
                                    <div class="group-input">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder=" admin name"  required>
                                    </div>
                                </div>
                                <div class="d-flex flex-md-row display-767-column error mt-2">
                                    <div class="group-input">
                                        <label for="first_surname" class="col-form-label">First Surname</label>
                                        <input type="text" class="form-control has-error" id="first_surname" name="first_surname" placeholder=" first surname"  required>
                                    </div>
                                </div>
                                <div class="d-flex flex-md-row display-767-column error mt-2">
                                    <div class="group-input">
                                        <label for="second_surname" class="col-form-label">Second Surname</label>
                                        <input type="text" class="form-control has-error" id="second_surname" name="second_surname" placeholder=" second surname">
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder=" example@example.com"  requireds>
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="password" class="col-form-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="set new password" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="new password confirm" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="phone_number" class="col-form-label">Phone number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder=" phone number" value="">
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <label class="form-check-label" for="can_create">
                                        <input class="form-check-input" type="checkbox" value="1" id="can_create" name="can_create" required>
                                        Super Admin Permission
                                    </label>
                                </div>
                            </form>
                        </div>
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
