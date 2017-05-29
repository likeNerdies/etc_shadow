@extends('user.layouts.panel')
@section('right-panel')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="w-75 w-sm-85 mx-auto"> <!--block -->
                        <div class="w-80 w-sm-100 mt-sm-500 profile-accordion mx-auto" role="tab" id="headingOne"> <!-- heading block -->
                            <h4 class="text-center">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    My personal data
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse show in w-80 w-sm-100 mx-auto" role="tabpanel" aria-labelledby="headingOne"> <!--content block -->
                            <div class="panel-body pt-3">
                                @include('user.layouts.forms.data-personal-form')
                            </div>
                        </div>
                    </div>

                    <div class="w-75 w-sm-85 mx-auto mt-4">
                        <div class="w-80 w-sm-100 mx-auto profile-accordion" role="tab" id="headingTwo">
                            <h4 class="text-center">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    My address
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse w-80 mx-auto" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body text-center pt-2">
                                @if(Auth::user()->address==null)
                                    <a href="{{route("address")}}"><i class="fa fa-plus" aria-hidden="true"></i>
                                        Click here to add your address
                                    </a>
                                @else
                                    <a href="{{route("address")}}">Click here to update your address</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
