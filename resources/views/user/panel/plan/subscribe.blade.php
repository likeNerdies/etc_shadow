@extends('user.layouts.panel')
@section('title','My data')
@section('right-panel')
<div style="height: auto;" class="container justify-content-center">
  <div class="row">
    <div style="height: 500px;" class="col-md-6">
      <div style="width: 85%;height: 100%;background: whitesmoke;border-top:10px solid lightgreen;box-shadow: 0px 3.5px 10.5px rgba(0, 0, 0, 0.32);" class="mx-auto">
        <div style="width: 80%; height:100%;" class="mx-auto">
          <h3 style="padding-top: 10%;">Empieza 3 meses de Premium por 0,99€</h3>
          <p style="padding-top: 7%;padding-bottom: 5%;">
            <i class="fa fa-check" aria-hidden="true"></i>
            Escucha sin distracciones de anuncios
          </p>
          <p style="padding-bottom: 5%;">
            <i class="fa fa-check" aria-hidden="true"></i>
            <span class="text-center">Pon música sin necesidad de cobertura del telefono</span>
          </p>
          <p style="padding-bottom: 10%;">
            <i class="fa fa-check" aria-hidden="true"></i>
            Salta todas las canciones que quieras
          </p>

          <hr width="80%">

          <h6 class="text-center"><strong>Despues solo 9,99 €/mes</strong></h6>
          <p class="text-center">Puedes cancelar cuando quieras</p>
        </div>
      </div>
    </div>
    <div style="height: 625px; background: lightblue;" class="col-md-6">
      <div style="width: 90%;height: 90%; background: antiquewhite;margin-top: 5%;" class="mx-auto">
        <div style="width: 100%;height: 60px; background: whitesmoke;" class="d-flex">
          <div style="width:45%; height: 100%;border-bottom: 6px solid lightgreen;" class="payment-cards d-flex justify-content-center align-items-center">
            <i style="color:#1a1f71;" class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
            <i style="color:#ff5f00;" class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
            <i style="color:#37B1E6;" class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>
          </div>

          <div style="width:45%; height: 100%;" class="payment-cards d-flex justify-content-center align-items-center">
            <i style="color: #4b7bae;" class="fa fa-paypal fa-2x" aria-hidden="true"></i>
          </div>
          <div style="width:10%;height: 100%;" class="d-flex justify-content-around align-items-center">
            <span>...</span>
          </div>
        </div>
        <div>
          <form class="form-horizontal" action="">
            <div style="width: 100%;height: 280px; background: yellowgreen;">
              <div class="d-flex justify-content-between">
                <h6 style="margin-top: 0.80rem;">Numero de tarjeta</h6>
                <i style="color: gold;" class="fa fa-lock fa-2x pt-2 mr-0" aria-hidden="true"></i>

              </div>
              <div style="padding-top: .5rem;" class="">
                <span class="lock"><input type="text" class="form-control radius-0"></span>
              </div>
              <div>

              </div>
            </div>
          </form>
        </div>
        <div></div>
      </div>
    </div>
  </div>
</div>
@endsection


{{--@section('more-scripts-for-user-panel')
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
@endsection--}}