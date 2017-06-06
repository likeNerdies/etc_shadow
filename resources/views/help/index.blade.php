@extends('layouts.app')

@section('title')
  Help
@endsection

@section('content')


@include('layouts.navbar')
  <div class="container mt-80p justify-content-center">

    <div style="box-shadow: 0px 3px 6px lightgrey; padding-bottom: 20px;" class="offset-md-1 col-md-10 bg-whitesmoke-sutil">
      <h1 class="text-center red-font lighter-font">@lang("help.needHelp")</h1>
<!--
  <div class="container mt-5 justify-content-center">
    <h1 class="text-center red-font lighter-font">@lang("user/help/help.needHelp")</h1>
    <div class="offset-md-1 col-md-10 bg-whitesmoke-sutil">
-->
      <div class="mt-5 ml-10 mr-10 text-sm-justify">
          <h4 class=""><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("help.toSubscribe")</h4>
          <p class="big-p">@lang("help.subscribeOptions")</p>
          <p>@lang("help.subscribe1")</p>
          <p>@lang("help.subscribe2")</p>
          <p>@lang("help.subscribe3")</p>
      </div>

      <div class="mt-5 ml-10 mr-10 ">
        <div class="">
          <h4 class=""><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("help.seeProducts")</h4>
          <p>@lang("help.productsOption1")</p>
          <p>@lang("help.productsOption2")</p>
        </div>
      </div>

      <div class="mt-5 ml-10">
        <div class="">
          <h4><span><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("help.ingredientsAllergies")</span></h4>
          <p class="big-p">@lang("help.personalizeOption1")</p>
          <p>@lang("help.personalizeOption2")</p>
          <p>@lang("help.personalizeOption3")</p>
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
    <script src="/js/welcome/welcome_script.js"></script>
  @endsection
