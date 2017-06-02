@extends('user.layouts.panel')
@section('title','Profile')
@section('right-panel')
  <div class="container text-center ml-3rem">

    <!-- Welcome -->
      <div class="row mb-5">
          <div class="col-12">
              <h1 class="text-center lighter-font">Welcome, {{$user->name}}</h1>
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
                <h4>Box coming in...</h4>
                <i class="fa fa-clock-o mr-0 fa-20" aria-hidden="true"></i>
                <h5 id="timeRemaining">...</h5>
              </div>
            @endif
          </div>
          <div class="col-md-6 col-12" style="background: beige; padding: 2.5%"></div>
      </div><!-- / row -->

      <div class="row mt-10">
        <h3 class="col-12 text-center mt-10 mb-5">Your box chronology</h3>
        <?php $id = 0 ?>
        @foreach (Auth::user()->deliveries as $delivery)<!-- Si ya ha recibido anteriormente cajas -->

          <div id="user-box-img" class="col-md-6 col-sm-12 d-inline-block mx-auto">
            <div class="mr-5 float-right">
              <img src="/img/logo.png" class="image-responsive" alt="">
            </div>
          </div>

          <div id="date_products_box" class="col-md-5 col-sm-12 mr-5 d-inline-block vertical-middle text-left">
            <h6 class="date-received ml-24p">{{ $delivery->updated_at->toDateString() }}</h6>
            <?php $productId = "products".$id ?>
            <button type="button" class="date-received btn btn-default text-brown cursor-pointer button-no-decoration px-0" data-toggle="collapse" data-target=#{{$productId}} aria-expanded="false" aria-controls="{{$productId}}">
              <i class="fa fa-plus " aria-hidden="true"></i> Products
            </button>
            <div class="collapse" id={{$productId}}>
              <div id="products" class="card card-block ingredients-card">
                  @foreach ($delivery->box->products as $product)
                    <span class="text-left"><i class="fa fa-envira" aria-hidden="true"></i>{{ $product->name }}</span>
                  @endforeach
              </div>
            </div>

            @if ($delivery->box->id != Auth::user()->deliveries->last()->box->id)
              <div class="mt-5 ml--44"><img src="/img/user/2.png" class="mx-auto hidden-md-down" alt=""></div>
            @endif

          </div>

          <?php $id++ ?>

        @endforeach
      </div><!-- / row-->
  </div><!-- / container -->

@endsection
