@extends('layouts.app')

@section('title')
  Help
@endsection

@section('content')


@include('layouts.navbar')
<<<<<<< HEAD
  <div class="container mt-80p justify-content-center">

    <div class="offset-md-1 col-md-10 bg-whitesmoke-sutil">
      <h1 class="text-center red-font lighter-font">@lang("help.needHelp")</h1>
=======
  <div class="container mt-5 justify-content-center">
    <h1 class="text-center red-font lighter-font">@lang("user/help/help.needHelp")</h1>
    <div class="offset-md-1 col-md-10 bg-whitesmoke-sutil">

>>>>>>> 611db4825fe7d2ad32b5a21fbe4cb286b64536f1

      <div class="mt-5 ml-10 mr-10 text-sm-justify">
          <h4 class=""><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("help.toSubscribe")</h4>
          <p class="big-p">@lang("help.subscribeOptions")</p>
          <p>@lang("help.subscribe1")</p>
          <p>@lang("help.subscribe2")</p>
      </div>

      <div class="mt-5 ml-10 mr-10 ">
        <div class="">
          <h4 class=""><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("help.seeProducts")</h4>
          <p class="big-p">@lang("help.productsOption1")</p>
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

  @endsection
  @section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script>
  @endsection
