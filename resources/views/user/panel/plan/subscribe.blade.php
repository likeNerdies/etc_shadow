@extends('user.layouts.panel')
@section('title','Subscribe')
@section('right-panel')
    <div style="height: auto;" class="container justify-content-center ml-3rem">
        <div class="row pb-2">
            <div class="col-md-6 col-12 mb-2rem">
                <div class="subscribe-info-outer-wrapper">
                    <div class="subscribe-info-inner-wrapper">
                        <h3 style="padding-top: 10%;"
                            class="text-center">@lang('user/plan/subscribe.startnow') {{$plan->price}}€ !</h3>
                        <p style="padding-top: 7%; padding-bottom: 5%;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            @lang('user/plan/subscribe.personalize_tastes')
                        </p>
                        <p style="padding-bottom: 5%;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span class="text-center"> @lang('user/plan/subscribe.allergy_mark')</span>
                        </p>
                        <p style="padding-bottom: 10%;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            @lang('user/plan/subscribe.enjoy')
                        </p>

                        <hr width="80%">

                        <h6 class="text-center"><strong>Plan {{$plan->name}}</strong></h6>
                        <p class="text-center pb-4"> @lang('user/plan/subscribe.can_cancel')</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12 pb-5">
                <div class="subscribe-pay-outer-wrapper">
                    <div class="subscribe-pay-inner-wrapper mx-auto">
                        @if(!Auth::user()->plan==null)
                            @if(Auth::user()->plan->id==$plan->id)
                                <h2 class="text-center">@lang('user/plan/subscribe.already_subscribed_in')</h2>
                                <div class="row section p-5">
                                    <div class="col-12 text-center">
                                        <h3 class="">@lang("user/plan/plan.wannaChange")</h3>
                                        <a href="/plans"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="button" name="button">@lang("user/plan/plan.btnMoreInfo")</button></a>
                                    </div>
                                    <div class="col-md-3 text-center">
                                    </div>
                                </div>
                                <!-----mira otros planes----->
                            @else

                                <div class="subscribe-icon-wrapper">
                                    <div class="subscribe-icon-card-wrapper payment-cards">
                                        <i style="color:#1a1f71;" class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
                                        <i style="color:#ff5f00;" class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
                                        <i style="color:#37B1E6;" class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>
                                    </div>

                                    <div class="w-45 h-100 payment-cards d-flex justify-content-center align-items-center">
                                        <i style="color: #4b7bae;" class="fa fa-paypal fa-2x" aria-hidden="true"></i>
                                    </div>
                                    <div class="w-10 h-100 d-flex justify-content-around align-items-center">
                                        <span>...</span>
                                    </div>
                                </div>
                                <div>
                                    <form class="form-horizontal" action="" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="plan_id" id="plan_id" value="{{$plan->id}}" />
                                        <div class="w-100 h-100">
                                            <div style="padding-top: 0.80rem;" class="d-flex justify-content-between">
                                                <h6> @lang('user/plan/subscribe.card_number')       </h6>
                                                <i style="color: gold;" class="fa fa-lock fa-2x pt-2 mr-0" aria-hidden="true"></i>
                                            </div>

                                            <div style="padding-top: .5rem;" class="">
                                                <span class="lock"><input type="text" name="bank-account" class="form-control radius-0" placeholder="1111 2222 3333 4444"></span>
                                            </div>

                                            <div style="margin-top: 1.7rem;">
                                                <h6> @lang('user/plan/subscribe.expirate')       </h6>
                                                <div class="d-flex">
                                                    <div class="w-45">
                                                        <span class="caret-down"><input type="text" name="month" class="form-control radius-0" placeholder="@lang('forms.month')"></span>
                                                    </div>
                                                    <div style="margin-left: 3rem" class="w-45">
                                                        <span class="caret-down"><input type="text" name="year" class="form-control radius-0" placeholder="@lang('forms.year')"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div style="margin-top: 1.7rem;">
                                                <h6 >@lang('user/plan/subscribe.sec_code')  </h6>
                                                <div class="w-45">
                                                    <span class="lock-mini"><input type="text" name="sec-code" class="form-control radius-0" placeholder=""></span>
                                                </div>
                                            </div>

                                            <div style="margin-top: 1.7rem">
                                                <p style="text-align: justify">   @lang('user/plan/subscribe.conditions')            </p>
                                            </div>
                                                <div style="margin-top: 1.7rem; padding-bottom: 1.7rem;" class="d-flex justify-content-center">
                                                    <input  id="subscribe_btn" type="button" class="btn btn-mb-subscribe" value="@lang('user/plan/subscribe.change')">
                                                </div>

                                        </div>
                                    </form>
                                </div>
                            @endif
                        @else

