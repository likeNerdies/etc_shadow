@extends('user.layouts.panel')
@section('title','My data')
@section('right-panel')
<div class="container justify-content-center">
  <form class="" action="user/panel/plan/subscribe" method="post">
      @if (Auth::user()->plan_id == null) <!-- If user is not subscribed to any plan -->
        <h1 class="text-center red-font">@lang("user/plan/plan.noPlan")</h1>
        <h4 class="text-center mt-3">@lang("user/plan/plan.wannaSubscribe")</h4>

        <!-- Charming -->
        <div class="row section charming-bg-color p-5 mr-md-5">
          <div class="col-md-9">
            <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
            <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
            <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
            <p class="">@lang("user/plan/plan.charmingProductsList")</p>
            <small class="price">{{$plans[0]->price}}€</small>
          </div>
          <div class="col-md-3 text-center">
            <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnSubscribe")</a></button>
          </div>
        </div>

        <!-- Pro -->
        <div class="row section pro-bg-color p-5 mr-md-5">
          <div class="col-md-9">
            <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
            <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
            <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
            <p class="">@lang("user/plan/plan.proProductsList")</p>
            <small class="price">{{$plans[1]->price}}€</small>
          </div>
          <div class="col-md-3 text-center">
            <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="">@lang("user/plan/plan.btnSubscribe")</a></button>
          </div>
        </div>

        <!-- Premium -->
        <div class="row section premium-bg-color p-5 mr-md-5">
          <div class="col-md-9">
            <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
            <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
            <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
            <p class="">@lang("user/plan/plan.premiumProductsList")</p>
            <small class="price">{{$plans[2]->price}}€</small>
          </div>
          <div class="col-md-3 text-center">
            <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnSubscribe")</a></button>
          </div>
        </div>

        <div class="row section p-5 mr-md-5">
          <div class="col-md-9 text-center">
            <h3 class="">@lang("user/plan/plan.notEnough")</h3>
            <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnMoreInfo")</a></button>
          </div>
          <div class="col-md-3 text-center">
          </div>
        </div>

      @else <!-- If user is subscribed to a plan, show the two left plans to change subscription -->
        <h1 class="text-center red-font">@lang("user/plan/plan.hasPlan"){{ Auth::user()->plan->name}}!</h1>
        <h4 class="text-center mt-3">@lang("user/plan/plan.wannaChange")</h4>

        @if (Auth::user()->plan->name == "charming")
            <!-- Pro -->
            <div class="row section pro-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
                <p class="">@lang("user/plan/plan.proProductsList")</p>
                <small class="price">{{$plans[1]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="">@lang("user/plan/plan.btnChangePlan")</a></button>
              </div>
            </div>
            <!-- Premium -->
            <div class="row section premium-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
                <p class="">@lang("user/plan/plan.premiumProductsList")</p>
                <small class="price">{{$plans[2]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnChangePlan")</a></button>
              </div>
            </div>
          @elseif (Auth::user()->plan->name == "pro")
            <!-- Charming -->
            <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
                <p class="">@lang("user/plan/plan.charmingProductsList")</p>
                <small class="price">{{$plans[0]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnChangePlan")</a></button>
              </div>
            </div>
            <!-- Premium -->
            <div class="row section premium-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
                <p class="">@lang("user/plan/plan.premiumProductsList")</p>
                <small class="price">{{$plans[2]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnChangePlan")</a></button>
              </div>
            </div>
          @else
            <!-- Charming -->
            <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
                <p class="">@lang("user/plan/plan.charmingProductsList")</p>
                <small class="price">{{$plans[0]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnChangePlan")</a></button>
              </div>
            </div>
            <!-- Pro -->
            <div class="row section pro-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
                <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
                <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
                <p class="">@lang("user/plan/plan.proProductsList")</p>
                <small class="price">{{$plans[1]->price}}€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="">@lang("user/plan/plan.btnChangePlan")</a></button>
              </div>
            </div>
        @endif
      @endif
  </form>
</div>
@endsection

@section('more-scripts-for-user-panel')
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
@endsection