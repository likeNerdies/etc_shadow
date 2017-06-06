@extends('layouts.app')
@section('title','not found')
@section('content')
    @include('layouts.navbar')
    @if(!Auth::check())
        @include('layouts.register')
        @include('layouts.login')
    @endif
<div class="row text-center mt-15vh">
    <div class="col-12">

        <h1 class="mt-5">Oops!</h1>

        <h2>405 Error</h2>

        <div class="error-details mt-5">
            Sorry, an error has occured, Requested page not found!
        </div>
        <div class="error-actions mt-4">
            <a href="/" class="btn btn-primary btn-lg">
              Take Me Home
            </a>
            <a href="/help" class="btn btn-default btn-lg">
              Contact Support
            </a>
        </div>
    </div>
</div>
@endsection
@section('scriptsPersonalizados')
    <script src="{{asset('/js/welcome/welcome.js')}}"></script><!-- Includes navbar animations -->
@endsection