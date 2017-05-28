@extends('layouts.app')

@section('content')

@include('user.layouts.navbar_in')
    <div class="profile-content"></div>
    <div class="mx-auto banner">
    </div>

    <div id="main-wrapper-in">
        <div id="sidebar-wrapper-in">
            @include('user.layouts.sidebar')
        </div>

        <div id="content-wrapper-in">
            @yield('right-panel')
        </div>
    </div>

    <!--<div class="scrollTop">
        <i class="fa fa-caret-up fa-3x" aria-hidden="true"></i>
    </div>-->

@endsection

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script><!-- Includes navbar animations -->
@endsection
