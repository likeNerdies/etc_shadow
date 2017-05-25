
<div id="nav-container" class="container-fluid  nav_in">

  <nav class="navbar navbar-toggleable-md navbar-light bg-faded fixed-top" id="main-navbar" data-spy="affix">
    <button id="hamburger" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand w-25" href="/">Brand</a>

    <span id="tog-profile"><span>{{substr(Auth::user()->name,0,1)}}</span></span>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-md-0 mx-auto">
        <li class="nav-item  px-5">
          <a class="nav-link only page-scroll" href="/products">@lang('user/navbar_in.products')</a>
        </li>
        <li class="nav-item px-5">
          <a class="nav-link only page-scroll" href="/plans">@lang('user/navbar_in.plans')</a>
        </li>
        <li class="nav-item  px-5">
          <a class="nav-link only page-scroll" href="#about">@lang('welcome.about')</a>
        </li>
      </ul>

      <ul class="navbar-nav log-reg">
        @if (Route::has('login'))
        @if (!Auth::check())
        <!--<li class="nav-item dropdown mr-2 hidden-sm-down">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{--Auth::user()->name--}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/user/panel/profile">My profile</a>
            <a class="dropdown-item" href="#">Change my plan</a>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </li>-->



        <li class="nav-item  px-1"><button class="btn btn-info" data-toggle="modal" data-target="#modalLogin">@lang('login.login')</button></li><!--tocar buttons--><!--tambe includes register i login del modals-->
        <li class="nav-item  px-1"><button class="btn btn-info" data-toggle="modal" data-target="#modalRegister">@lang('login.register')</button></li><!--tocar buttons-->
          @endif
        @endif
      </ul>


      <!-- Language -->
      <ul>
        <li class="nav-item  px-1">
          <form method="post" action="{{route('change-lang')}}" id="change_lang">
            {{csrf_field()}}
           <select id="changelang" name="lang">
            @if(session()->has('locale'))
                @if(session()->get('locale')=='es')
                   <option value="es" selected>Español</option>
                  <option value="en">English</option>
                 {{-- <option value="en" >{{session()->get('locale')}}</option>--}}
                @else
                  <option value="es">Español</option>
                    <option value="en" selected>English</option>
               {{--     <option value="en" >{{session()->get('locale')}}</option>--}}
                @endif

            @else
              <option value="es">Español</option>
              <option value="en" selected>English</option>
            @endif
          </select>
          </form>
        </li>
      </ul>
      <!-- / Language -->
    </div>
  </nav>
</div><!-- / nav-container -->
