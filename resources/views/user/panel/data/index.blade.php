@extends('user.layouts.panel')
@section('right-panel')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="col-md-6 col-xs-12 mx-auto"> <!--block -->
                        <div class="profile-accordeon" role="tab" id="headingOne"> <!-- heading block -->
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="text-center">My personal data</h4>
                          </a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> <!--content block -->
                            <div class="panel-body">
                                @include('user.layouts.forms.data-personal-form')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12 mx-auto mt-4">
                        <div class="profile-accordeon" role="tab" id="headingTwo">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="text-center">My address</h4>
                          </a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body mt-4 text-center">
                                @if(Auth::user()->address==null)
                                    <a href="{{route("address")}}">Click here to add your address</a>
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
