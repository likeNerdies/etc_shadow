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
            <div class="container">
                <h1 class="text-center mt-4 mb-5">@lang('product/product.love_our_products')</h1>

                <div class="row pb-5">
                    <div class="col-12">
                        <div style="min-height: 600px;height: 100%;padding:2.5%; background:rgb(240,244,243);border-radius:2.5px;" class="card-columns d-flex flex-row flex-wrap justify-content-center" id="products">
                            @foreach ($products as $product)
                                <div class="card-wrapper-product mx-2 mt-2">
                                    <a href="/products/{{ $product->id }}">
                                        <div class="card p-2">
                                            @if(count($product->images) == 0)
                                                <img src="/img/user_products/no_image_available.png" class="rounded product-img card-img-top img-fluid" alt="No image available">
                                            @else
                                                <div class="mt-2"><img class="rounded product-img card-img-top img-fluid" src="/products/{{$product->images->first()->id}}/image" alt="{{ _t($product->name,[],Session::get('locale')) }}"></div>
                                            @endif
                                            <div class="card-block pt-1"><h4 class="card-title"> {{ _t($product->name,[],Session::get('locale')) }}</h4></div>
                                            <div class="card-footer">
                                                @if ($product->vegan == 1)
                                                    <p class="d-inline diet card-text"><i class="fa fa-check mx-1" aria-hidden="true"></i>@lang('product/product.vegan')</p>
                                                @endif
                                                @if ($product->vegetarian == 1)
                                                    <p class="d-inline diet"><i class="fa fa-check mx-1" aria-hidden="true"></i>@lang('product/product.vegetarian')</p>
                                                @endif
                                                @if ($product->organic == 1)
                                                    <p class="d-inline diet"><i class="fa fa-check mx-1" aria-hidden="true"></i>@lang('product/product.organic')</p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-center mt-5">
                        <nav>
                            {{ $products->links() }}
                        </nav>
                    </div>

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
