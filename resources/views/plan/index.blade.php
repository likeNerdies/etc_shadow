@extends('layouts.app')

@section('title')
  Plans
@endsection

@section('content')
  @include('layouts.navbar')
  <div class="container-fluid pr-0 pl-0 mt-10">
    <div class="plans-background-image"></div><!-- Potser un carousel -->
  </div>
  <div class="container justify-content-center">

      <!-- Charming -->
      <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
        <div class="col-md-9">
          <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
          <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
          <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
          <p class="">@lang("user/plan/plan.charmingProductsList")</p>
          <small class="price">9.95€</small>
        </div>
        <div class="col-md-3 text-center">
          <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/user/panel/plan/subscribe/1">@lang("user/plan/plan.btnSubscribe")</a></button>
        </div>
      </div>

      <!-- Pro -->
      <div class="row section pro-bg-color p-5 mr-md-5">
        <div class="col-md-9">
          <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
          <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
          <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
          <p class="">@lang("user/plan/plan.proProductsList")</p>
          <small class="price">17.95€</small>
        </div>
        <div class="col-md-3 text-center">
          <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/user/panel/plan/subscribe/1">@lang("user/plan/plan.btnSubscribe")</a></button>
        </div>
      </div>

      <!-- Premium -->
      <div class="row section premium-bg-color p-5 mr-md-5">
        <div class="col-md-9">
          <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
          <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
          <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
          <p class="">@lang("user/plan/plan.premiumProductsList")</p>
          <small class="price">29.95€</small>
        </div>
        <div class="col-md-3 text-center">
          <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/user/panel/plan/subscribe/1">@lang("user/plan/plan.btnSubscribe")</a></button>
        </div>
      </div>

     <!-- <div class="row section p-5 mr-md-5">
        <div class="col-md-9 text-center">
          <h3 class="">@lang("user/plan/plan.notEnough")</h3>
          <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">@lang("user/plan/plan.btnMoreInfo")</a></button>
        </div>
        <div class="col-md-3 text-center">
        </div>
      </div>-->
    </div>
@endsection
@section('scriptsPersonalizados')
  <script src="{{asset('/js/libraries/slick/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('/js/libraries/slick/slick.min.js')}}"></script>

  <script type="text/javascript">
      $(document).ready(function(){
        $('.single-item').slick();
      });
  </script>
@endSection
