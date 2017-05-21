@extends('layouts.app')

@section('title')
  Products
@endsection

@section('content')
  @include('layouts.navbar_out')
  <div class="container">

    <div class="text-center offset-md-1 mt-5 mb-5">
      <h1>Fall in love with our products</h1>
    </div>

    <div class="row">
      <div class="col-md-2">
        @include('product.sidebar')
      </div>

      <div class="col-md-9 text-center">
        <div class="card-columns">
          @foreach ($products as $product)
            <a href="/products/{{ $product->id }}">
              <div class="card">
                @if(count($product->images) == 0)
                    <img src="/img/user_products/no_image_available.png" class="rounded product-img card-img-top img-fluid" alt="No image available">
                @else
                    <div class="mt-5"><img class="rounded card-img-top img-fluid" src="/admin/products/{{$product->images->first()->id}}/image"></div>
                @endif
                <div class="card-block">
                  <h4 class="card-title"> {{ $product->name }} </h4>
                </div>
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
          @endforeach
        </div>
      </div>

    </div>
  </div><!-- / container -->

@endsection

@section('scriptsPersonalizados')
  <script src="/js/welcome/welcome_script.js"></script>
@endsection
