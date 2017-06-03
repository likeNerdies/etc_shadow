@extends('user.layouts.panel')
@section('title','Profile')
@section('right-panel')

  <div class="container text-center ml-3rem">

    <!-- Welcome -->
      <div class="row mb-5">
          <div class="col-12">
              <h1 class="text-center lighter-font">@lang('user/profile/profile.welcome'), {{$user->name}}</h1>
          </div>
      </div>

      <!-- Next box / Subscribe to plans -->
      <div class="row">
          <div class="col-md-6 col-12">
            @if (Auth::user()->plan_id == null) <!--  Si no tiene plan, mostrar para suscribirse -->
                <h1 class="text-center red-font">@lang("user/plan/plan.noPlan")</h1>
                <h4 class="text-center mt-3">@lang("user/plan/plan.wannaSubscribe")</h4>
            @else <!-- Si tiene plan, enseñar tiempo restante para la entrega de su próxima caja -->
                <div class="user-dashboard-block text-center bg-f7 p-3">
                    <h4>@lang('user/profile/profile.box_coming')</h4>
                    <i class="fa fa-clock-o mr-0 fa-20" aria-hidden="true"></i>
                    <h5 id="timeRemaining">...</h5>
                </div>
                @endif
            </div>
            <div class="col-md-6 col-12" style="background: beige; padding: 2.5%"></div>
        </div><!-- / row -->

        <div class="row mt-10">

            <div class="col-md-8">
                @if(Auth::user()->plan==null)
                    <!--<div class="container-fluid pr-0 pl-0 mt-10">
                        <div class="plans-background-image"></div>--><!-- Potser un carousel -->
                    <!--</div>-->
                    <div class="text-center">
                        <h1 class="lighter-font">Hey! Take a look at our plans!</h1>
                        <div id="carousel-plans" class="carousel slide mt-5 hidden-md-down w-90"
                             data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-plans" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-plans" data-slide-to="1"></li>
                                <li data-target="#carousel-plans" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="image-fluid" src="/img/plans/2.png" alt="Charming plan">
                                    <div class="carousel-caption d-md-block">
                                        <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-middle-carousel"
                                                type="button" name="button"><a href="/products">Subscribe</a></button>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="image-fluid" src="/img/plans/3.png" alt="Pro plan">
                                    <div class="carousel-caption d-md-block">
                                        <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-middle-carousel"
                                                type="button" name="button"><a href="/products">Subscribe</a></button>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="image-fluid" src="/img/plans/4.png" alt="Premium plan">
                                    <div class="carousel-caption d-md-block">
                                        <button class="btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-middle-carousel"
                                                type="button" name="button"><a href="/products">Subscribe</a></button>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-plans" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-plans" role="buton" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                @else<!-----------------SI TIENE PLAN-------------------->
                    <div class="container justify-content-center">
                        <h1 class="text-center red-font">@lang("user/plan/plan.hasPlan"){{ Auth::user()->plan->name}}!</h1>
                        <h4 class="text-center mt-3">@lang("user/plan/plan.wannaChange")</h4>

                    @if (Auth::user()->plan->name == "charming")
                        <!-- Pro -->
                            <div class="row section pro-bg-color p-5 mr-md-5">
                                <div class="col-md-9">
                                    <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
                                    <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
                                    <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
                                    <p class="">@lang("user/plan/plan.proProductsList")</p>
                                    <small class="price">{{$plans[1]->price}}€</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" ><a href="/user/panel/profile/plan/subscribe/2">@lang("user/plan/plan.btnChangePlan")</a></button>
                                </div>
                            </div>
                            <!-- Premium -->
                            <div class="row section premium-bg-color p-5 mr-md-5">
                                <div class="col-md-9">
                                    <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
                                    <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
                                    <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
                                    <p class="">@lang("user/plan/plan.premiumProductsList")</p>
                                    <small class="price">{{$plans[2]->price}}€</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" ><a href="/user/panel/profile/plan/subscribe/3">@lang("user/plan/plan.btnChangePlan")</a></button>
                                </div>
                            </div>
                    @elseif (Auth::user()->plan->name == "pro")
                        <!-- Charming -->
                            <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
                                <div class="col-md-9">
                                    <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
                                    <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
                                    <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
                                    <p class="">@lang("user/plan/plan.charmingProductsList")</p>
                                    <small class="price">{{$plans[0]->price}}€</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" ><a href="/user/panel/profile/plan/subscribe/1">@lang("user/plan/plan.btnChangePlan")</a></button>
                                </div>
                            </div>
                            <!-- Premium -->
                            <div class="row section premium-bg-color p-5 mr-md-5">
                                <div class="col-md-9">
                                    <h3 class="text-center">@lang("user/plan/plan.premiumTitle")</h3>
                                    <h3 class="text-center subtitle">@lang("user/plan/plan.premiumSubtitle")</h3>
                                    <h6 class="mt-5">@lang("user/plan/plan.premiumSlogan")</h6>
                                    <p class="">@lang("user/plan/plan.premiumProductsList")</p>
                                    <small class="price">{{$plans[3]->price}}€</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" ><a href="/user/panel/profile/plan/subscribe/3">@lang("user/plan/plan.btnChangePlan")</a></button>
                                </div>
                            </div>
                    @else
                        <!-- Charming -->
                            <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
                                <div class="col-md-9">
                                    <h3 class="text-center">@lang("user/plan/plan.charmingTitle")</h3>
                                    <h3 class="text-center subtitle">@lang("user/plan/plan.charmingSubtitle")</h3>
                                    <h6 class="mt-5">@lang("user/plan/plan.charmingSlogan")</h6>
                                    <p class="">@lang("user/plan/plan.charmingProductsList")</p>
                                    <small class="price">{{$plans[0]->price}}€</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" ><a href="/user/panel/profile/plan/subscribe/1">@lang("user/plan/plan.btnChangePlan")</a></button>
                                </div>
                            </div>
                            <!-- Pro -->
                            <div class="row section pro-bg-color p-5 mr-md-5">
                                <div class="col-md-9">
                                    <h3 class="text-center">@lang("user/plan/plan.proTitle")</h3>
                                    <h3 class="text-center subtitle">@lang("user/plan/plan.proSubtitle")</h3>
                                    <h6 class="mt-5">@lang("user/plan/plan.proSlogan")</h6>
                                    <p class="">@lang("user/plan/plan.proProductsList")</p>
                                    <small class="price">{{$plans[1]->price}}€</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" ><a href="/user/panel/profile/plan/subscribe/2">@lang("user/plan/plan.btnChangePlan")</a></button>
                                </div>
                            </div>
                        @endif
                    </div>


                @endif
            </div>

            <!----------------boxes recibidos-------------->
            <div class="col-md-4">
                <h3 class="text-center mt-10 mb-5">@lang('user/profile/profile.last_boxes')</h3>
            @if(!count($boxes)==0)
                <?php $id = 0 ?>
                @for ($i=0;$i<5;$i++)<!-- Si ya ha recibido anteriormente cajas -->

                    <div id="user-box-img" class="col-md-6 col-sm-12 d-inline-block mx-auto">
                        <div class="mr-5 float-right">
                            <img src="/img/logo.png" class="image-responsive" alt="">
                        </div>
                    </div>

                    <div id="date_products_box"
                         class="col-md-5 col-sm-12 mr-5 d-inline-block vertical-middle text-left">
                        <h6 class="date-received ml-24p">{{ $boxes[$i]["from"] }}</h6>
                        <?php $productId = "products" . $id ?>
                        <button type="button"
                                class="date-received btn btn-default text-brown cursor-pointer button-no-decoration px-0"
                                data-toggle="collapse" data-target=#{{$productId}} aria-expanded="false"
                                aria-controls="{{$productId}}">
                            <i class="fa fa-plus " aria-hidden="true"></i> Products
                        </button>
                        <div class="collapse" id={{$productId}}>
                            <div id="products" class="card card-block ingredients-card">
                                @foreach ($boxes[$i]["products"] as $product)
                                    <span class="text-left"><i class="fa fa-envira"
                                                               aria-hidden="true"></i>{{ $product->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        {{--  @if ($delivery->box->id != Auth::user()->deliveries->last()->box->id)
                            <div class="mt-5 ml--44"><img src="/img/user/2.png" class="mx-auto hidden-md-down" alt=""></div>
                          @endif
              --}}
                    </div>

                    <?php $id++ ?>

                    @endfor

                @else

                    <p class="col-12 text-center mt-10 mb-5">@lang('user/profile/profile.no_boxes_yet')</p>
                @endif
            </div><!---end div col4---->
        </div><!-- / row-->
    </div><!-- / container -->

@endsection
@section('more-scripts-for-user-panel')
    <script src="{{asset('/js/user/dashboard/user_dashboard.js')}}"></script><!-- Includes time remaining to next box -->
@endSection
