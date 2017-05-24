@extends('user.layouts.panel')
@section('right-panel')
<div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="w-75 mx-auto"> <!--block -->
                    <div class="w-100" style="background-color: #1DC7B4;height: 60px; border-radius: 4px;" role="tab" id="headingOne"> <!-- heading block -->
                        <h4 class="text-center" style="padding: 14px 0px;">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               My personal data's
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> <!--content block -->
                        <div class="panel-body">
                            @include('user.layouts.forms.data-personal-form')
                        </div>
                    </div>
                </div>

                <div class="w-75 mx-auto mt-4">
                    <div class="w-100" style="background-color: #1DC7B4;height: 60px; border-radius: 4px;" role="tab" id="headingTwo">
                        <h4 class="text-center" style="padding: 14px 0px;">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                My address
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          @if(Auth::user()->address==null)
                                <a href="{{route("address")}}">Add your address</a>
                              @else
                                <a href="{{route("address")}}">Update your address</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="w-75 mx-auto mt-4">
                    <div class="w-100" style="background-color: #1DC7B4;height: 60px; border-radius: 4px;" role="tab" id="headingThree">
                        <h4 class="text-center" style="padding: 14px 0px;">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                My plan
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            @if(Auth::user()->plan==null)
                                <h2>You have no plan's yet.</h2>  <a href="" class="btn btn-default">Subscribe to any of our plan's by clicking here!</a>
                            @else
                                <h2>You are subscribed to : <strong>{{Auth::user()->plan->name}}</strong></h2>
                                <a href="{{route('plan')}}" class="btn btn-default">See more plans here</a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection