@extends('user.layouts.panel')
@section('title','My data')
@section('right-panel')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="w-75 w-sm-85 mx-auto"> <!--block -->
                        <div class="w-80 w-sm-100 mt-sm-500 profile-accordion mx-auto" role="tab" id="headingOne"> <!-- heading block -->
                            <h4 class="text-center">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   @lang("user/data/data.myPersonalData")
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse show in w-80 w-sm-100 mx-auto" role="tabpanel" aria-labelledby="headingOne"> <!--content block -->
                            <div class="panel-body pt-3">
                                @include('user.layouts.forms.data-personal-form')
                                <h2>Change password</h2><!--<-PONERLO EN LANG-->
                                @include('user.layouts.forms.reset-password-form')
                            </div>
                        </div>
                    </div>

                    <div class="w-75 w-sm-85 mx-auto mt-4">
                        <div class="w-80 w-sm-100 mx-auto profile-accordion" role="tab" id="headingTwo">
                            <h4 class="text-center">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    @lang("user/data/data.myAddress")
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse w-80 mx-auto" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body text-center pt-2">
                                @if(Auth::user()->address==null)
                                    <a href="{{route("address")}}"><i class="fa fa-plus" aria-hidden="true"></i>
                                        @lang("user/data/data.addAddress")</a>
                                @else
                                    <a href="{{route("address")}}"> @lang("user/data/data.updateAddress")</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-scripts-for-user-panel')
    <script src="/js/user/data/data.js"></script><!-- Includes ajax to save the unliked ingredients -->
@endsection