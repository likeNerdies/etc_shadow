@extends('layouts.app')

@section('title')
  Products
@endsection

@section('content')

@include('layouts.navbar')

  <div id="main-wrapper">
    <span class="arrow"></span>
    <div id="sidebar-wrapper">
      @include('product.sidebar')
    </div>
    <div id="content-wrapper" class="text-center">
      <div class="container pb-5">
        <div class="pt-5 mb-5">
          <h1>Fall in love with our products</h1>
        </div>
            <div class="card-columns d-flex flex-row flex-wrap justify-content-center" id="products">
              @foreach ($products as $product)
              <div class="card-wrapper mx-2">
                <a href="/products/{{ $product->id }}">
                  <div class="card p-2">
                    @if(count($product->images) == 0)
                        <img src="/img/user_products/no_image_available.png" class="rounded product-img card-img-top img-fluid" alt="No image available">
                    @else
                        <div class="mt-2"><img class="rounded product-img card-img-top img-fluid" src="/products/{{$product->images->first()->id}}/image"></div>
                    @endif
                    <div class="card-block pt-1"><h4 class="card-title"> {{ $product->name }}</h4></div>
                    <div class="card-footer">
                      @if ($product->vegan == 1)
                        <p class="d-inline diet card-text"><i class="fa fa-check mx-1" aria-hidden="true"></i>Vegan</p>
                      @endif
                      @if ($product->vegetarian == 1)
                        <p class="d-inline diet"><i class="fa fa-check mx-1" aria-hidden="true"></i>Vegetarian</p>
                      @endif
                      @if ($product->organic == 1)
                        <p class="d-inline diet"><i class="fa fa-check mx-1" aria-hidden="true"></i>Organic</p>
                      @endif
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>

      </div>
    </div>
  </div>
  <!--<div class="container">


  </div> / container -->

@endsection

@section('scriptsPersonalizados')
  <script src="/js/welcome/welcome_script.js"></script>
@endsection
