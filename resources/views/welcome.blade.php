@extends('layouts.app')
@section('title')
Welcome
@endsection
@section('content')
<div id="nav-container">
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded container-fluid fixed-top" data-spy="affix">
    <button id="hamburger" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-md-0 mx-auto">
        <li class="nav-item px-5">
          <a class="nav-link page-scroll" href="#sec1">About</a>
        </li>
        <li class="nav-item  px-5">
          <a class="nav-link page-scroll" href="#sec2">Shop flow</a>
        </li>
        <li class="nav-item  px-5">
          <a class="nav-link page-scroll" href="#sec3">Plans</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        @if (Route::has('login'))
        @if (Auth::check())
        <li class="nav-item dropdown mr-2"> <!--if time, modify-->
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something</a>
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
</div>
<div class="container-fluid">
  <div class="row">
    <div id="sec1" class="col-sm-12">
      <h2 class="text-center pt-2">About us</h2>
    </div>
  </div>
  <div class="row">
    <div id="sec2" class="col-sm-12">
      <h2 class="text-center pt-2">Shopping flow</h2>
    </div>
  </div>
  <div class="row">
    <div id="sec3" class="col-sm-12">
      <h2 class="text-center pt-2">Plans</h2>
      <div class="row">
        <div class="col-sm-4 text-center">
          <div class="row justify-content-center">
            <div class="col-sm-9 margin-content-image">
              <div class="content-image">
                <div class="image">
                  <img src="/img/groceries.png" alt="">
                </div>
                <div class="content">
                  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus delectus dolor velit itaque, expedita ratione qui atque porro recusandae adipisci? Repellendus inventore esse quae ipsa nisi odit in aliquid cumque.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-sm-4 text-center">
          <div class="row justify-content-center">
            <div class="col-sm-9 margin-content-image">
              <div class="content-image">
                <div class="image">
                  <img src="/img/check-mark.png" alt="">
                </div>
                <div class="content">
                  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus delectus dolor velit itaque, expedita ratione qui atque porro recusandae adipisci? Repellendus inventore esse quae ipsa nisi odit in aliquid cumque.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 text-center">
          <div class="row justify-content-center">
            <div class="col-sm-9 margin-content-image">
              <div class="content-image">
                <div class="image">
                  <img src="/img/trucking.png" alt="">
                </div>
                <div class="content">
                  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus delectus dolor velit itaque, expedita ratione qui atque porro recusandae adipisci? Repellendus inventore esse quae ipsa nisi odit in aliquid cumque.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if(!Auth::check())
  @include('layouts.register')
  @include('layouts.login')
@endif



@endsection
@section('scriptsPersonalizados')
  <script src="/js/welcome_script.js"></script>
@endsection