<!------------------SI NO TIENE AUN NINGUN PLAN--------MONTAR ADDRESS BOTTON SOBRE ESTE DIV------------>
        <div class="subscribe-icon-wrapper">
            <div class="subscribe-icon-card-wrapper payment-cards">
                <i style="color:#1a1f71;" class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
                <i style="color:#ff5f00;" class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
                <i style="color:#37B1E6;" class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>
            </div>

            <div class="w-45 h-100 payment-cards d-flex justify-content-center align-items-center">
                <i style="color: #4b7bae;" class="fa fa-paypal fa-2x" aria-hidden="true"></i>
            </div>
            <div class="w-10 h-100 d-flex justify-content-around align-items-center">
                <span>...</span>
            </div>
        </div>
        <div>
            <form class="form-horizontal" action="" method="post">
                {{csrf_field()}}
                <input type="hidden" name="plan_id" id="plan_id" value="{{$plan->id}}" />
                <div class="w-100 h-100">
                    <div style="padding-top: 0.80rem;" class="d-flex justify-content-between">
                        <h6> @lang('user/plan/subscribe.card_number')       </h6>
                        <i style="color: gold;" class="fa fa-lock fa-2x pt-2 mr-0" aria-hidden="true"></i>
                    </div>

                    <div style="padding-top: .5rem;" class="">
                        <span class="lock"><input type="text" name="bank-account" class="form-control radius-0" placeholder="1111 2222 3333 4444"></span>
                    </div>

                    <div style="margin-top: 1.7rem;">
                        <h6> @lang('user/plan/subscribe.expirate')       </h6>
                        <div class="d-flex">
                            <div class="w-45">
                                <span class="caret-down"><input type="text" name="month" class="form-control radius-0" placeholder="@lang('forms.month')"></span>
                            </div>
                            <div style="margin-left: 3rem" class="w-45">
                                <span class="caret-down"><input type="text" name="year" class="form-control radius-0" placeholder="@lang('forms.year')"></span>
                            </div>
                        </div>
                    </div>


                    <div style="margin-top: 1.7rem;">
                        <h6 >@lang('user/plan/subscribe.sec_code')  </h6>
                        <div class="w-45">
                            <span class="lock-mini"><input type="text" name="sec-code" class="form-control radius-0" placeholder=""></span>
                        </div>
                    </div>

                    <div style="margin-top: 1.7rem">
                        <p style="text-align: justify">   @lang('user/plan/subscribe.conditions')            </p>
                    </div>

                        <div style="margin-top: 1.7rem; padding-bottom: 1.7rem;" class="d-flex justify-content-center">
                            <input id="subscribe_btn"  type="button" class="btn btn-mb-subscribe" value="@lang('user/plan/subscribe.start')">
                        </div>

                    </div>
                    </form>
                </div>
                <div></div>
                @endif
                            <!---->
            </div>
            @if(Auth::user()->address==null)
                <div class="blurred-address">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <a class="btn btn-info" href="/user/panel/my-data/address">@lang('user/data/data.addAddress')</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('more-scripts-for-user-panel')
    <script src="{{asset('/js/user/plan/subscribe.js')}}"></script><!-- Includes navbar animations -->
@endsection


{{--@section('more-scripts-for-user-panel')
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
@endsection--}}
