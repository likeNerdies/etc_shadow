@extends('layouts.app')

@section('title')
  Welcome
@endsection

@section('content')


@include('layouts.navbar')


<div class="container-fluid pr-0">
  <div class="background-image"></div>
</div>
<div class="container">

  <div id="shoppingFlow" class="row section"><!-- Shopping flow -->
    <div id="howitworks" class="col-sm-12">
      <h2 class="text-center pt-2 mb-5">Shopping flow</h2>
      <div class="row">
        <div class="col-md-3 col-sm-12 text-center">
          <div class="row justify-content-center">
            <div class="content-image">
              <div class="image mb-1">
                <img class="sr-icons" src="/img/welcome/shopping-flow/groceries.png" alt="">
              </div>
              <div class="content">
                <p class="text-justify text-center">First go see our products!</p>
                <button class="mt-3  btn btn-primary page-scroll btn-seeProducts sr-btn" type="button" name="button"><a href="/products">See our products</a></button>
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
                <p class="text-justify text-center">Choose the ingredients you don't like or your allergic at</p>
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
                <p class="text-justify text-center">Subscribe and choose the plan you want</p>
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
                <p class="text-justify text-center">And you got it right at your sweet home!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- / shopping flow -->

  <div class="row justify-content-center section"><!-- Plans -->
    <div id="plans" class="">
      <h2 class="text-center">Subscribe to our plans</h2>
      <div id="plansCarousel" class="carousel slide ml-4" data-ride="carousel">
        <ol class="carousel-indicators text-info">
          <li data-target="#plansCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#plansCarousel" data-slide-to="1"></li>
          <li data-target="#plansCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="/img/welcome/plans/main.png" alt="Our plans">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="/img/welcome/plans/slide2.png" alt="Plan 'Charming'">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="/img/welcome/plans/pro.png" alt="Plan 'Pro'">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="/img/welcome/plans/premium.png" alt="Plan 'Premium'">
          </div>
        </div>
        <a class="carousel-control-prev" href="#plansCarousel" role="button" data-slide="prev">
          <span style="color: #0f0b1b" class="fa fa-angle-left fa-5x" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#plansCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- / carousel -->
    </div>
  </div><!-- / plans -->

  <div id="aboutUs" class="row section"><!-- About us -->
    <div id="about" class="col-sm-12 text-center">
      <h2 class="pt-2">About us</h2>
      <div class="row">
        <div class="side1 mt-5 col-md-6 col-sm-12">
          <h4>A healthy body is a healthy mind</h4>
          <p>That's what my grandma told me.</p>
        </div>
        <div class="side2 mt-5 col-md-6 col-sm-12">
          <h4>We're a startup with a vision</h4>
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
  <script src="/js/welcome/welcome_script.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
@endsection
