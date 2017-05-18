@extends('admin.layouts.app')
@section('title','Clients')
@section('right-panel')

    <h2>Clients</h2>

    <div class="error" role="alert"></div>

    <div class="d-flex justify-content-end mt-5">



      {{-- @if(Auth::user()->can_create)
        <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Client</button></div>
        @endif
--}}
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
                <th>Plan</th>
                @if(Auth::user()->can_create)
                <th>Actions</th>
                @endif
            </tr>
            </thead>
            <tbody id="client-list" name="client-list">
            @foreach ($clients as $client)
                <tr id="client{{$client->id}}">
                    <td id="id">{{$client->id}}</td>
                    @if($client->dni==null)
                        <td></td>
                    @else
                        <td>{{$client->dni}}</td>
                    @endif
                    <td>{{$client->name}}</td>
                    <td>{{$client->first_surname}}</td>
                    <td>{{$client->email}}</td>
                    @if($client->phone_number==null)
                        <td></td>
                    @else
                        <td>{{$client->phone_number}}</td>
                    @endif

                    @if($client->plan==null)
                        <td>Without plan</td>
                    @else
                        <td>Plan : {{$client->plan->name}}</td>
                    @endif
                    @if(Auth::user()->can_create)
                    <td>
                        <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$client->id}}">Edit</button>
                        <button class="btn btn-danger btn-xs btn-delete delete-client" value="{{$client->id}}">Delete</button>
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
                        <h4 class="modal-title" id="myModalLabel">Client Editor</h4>
                    </div>

                    <div id="ajaxerror"></div>

                    <div class="modal-body">
                        <form id="formClients" name="formClients" class="form-horizontal" novalidate="">

                            {{ csrf_field() }}
                            <div class="form-group error">
                                <label for="dni" class="col-sm-9 control-label">DNI</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="dni" name="dni" value="" onblur="validateDNI(this)" />
                                </div>
                            </div>

                            <div class="form-group error">
                                <label for="name" class="col-sm-9 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="name" name="name" value="" required onblur="validateName(this)" />
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="first_surname" class="col-sm-9 control-label">First Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="first_surname" name="first_surname" value="" required onblur="validateName(this)" />
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="second_surname" class="col-sm-9 control-label">Second Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="second_surname" name="second_surname" value="" onblur="validateName(this)" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-9 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value="" required onblur="validateEmail(this)" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="col-md-9 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="col-sm-9 control-label">Phone number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="" onblur="validatePhone(this)" />
                                </div>
                            </div>

                            <div class="form-check">
                                <label for="plan" class="form-check-label col-sm-9">Plan</label>
                                <div class="col-sm-4">
                                    <select class="form-check-input form-control ml-1" type="checkbox" value="1" id="plan" name="plan" required></select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <input type="hidden" id="client_id" name="client_id" value="0">
                    </div>

                </div><!-- / modal-content -->

            </div>
        </div><!-- / modal -->
    </div>


@endsection

@section('scripts')
    <script src="{{asset('/js/admin/client/ajax-crud.js')}}"></script>

@endsection
