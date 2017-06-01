@extends('user.layouts.panel')
@section('title','Profile')
@section('right-panel')
  <div class="container text-center">
      <div class="row mb-5">
          <div class="col-12">
              <h1 class="text-center lighter-font">Welcome, {{$user->name}}</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6 col-12">
            @if (Auth::user()->plan_id == null)
              <!--  Si no tiene plan, mostrar para suscribirse -->
              <h1 class="text-center red-font">@lang("user/plan/plan.noPlan")</h1>
              <h4 class="text-center mt-3">@lang("user/plan/plan.wannaSubscribe")</h4>
            @else
              <!-- Si tiene plan, enseñar tiempo restante para la entrega de su próxima caja -->
              <div class="user-dashboard-block text-center bg-f7 p-3">
                <h4>Box coming in...</h4>
                <i class="fa fa-clock-o mr-0 fa-20" aria-hidden="true"></i>
                <h5 id="timeRemaining">...</h5>
              </div>
            @endif
          </div>
          <div class="col-md-6 col-12" style="background: beige; padding: 2.5%"></div>
      </div>
      <div class="row mt-10">
        <h3 class="col-12 text-center">Your box chronology</h3>
        @foreach (Auth::user()->deliveries as $delivery)
          <!-- Si ya ha recibido anteriormente cajas -->
          <div class="mt-5 mb-100p col-12 mx-auto">
            <div class="mr-5 d-inline-block">
              <img src="/img/logo.png" alt="">
            </div>
            <div class="mr-5 d-inline-block vertical-middle">
              <h6 class="">{{ $delivery->updated_at->toDateString()}}</h6>
              <a href="#">Products in the box</a>
            </div>
          </div>
          <img src="/img/user/2.png" class="mx-auto" alt="">

        @endforeach
      </div>
  </div>

@endsection
