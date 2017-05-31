<div id="nav-container" class="container-fluid">
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded fixed-top" id="navbar_out" data-spy="affix">

    <button id="hamburger" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if (Route::has('login'))
      @if (Auth::check())
        <span id="tog-profile">{{ucfirst(substr(Auth::user()->name,0,1))}}</span>
      @endif
    @endif
        <a class="navbar-brand" href="/">Healthy Box</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-md-0 mx-auto">
        <li class="nav-item px-5">
          <a class="nav-link only page-scroll" href="/#howitworks">@lang('welcome.howitworks')</a>
        </li>
        <li class="nav-item px-5">
          <a class="nav-link only page-scroll" href="/#plans">@lang('welcome.plans')</a>
        </li>
        <li class="nav-item  px-5">
          <a class="nav-link only page-scroll" href="/#about">@lang('welcome.about')</a>
        </li>
      </ul>


        @if (Route::has('login'))
          @if (!Auth::check())<!-- Está  loggedo -->
            <!--<li class="nav-item dropdown mr-2">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
              <!--
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/user/panel/profile">My profile</a>
                <form class="floating-form" action="/logout" method="post">

                  <button type="submit" value="logout">Logout</button>
                </form>
              </div>
            </li>-->
          <!-- No ha iniciado sesión -->
            <ul class="navbar-nav log-re">
            {{--
                @if(!Auth::check())
                  @include('layouts.register')
                  @include('layouts.login')
                @endif
            --}}
              {{ csrf_field() }}
              <li class="nav-item  px-1"><button class="btn btn-info" data-toggle="modal" data-target="#modalLogin">@lang('login.login')</button></li><!--tocar buttons--><!--tambe includes register i login del modals-->
              <li class="nav-item  px-1"><button class="btn btn-info" data-toggle="modal" data-target="#modalRegister">@lang('login.register')</button></li><!--tocar buttons-->
            </ul>
          @endif
        @endif

      <!-- Lang -->
      <ul style="list-style: none;">
        <li class="nav-item  px-1">
          <form class="form-inline" method="post" action="{{route('change-lang')}}" id="change_lang">
            {{csrf_field()}}
           <select class="form-control" id="changelang" name="lang">
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
      </ul><!-- / lang -->
    </div><!-- / navbar-collapse -->
  </nav>
</div><!-- / nav-container -->
