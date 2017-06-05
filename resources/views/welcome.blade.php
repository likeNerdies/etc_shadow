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
                <a href="/products" class="mt-3 btn btn-primary page-scroll sans-serif btn-seeProducts sr-btn" role="button">@lang("welcome.btnSeeProducts")</a>
                <!--<a href="/products"><button class="mt-3  btn btn-primary page-scroll btn-seeProducts sr-btn" type="button" name="button">@lang("welcome.btnSeeProducts")</button></a>-->
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
              @if(Session::get('locale')=='es')
                <img class="image-fluid" src="/img/plans/charming_es.png" alt="Charming plan">
              @else
                <img class="image-fluid" src="/img/plans/charming_en.png" alt="Charming plan">
              @endif
              <div class="carousel-caption d-md-block">
                <a href="/user/panel/plan/subscribe/1" class="btn btn-primary page-scroll btn-seeProducts sans-serif btn-subscribe btn-middle-carousel" role="button">@lang("welcome.subscribe")</a>
                <!--<a href="/user/panel/plan/subscribe/1"><button class="btn btn-primary page-scroll btn-seeProducts btn-subscribe btn-middle-carousel" type="button" name="button">@lang("welcome.subscribe")</button></a>-->
              </div>
            </div>
            <div class="carousel-item">
              @if(Session::get('locale')=='es')
                <img class="image-fluid" src="/img/plans/pro_es.png" alt="Pro plan">
              @else
                <img class="image-fluid" src="/img/plans/pro_en.png" alt="Pro plan">
              @endif
              <div class="carousel-caption d-md-block">
                <a href="/user/panel/plan/subscribe/2" class="btn btn-primary page-scroll btn-seeProducts sans-serif btn-subscribe btn-middle-carousel cursor-pointer" role="button">@lang("welcome.subscribe")</a>
                <!--<a href="/user/panel/plan/subscribe/2"><button class="btn btn-primary page-scroll btn-seeProducts btn-subscribe btn-middle-carousel" type="button" name="button">@lang("welcome.subscribe")</button></a>-->
              </div>
            </div>
            <div class="carousel-item">
              @if(Session::get('locale')=='es')
                <img class="image-fluid" src="/img/plans/premium_es.png" alt="Premium plan">
              @else
                <img class="image-fluid" src="/img/plans/premium_es.png" alt="Premium plan">
              @endif
              <div class="carousel-caption d-md-block">
                <a href="/user/panel/plan/subscribe/3" class="btn btn-primary page-scroll btn-seeProducts btn-subscribe sans-serif btn-middle-carousel cursor-pointer" role="button">@lang("welcome.subscribe")</a>
                <!--<a href="/user/panel/plan/subscribe/3"><button class="btn btn-primary page-scroll btn-seeProducts btn-subscribe btn-font-black btn-middle-carousel" type="button" name="button">@lang("welcome.subscribe")</button></a>-->
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-plans" data-slide="prev"><!-- role="button" -->
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang("welcome.previous")</span>
          </a>
          <a class="carousel-control-next" href="#carousel-plans" data-slide="next"><!-- role="button" -->
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang("welcome.next")</span>
          </a>
        </div><!-- / Carousel -->
        <!-- Alternative to Carousel - hidden md up -->
        <div class="hidden-md-up">
          @if(Session::get('locale')=='es')
            <img class="img-fluid mb-2" src="/img/plans/charming_es.png" alt="Charming plan">
            <img class="img-fluid mb-2" src="/img/plans/pro_es.png" alt="Pro plan">
            <img class="img-fluid mb-2" src="/img/plans/premium_es.png" alt="Premium plan">
          @else
            <img class="img-fluid mb-2" src="/img/plans/charming_en.png" alt="Charming plan">
            <img class="img-fluid mb-2" src="/img/plans/pro_en.png" alt="Pro plan">
            <img class="img-fluid mb-2" src="/img/plans/premium_en.png" alt="Premium plan">
          @endif
          <a href="/plans" class="btn btn-primary page-scroll sans-serif btn-seeProducts sr-btn btn-subscribe" role="button">@lang("welcome.subscribe")</a>
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
            <h4><span data-count-from="8900" data-count-to="23102" class="stats">0</span></h4>
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
