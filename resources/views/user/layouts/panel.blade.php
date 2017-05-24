@extends('layouts.app')

@section('content')

@include('user.layouts.navbar_in')

    <div class="profile-content"></div>
    <div id="main-wrapper-in">
        <div id="sidebar-wrapper-in">
            <div class="container">
                @include('user.layouts.sidebar')
            </div>
        </div>
        <div id="content-wrapper-in">
            <div class="container">
                @yield('right-panel')
            </div>
        </div>
    </div>

        


@endsection

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script>
@endsection