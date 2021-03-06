@extends('admin.layouts.app')
@section('title','Clients')
@section('right-panel')

        <div class="wrapper-content">

            <h2 class="text-left mt-4">Clients</h2>

            <div class="error" role="alert"></div>



            <div class="row mt-4">
                <div class="col-md-6 col-12 mt-4">
                    <input type="text" id="search" class="form-control" placeholder="Search by DNI or name">
                </div>
            </div>

            <div class="row mt-2">
                <!-- Table-to-load-the-data Part -->
                <div class="col-12">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Name</th>
                                <th class="media-767-delete">Surname</th>
                                <th class="media-480-delete">Email</th>
                                <th class="media-767-delete">Phone Number</th>
                                <th class="media-767-delete">Plan</th>
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
                                    <td class="media-767-delete">{{$client->first_surname}}</td>
                                    <td class="media-480-delete">{{$client->email}}</td>
                                    @if($client->phone_number==null)
                                        <td class="media-767-delete"></td>
                                    @else
                                        <td class="media-767-delete">{{$client->phone_number}}</td>
                                    @endif

                                    @if($client->plan==null)
                                        <td class="media-767-delete">Without plan</td>
                                    @else
                                        <td class="media-767-delete">Plan : {{$client->plan->name}}</td>
                                    @endif
                                    @if(Auth::user()->can_create)
                                        <td>
                                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$client->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up"></i></button>
                                            <button class="btn btn-danger btn-xs btn-delete delete-client" value="{{$client->id}}"><span class="hidden-sm-down">Delete</span><i class="fa fa-pencil hidden-md-up"></i></button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table> <!-- End of Table-to-load-the-data Part -->
                </div>
            </div>
        </div>

        <nav id="pagquit_search" class="mt-5">
            {{$clients->links()}}
        </nav>

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
                        <div class="display-center">
                            <form id="formClients" name="formClients" class="form-horizontal" novalidate="">

                                {{ csrf_field() }}
                                <div class="d-flex flex-md-row display-767-column error">
                                    <div class="group-input">
                                        <label for="dni" class="col-form-label">DNI/NIE</label>
                                        <input type="text" class="form-control has-error" id="dni" name="dni" placeholder=" dni/nie" />
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column error mt-2">
                                    <div class="group-input">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input type="text" class="form-control has-error" id="name" name="name" required/>
                                    </div>
                                </div>
                                <div class="d-flex flex-md-row display-767-column error mt-2">
                                    <div class="group-input">
                                        <label for="first_surname" class="col-form-label">First Surname</label>
                                        <input type="text" class="form-control has-error" id="first_surname" name="first_surname" value=""  />
                                    </div>
                                </div>
                                <div class="d-flex flex-md-row display-767-column error mt-2">
                                    <div class="group-input">
                                        <label for="second_surname" class="col-form-label">Second Surname</label>
                                        <input type="text" class="form-control has-error" id="second_surname" name="second_surname" />
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"  required  />
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="password" class="col-form-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder=" set new password" />
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  placeholder=" repeat password"/>
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column mt-2">
                                    <div class="group-input">
                                        <label for="phone_number" class="col-form-label">Phone number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"  />
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row display-767-column form-check mt-2 mb-2">
                                    <div class="group-input">
                                        <label for="plan" class="col-form-label">Plan</label>
                                        <select class="form-check-input form-control ml-1" type="checkbox" value="1" id="plan" name="plan" required>
                                            <option value=''>No plan</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal-footer mt-3">
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
