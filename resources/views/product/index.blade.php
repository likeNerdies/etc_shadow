@extends('layouts.app')

@section('title')
  Products
@endsection

@section('content')
  @include('layouts.navbar_out')
  <div class="container-fluid">
    <div class="offset-md-2 col-md-9 text-center mt-5 mb-5">
      <h1>Fall in love with our products</h1>
    </div>

    <div class="row">
        <div class="col-md-2"> <!-- Hambuger -->
          @include('product.sidebar')
        </div>

        <div class="col-md-9 d-flex flex-nowrap justify-content-md-between text-center">
          <div class="flex-first col-md-3 col-xs-12 product-box">
            <p>Product product</p>
          </div>
          <div class="col-md-3 product-box">
            <p>Product product</p>
          </div>
          <div class="flex-last col-md-3 product-box">
            <p>Product product</p>
          </div>
        </div>


    </div>
  </div>

@endsection

<!-- Aquí hi ha el footer -->

@section('scriptsPersonalizados')
  <script src="/js/welcome_script.js"></script>
@endsection
