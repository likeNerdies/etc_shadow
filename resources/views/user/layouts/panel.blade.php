@extends('layouts.app')

@section('content')

@include('layouts.navbar')

    <div id="main-wrapper-in">
        <div id="sidebar-wrapper-in" class="mt-15vh">
            @include('user.layouts.sidebar')
        </div>

        <div id="content-wrapper-in" class="mt-15vh">
            @yield('right-panel')
        </div>
    </div>

    <!--<div class="scrollTop">
        <i class="fa fa-caret-up fa-3x" aria-hidden="true"></i>
    </div>-->

@endsection

@section('scriptsPersonalizados')
    <script src="{{asset('/js/welcome/welcome_script.js')}}"></script><!-- Includes navbar animations -->s
    @yield('more-scripts-for-user-panel')
@endsection
