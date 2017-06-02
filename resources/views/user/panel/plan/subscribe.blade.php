@extends('user.layouts.panel')
@section('title','My data')
@section('right-panel')
<div style="height: auto;" class="container justify-content-center ml-3rem">
  <div class="row">
    <div class="col-md-6 col-12 mb-2rem">
      <div class="subscribe-info-outer-wrapper">
        <div class="subscribe-info-inner-wrapper">
          <h3 style="padding-top: 10%;">Empieza 3 meses de Premium por 0,99€</h3>
          <p style="padding-top: 7%; padding-bottom: 5%;">
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

    <div class="col-md-6 col-12 pb-5rem">
      <div class="subscribe-pay-outer-wrapper">
        <div class="subscribe-pay-inner-wrapper mx-auto">
          <div class="subscribe-icon-wrapper">
            <div class="subscribe-icon-card-wrapper payment-cards">
              <i style="color:#1a1f71;" class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
              <i style="color:#ff5f00;" class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
              <i style="color:#37B1E6;" class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>
            </div>

            <div class="w-45 h-100 payment-cards d-flex justify-content-center align-items-center">
              <i style="color: #4b7bae;" class="fa fa-paypal fa-2x" aria-hidden="true"></i>
            </div>
            <div class="w-10 h-100 d-flex justify-content-around align-items-center">
              <span>...</span>
            </div>
          </div>
          <div>
            <form class="form-horizontal" action="">
              <div class="w-100 h-100">
                <div style="padding-top: 0.80rem;" class="d-flex justify-content-between">
                  <h6>Numero de tarjeta</h6>
                  <i style="color: gold;" class="fa fa-lock fa-2x pt-2 mr-0" aria-hidden="true"></i>
                </div>

                <div style="padding-top: .5rem;" class="">
                  <span class="lock"><input type="text" name="bank-account" class="form-control radius-0" placeholder="1111 2222 3333 4444"></span>
                </div>

                <div style="margin-top: 1.7rem;">
                  <h6>Fecha de caducidad</h6>
                  <div class="d-flex">
                    <div class="w-45">
                      <span class="caret-down"><input type="text" name="month" class="form-control radius-0" placeholder="Mes"></span>
                    </div>
                    <div style="margin-left: 3rem" class="w-45">
                      <span class="caret-down"><input type="text" name="year" class="form-control radius-0" placeholder="Año"></span>
                    </div>
                  </div>
                </div>


                <div style="margin-top: 1.7rem;">
                  <h6 >Código de seguridad</h6>
                  <div class="w-45">
                    <span class="lock-mini"><input type="text" name="sec-code" class="form-control radius-0" placeholder=""></span>
                  </div>
                </div>

                <div style="margin-top: 1.7rem">
                  <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ex harum incidunt iure quisquam quos rerum totam velit voluptas. Debitis, est magnam modi odio praesentium repellendus. Accusantium aliquid laudantium nobis.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa cumque, eaque pariatur similique tenetur? Alias aspernatur consequuntur debitis explicabo molestiae mollitia officia optio rem similique temporibus? Eos, modi, nam.
                  </p>
                </div>

                <div style="margin-top: 1.7rem; padding-bottom: 1.7rem;" class="d-flex justify-content-center">
                  <input type="submit" class="btn btn-mb-subscribe" value="EMPEZAR CON MI SPOTIFY PREMIUM">
                </div>
              </div>
            </form>
          </div>
          <div></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


{{--@section('more-scripts-for-user-panel')
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
@endsection--}}