@extends('user.layouts.panel')
@section('right-panel')
  <div class="container mt-5 justify-content-center">
    <div class="offset-md-1 col-md-10 bg-whitesmoke-sutil">
      <h1 class="text-center red-font lighter-font">@lang("user/help/help.needHelp")</h1>

      <div class="mt-5 ml-10 mr-10 text-sm-justify">
        <div class="">
          <h4 class=""><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("user/help/help.toSubscribe")</h4>
          <p class="big-p">@lang("user/help/help.subscribeOptions")</p>
          <p>@lang("user/help/help.subscribe1")</p>
          <p>@lang("user/help/help.subscribe2")</p>
        </div>
      </div>

      <div class="mt-5 ml-10 mr-10 ">
        <div class="">
          <h4 class=""><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("user/help/help.seeProducts")</h4>
          <p class="big-p">@lang("user/help/help.productsOption1")</p>
          <p>@lang("user/help/help.productsOption2")</p>
          <p>@lang("user/help/help.productsOption3")</p>
        </div>
      </div>

      <div class="mt-5 ml-10">
        <div class="">
          <h4><span><i class="fa fa-thumb-tack" aria-hidden="true"></i>@lang("user/help/help.ingredientsAllergies")</span></h4>
          <p class="big-p">@lang("user/help/help.personalizeOption1")</p>
          <p>@lang("user/help/help.personalizeOption2")</p>
          <p>@lang("user/help/help.personalizeOption3")</p>
        </div>
      </div>
    </div>

  </div>

@endsection
