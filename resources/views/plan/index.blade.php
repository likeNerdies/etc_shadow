@extends('layouts.app')

@section('title')
  Plans
@endsection

@section('content')
  @include('layouts.navbar')

  <div class="container justify-content-center mt-100p mt-sm-80p">
    <h4 id="plans-explanation" class="text-center">@lang("user/plan/plan.planExplanation")</h4>
    <p id="plans-explanation-p" class="text-center small hidden-md-down">@lang("user/plan/plan.planExplanation2")</p>

    @if (Auth::user()->plan_id == null)
        <!-- Charming -->
        <div class="row section charming-bg-color plan-section p-5">
          <div class="col-md-9">
            <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
            <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
            <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
            <p class="">@lang("user/plan/plan.charmingProductsList")</p>
            <small class="price">{{$plans[0]->price}}€</small>
          </div>
          <div class="col-md-3 text-center">
            <a href="/user/panel/plan/subscribe/1" class="mt-3 btn btn-primary page-scroll sans-serif btn-seeProducts cursor-pointer sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnSubscribe")</a>
            <!--<a href="/user/panel/plan/subscribe/1"><button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnSubscribe")</button></a>-->
          </div>
        </div>

        <!-- Pro -->
        <div class="row section pro-bg-color plan-section p-5">
          <div class="col-md-9">
            <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
            <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
            <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
            <p class="">@lang("user/plan/plan.proProductsList")</p>
            <small class="price">{{$plans[1]->price}}€</small>
          </div>
          <div class="col-md-3 text-center">
            <a href="/user/panel/plan/subscribe/2" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sans-serif cursor-pointer sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
            <!--<a href="/user/panel/plan/subscribe/2"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
          </div>
        </div>

        <!-- Premium -->
        <div class="row section premium-bg-color plan-section p-5">
          <div class="col-md-9">
            <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
            <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
            <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
            <p class="">@lang("user/plan/plan.premiumProductsList")</p>
            <small class="price">{{$plans[2]->price}}€</small>
          </div>
          <div class="col-md-3 text-center">
            <a href="/user/panel/plan/subscribe/3" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sans-serif sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
            <!--<a href="/user/panel/plan/subscribe/3"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
          </div>
        </div>

        <p id="plans-explanation-p" class="text-center small hidden-md-up">@lang("user/plan/plan.planExplanation2")</p>

    @else

        @if (Auth::user()->plan->name == "charming")
            <!-- Pro -->
            <div class="row section pro-bg-color p-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
                <p class="">@lang("user/plan/plan.proProductsList")</p>
                <small class="price">{{$plans[1]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <!--<a href="/user/panel/plan/subscribe/2"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
                <a href="/user/panel/plan/subscribe/2" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sans-serif cursor-pointer sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
              </div>
            </div>
            <!-- Premium -->
            <div class="row section premium-bg-color p-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
                <p class="">@lang("user/plan/plan.premiumProductsList")</p>
                <small class="price">{{$plans[2]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <!--<a href="/user/panel/plan/subscribe/3"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
                <a href="/user/panel/plan/subscribe/3" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sans-serif sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
              </div>
            </div>
          @elseif (Auth::user()->plan->name == "pro")
              <!-- Charming -->
              <div class="row section charming-bg-color p-5">
                <div class="col-md-9">
                  <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
                  <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
                  <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
                  <p class="">@lang("user/plan/plan.charmingProductsList")</p>
                  <small class="price">{{$plans[0]->price}}€</small>
                </div>
                <div class="col-md-3 text-center">
                  <!--<a href="/user/panel/plan/subscribe/1"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
                  <a href="/user/panel/plan/subscribe/1" class="mx-auto mt-3 btn btn-primary page-scroll sans-serif btn-seeProducts sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
                </div>
              </div>
              <!-- Premium -->
              <div class="row section premium-bg-color p-5">
                <div class="col-md-9">
                  <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
                  <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
                  <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
                  <p class="">@lang("user/plan/plan.premiumProductsList")</p>
                  <small class="price">{{$plans[2]->price}}€</small>
                </div>
                <div class="col-md-3 text-center">
                  <!--<a href="/user/panel/plan/subscribe/3"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
                  <a href="/user/panel/plan/subscribe/3" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
                </div>
              </div>
            @else
                <!-- Charming -->
                <div class="row section charming-bg-color p-5">
                  <div class="col-md-9">
                    <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
                    <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
                    <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
                    <p class="">@lang("user/plan/plan.charmingProductsList")</p>
                    <small class="price">{{$plans[0]->price}}€</small>
                  </div>
                  <div class="col-md-3 text-center">
                    <!--<a href="/user/panel/plan/subscribe/1"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
                    <a href="/user/panel/plan/subscribe/1" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
                  </div>
                </div>
                <!-- Pro -->
                <div class="row section pro-bg-color p-5">
                  <div class="col-md-9">
                    <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
                    <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
                    <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
                    <p class="">@lang("user/plan/plan.proProductsList")</p>
                    <small class="price">{{$plans[1]->price}}€</small>
                  </div>
                  <div class="col-md-3 text-center">
                    <!--<a href="/user/panel/plan/subscribe/3"><button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button">@lang("user/plan/plan.btnChangePlan")</button></a>-->
                    <a href="/user/panel/plan/subscribe/3" class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" role="button">@lang("user/plan/plan.btnChangePlan")</a>
                  </div>
                </div>
            @endif
    @endif
    </div>
@endsection
@section('scriptsPersonalizados')
  <script src="{{asset('/js/welcome/welcome_script.js')}}"></script><!-- Includes navbar animations --->
@endSection
