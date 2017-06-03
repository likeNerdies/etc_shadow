@extends('layouts.app')

@section('title')
  Healthy Box
@endsection

@section('content')


@include('layouts.navbar')

<div class="w-100">
  <div class="background-image"></div>
</div>

<div class="container">
  <div id="shoppingFlow" class="row mt-15"><!-- Shopping flow -->
    <div id="howitworks" class="col-sm-12">
      <h2 class="text-center pt-2 mb-5">@lang("welcome.shoppingFlow")</h2>
      <div class="row">
        <div class="col-md-3 col-sm-12 text-center">
          <div class="row justify-content-center">
            <div class="content-image">
              <div class="image mb-1">
                <img class="sr-icons" src="/img/welcome/shopping-flow/groceries.png" alt="">
              </div>
              <div class="content">
                <p class="text-justify text-center">@lang("welcome.seeProducts")</p>
                <a href="/products"><button class="mt-3  btn btn-primary page-scroll btn-seeProducts sr-btn" type="button" name="button">@lang("welcome.btnSeeProducts")</button></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-12 text-center">
          <div class="row justify-content-center">
            <div class="content-image">
              <div class="image mb-1">
                <img class="sr-icons" src="/img/welcome/shopping-flow/oat.png" alt="">
              </div>
              <div class="content">
                <p class="text-justify text-center">@lang("welcome.chooseIngAll")</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-12 text-center">
          <div class="row justify-content-center">
            <div class="content-image">
              <div class="image mb-1">
                <img class="sr-icons" src="/img/welcome/shopping-flow/check-mark.png" alt="">
              </div>
              <div class="content">
                <p class="text-justify text-center">@lang("welcome.choosePlan")</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 text-center">
          <div class="row justify-content-center">
            <div class="content-image">
              <div class="image mb-1">
                <img class="sr-icons" src="/img/welcome/shopping-flow/trucking.png" alt="">
              </div>
              <div class="content">
                <p class="text-justify text-center">@lang("welcome.gotItHome")</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- / shopping flow -->

  <div class="row justify-content-center mt-15"><!-- Plans -->
    <div id="plans" class="">
      <h2 class="text-center mb-5">@lang("welcome.subscribeToPlans")</h2>
      <div class="container text-center">
        <!-- Carousel, hidden md down -->
        <div id="carousel-plans" class="carousel slide mt-5 ml-5 hidden-md-down w-90" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-plans" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-plans" data-slide-to="1"></li>
            <li data-target="#carousel-plans" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="image-fluid" src="/img/plans/2.png" alt="Charming plan">
              <div class="carousel-caption d-md-block">
                <button class="btn btn-primary page-scroll btn-seeProducts btn-subscribe btn-middle-carousel" type="button" name="button"><a href="/user/panel/plan/subscribe/1">@lang("welcome.subscribe")</a></button>
              </div>
            </div>
            <div class="carousel-item">
              <img class="image-fluid" src="/img/plans/3.png" alt="Pro plan">
              <div class="carousel-caption d-md-block">
                <button class="btn btn-primary page-scroll btn-seeProducts btn-subscribe btn-middle-carousel" type="button" name="button"><a href="/user/panel/plan/subscribe/2">@lang("welcome.subscribe")</a></button>
              </div>
            </div>
            <div class="carousel-item">
              <img class="image-fluid" src="/img/plans/4.png" alt="Premium plan">
              <div class="carousel-caption d-md-block">
                <button class="btn btn-primary page-scroll btn-seeProducts btn-subscribe btn-middle-carousel" type="button" name="button"><a href="/user/panel/plan/subscribe/3">@lang("welcome.subscribe")</a></button>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-plans" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang("welcome.previous")</span>
          </a>
          <a class="carousel-control-next" href="#carousel-plans" role="buton" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang("welcome.next")</span>
          </a>
        </div><!-- / Carousel -->
        <!-- Alternative to Carousel - hidden md up -->
        <div class="hidden-md-up">
          <img src="/img/plans/2.png" class="img-fluid mb-1" alt="">
          <img src="/img/plans/3.png" class="img-fluid mb-1" alt="">
          <img src="/img/plans/4.png" class="img-fluid mb-1" alt="">
          <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="button" name="button"><a href="/plans">@lang("welcome.subscribe")</a></button>
        </div><!-- / Alternative to Carousel -->
      </div>
    </div>
  </div><!-- / plans -->

  <div id="aboutUs" class="row mt-15 pb-10"><!-- About us -->
    <div id="about" class="col-sm-12 text-center">
      <h2 class="pt-2">@lang("welcome.about")</h2>
      <div class="row">
        <div class="side1 mt-5 col-md-4 col-sm-12">
          <div class="h-75 h-sm-50">
            <h4 class="font-22">@lang("welcome.aboutUs1Title")</h4>
            <p class="mx-auto">@lang("welcome.aboutUs1Content")</p>
          </div>
          <!-- Lines of code -->
          <div class="">
            <h4><i class="fa fa-code mr-0" aria-hidden="true"></i></h4>
            <h4><span data-count-from="4500" data-count-to="6000" class="stats">0</span></h4>
            <h6 class="text-uppercase lighter-font">@lang("welcome.linesCode")</h6>
          </div>

        </div>

        <div class="side2 mt-5 col-md-4 col-sm-12">
          <div class="h-75 h-sm-50">
            <h4 class="font-22">@lang("welcome.aboutUs2Title")</h4>
            <p class="mx-auto">@lang("welcome.aboutUs2Content")</p>
          </div>
          <!-- Hours worked -->
          <div class="">
            <h4><i class="fa fa-clock-o mr-0" aria-hidden="true"></i></h4>
            <h4><span data-count-from="100" data-count-to="400" class="stats">0</span></h4>
            <h6 class="text-uppercase lighter-font">@lang("welcome.hoursWorked")</h6>
          </div>
        </div>

        <div class="side2 mt-5 col-md-4 col-sm-12">
          <div class="h-75 h-sm-50">
            <h4 class="font-22">@lang("welcome.aboutUs3Title")</h4>
            <h5>@lang("welcome.aboutUs3Content")</h5>
          </div>
          <!-- Coffee cups -->
          <div class="">
            <h4><i class="fa fa-coffee mr-0" aria-hidden="true"></i></h4>
            <h4><span data-count-from="-80" data-count-to="101" class="stats">0</span></h4>
            <h6 class="text-uppercase lighter-font">@lang("welcome.cupsCoffee")</h6>
          </div>

        </div>
      </div>

      <!-- Animated counters
      <div class="row justify-content-center mt-2">
        <!--<div class="col-sm-12 col-md-4">
          <h4><i class="fa fa-code mr-0" aria-hidden="true"></i></h4>
          <h4><span data-count-from="4500" data-count-to="22000" class="stats">0</span></h4>
          <h6 class="text-uppercase lighter-font">@lang("welcome.linesCode")</h6>
        </div>-->

        <!--<div class="col-sm-12 col-md-4">
          <h4><i class="fa fa-clock-o mr-0" aria-hidden="true"></i></h4>
          <h4><span data-count-from="100" data-count-to="400" class="stats">0</span></h4>
          <h6 class="text-uppercase lighter-font">@lang("welcome.hoursWorked")</h6>
        </div>


        <div class=" col-sm-12 col-md-4">
          <h4><i class="fa fa-coffee mr-0" aria-hidden="true"></i></h4>
          <h4><span data-count-from="-80" data-count-to="101" class="stats">0</span></h4>
          <h6 class="text-uppercase lighter-font">@lang("welcome.cupsCoffee")</h6>
        </div>
      </div>-->
    </div>
  </div><!-- / about us -->

  @if(!Auth::check())
    @include('layouts.register')
    @include('layouts.login')
  @endif

</div><!-- / container -->
@endsection

<!-- Aquí hi ha el footer -->

@section('scriptsPersonalizados')
<script src="{{asset('/js/welcome/welcome_script.js')}}"></script>
<script src="{{asset('/js/libraries/timber/jquery.tm.counter.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.stats').counter();
  });
</script>


  @if(Session::get('errorLogin'))
    <script>
        $(function() {
            $('#modalLogin').modal('show');
        });
    </script>

    @php
    Session::forget('errorLogin');
    @endphp
  @endif
@endsection
