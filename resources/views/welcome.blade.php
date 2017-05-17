@extends('layouts.app')

@section('title')
  Welcome
@endsection

@section('content')
<div id="nav-container">
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded container-fluid fixed-top" data-spy="affix">
    <button id="hamburger" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-md-0 mx-auto">
        <li class="nav-item  px-5">
          <a class="nav-link only page-scroll" href="#howitworks">How it works</a>
        </li>
        <li class="nav-item px-5">
          <a class="nav-link only page-scroll" href="#plans">Plans</a>
        </li>
        <li class="nav-item  px-5">
          <a class="nav-link only page-scroll" href="#about">About</a>
        </li>
      </ul>

      <ul class="navbar-nav log-re">
        @if (Route::has('login'))
        @if (Auth::check())
        <li class="nav-item dropdown mr-2">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/user/panel/profile">My profile</a>
            <a class="dropdown-item" href="#">Change my plan</a>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </li>
        @else

        <li class="nav-item  px-1"><button class="btn btn-info" data-toggle="modal" data-target="#modalLogin">Login</button></li><!--tocar buttons--><!--tambe includes register i login del modals-->
        <li class="nav-item  px-1"><button class="btn btn-info" data-toggle="modal" data-target="#modalRegister">Register</button></li><!--tocar buttons-->
          @endif
        @endif
      </ul>
    </div>
  </nav>
</div><!-- / nav-container -->

<div class="container">

  <div id="shoppingFlow" class="row section"><!-- Shopping flow -->
    <div id="howitworks" class="col-sm-12">
      <h2 class="text-center pt-2 mb-5">Shopping flow</h2>
      <div class="row">
        <div class="col-md-3 col-sm-12 text-center">
          <div class="row justify-content-center">
            <div class="content-image">
              <div class="image mb-1">
                <img class="sr-icons" src="/img/groceries.png" alt="">
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
                <img class="sr-icons" src="/img/oat.png" alt="">
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
                <img class="sr-icons" src="/img/check-mark.png" alt="">
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
                <img class="sr-icons" src="/img/trucking.png" alt="">
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
            <img class="d-block img-fluid" src="/img/prova2.png" alt="Our plans">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="/img/slide2.png" alt="Plan 'Charming'">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="/img/pro.png" alt="Plan 'Pro'">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="/img/premium.png" alt="Plan 'Premium'">
          </div>
        </div>
        <a class="carousel-control-prev" href="#plansCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
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
