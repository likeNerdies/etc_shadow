@extends('layouts.app')

@section('title')
  Plans
@endsection

@section('content')
  @include('layouts.navbar')
  <div class="container-fluid pr-0 pl-0 mt-10">
    <div class="plans-background-image"></div><!-- Potser un carousel -->
  </div>
  <div class="container text-center mt-5">
    <h1 class="lighter-font">Hey! Take a look at our plans!</h1>
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
            <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-middle-carousel" type="button" name="button"><a href="/products">Subscribe</a></button>
          </div>
        </div>
        <div class="carousel-item">
          <img class="image-fluid" src="/img/plans/3.png" alt="Pro plan">
          <div class="carousel-caption d-md-block">
            <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-middle-carousel" type="button" name="button"><a href="/products">Subscribe</a></button>
          </div>
        </div>
        <div class="carousel-item">
          <img class="image-fluid" src="/img/plans/4.png" alt="Premium plan">
          <div class="carousel-caption d-md-block">
            <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-middle-carousel" type="button" name="button"><a href="/products">Subscribe</a></button>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-plans" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-plans" role="buton" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
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
