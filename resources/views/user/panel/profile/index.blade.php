@extends('user.layouts.panel')
@section('title','Profile')
@section('right-panel')

  <div class="container text-center mar-auto">

    <!-- Welcome -->
      <div class="row mb-5">
          <div class="col-12">
              <h1 class="text-center lighter-font">@lang('user/profile/profile.welcome'), {{$user->name}}</h1>
          </div>
      </div>

      <!-- Next box + Change plan / Subscribe to plan -->
      <div class="row">
          @if (Auth::user()->plan_id == null) <!--  Si no tiene plan, mostrar para suscribirse -->
            <div class="col-12">
              <div class="user-dashboard-block text-center bg-f7 p-3">
                <h1 class="text-center red-font">@lang("user/plan/plan.noPlan")</h1>
                <h4 class="text-center mt-3">@lang("user/plan/plan.wannaSubscribe")</h4>
                <!--<a href="/plans"><button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-font-15" type="submit" name="button">@lang("user/plan/plan.btnMoreInfo")</button></a>-->
                <a href="/plans" class="mt-3 btn btn-primary page-scroll btn-seeProducts sans-serif sr-btn btn-subscribe btn-font-15" role="button">@lang("user/plan/plan.btnMoreInfo")</a>
              </div>
            </div>
          @else <!-- Si tiene plan, enseñar tiempo restante para la entrega de su próxima caja -->
            <div class="col-sm-12 col-md-6">
              <div class="user-dashboard-block text-center bg-f7 p-3">
                  <h4>@lang('user/profile/profile.box_coming')</h4>
                  <i class="fa fa-clock-o mr-0 mt-1 fa-20" aria-hidden="true"></i>
                  <h4 id="timeRemaining" class="font-18 mt-2">...</h4>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 mt-mysm-2">
              <div class="user-dashboard-block text-center bg-f7 p-3">
                  <h4 class="text-center">@lang("user/plan/plan.hasPlan"){{ Auth::user()->plan->name}}!</h4>
                  <!--<a href="/plans"><button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe btn-font-15" type="submit" name="button">@lang("user/plan/plan.wannaChange")</button></a>-->
                  <a href="/plans" class="mt-3 btn btn-primary page-scroll btn-seeProducts sans-serif sr-btn btn-subscribe btn-font-15" role="button">@lang("user/plan/plan.wannaChange")</a>
              </div>
            </div>
          @endif
      </div><!-- / row -->

      <!-- Cajas recibidas -->
      <div class="mt-10">
          <div class="col-12 overflow-y-hidden overflow-sm-x-hidden">
              <h3 class="text-center mt-10 mb-5">@lang('user/profile/profile.last_boxes')</h3>
              @if(!count($boxes)==0)
                  <?php $id = 0; $more=true; ?>
                  @for ($i=0;$i<count($boxes)&&$more;$i++)<!-- Si ya ha recibido anteriormente cajas -->

                    <!-- Box img -->
                    <div id="user-box-img" class="col-md-6 col-sm-12 d-inline-block mx-auto mb-200p">
                        <div class="mr-5 float-right">
                            <img src="/img/logo.png" class="image-responsive" alt="">
                        </div>
                    </div>

                    <!-- Box date + Products -->
                    <div id="date_products_box" class="col-md-5 col-sm-12 mr-5 d-inline-block text-left float-md-right vertical-middle">
                        <h6 class="date-received sm-center ml-15">{{ $boxes[$i]["from"] }}</h6>
                        <?php $productId = "products" . $id ?>
                        <div class="w-80 mx-auto sm-center">
                          <span class="text-center">
                            <button type="button"
                                  class="date-received btn btn-default text-brown cursor-pointer button-no-decoration mx-auto sm-pl"
                                  data-toggle="collapse" data-target=#{{$productId}} aria-expanded="false"
                                  aria-controls="{{$productId}}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Products
                            </button>
                        </span>
                        </div>

                      <div class="w-85 mx-auto">
                        <div class="collapse " id={{$productId}}>
                            <div id="products" class="card card-block ingredients-card pl-0">
                              <ul class="ul-no-style pl-md-0">
                                @foreach ($boxes[$i]["products"] as $product)
                                    <li><i class="fa fa-envira" aria-hidden="true"></i>{{ $product->name }}</li>
                                @endforeach
                              </ul>
                            </div>
                        </div>
                      </div>

                    </div>

                    <?php $id++; if($i==5){$more=false;} ?>

                  @endfor

              @else
                  <p class="col-12 text-center mt-10 mb-5">@lang('user/profile/profile.no_boxes_yet')</p>
              @endif
          </div><!-- / col-12 -->
      </div><!-- / row -->
    </div><!-- / container -->

@endsection
@section('more-scripts-for-user-panel')
    <script src="{{asset('/js/user/dashboard/user_dashboard.js')}}"></script><!-- Includes time remaining to next box -->
@endSection
