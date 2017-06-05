@extends('layouts.app')
@section('title')
    Product {{$product->name}}
@endsection

@section('content')
@include('layouts.navbar')

    <div id="main-wrapper">
        <div id="content-wrapper-show">
            <div id="wrapper-product" class="d-flex flex-md-row flex-column">
                <div style="position:relative;" id="wrapper-image"><!-- carousel -->
                    <div style="position:static;" id="image" class="carousel w-80 mx-auto slide h-70" data-ride="false">
                        <ol style="top: 31rem; max-height: 10px;" class="carousel-indicators">
                            <li data-target="#image" data-slide-to="0" class="active ci-1"></li>
                            <li data-target="#image" data-slide-to="1" class="ci-2"></li>
                            <li data-target="#image" data-slide-to="2" class="ci-3"></li>
                        </ol>

                        <div class="carousel-inner w-100 mx-auto height-carousel height-min768-carousel" role="listbox">
                            <div class="active carousel-item h-100" data-slide-number="0">
                                <img class="d-block img-fluid img-480-fluid img-768-fluid" src="/products/{{$product->id}}/image/0" alt="{{_t($product->name,[],Session::get('locale'))}}">
                            </div>

                            <div class="carousel-item h-100" data-slide-number="1">
                                <img class="d-block img-fluid img-480-fluid img-768-fluid" src="/products/{{$product->id}}/image/1" alt="{{_t($product->name,[],Session::get('locale'))}}">
                            </div>

                            <div class="carousel-item h-100" data-slide-number="2">
                                <img class="d-block img-fluid img-480-fluid img-768-fluid" src="/products/{{$product->id}}/image/2" alt="{{_t($product->name,[],Session::get('locale'))}}">
                            </div>
                        </div><!-- Carousel nav -->
                        <a class="carousel-control-prev top-min768-28 top-17" href="#image" role="button" data-slide="prev">
                            <i style="color: black;" class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
                            <span class="sr-only">@lang('product/product.previous')</span>
                        </a>
                        <a style="right: -14px;" class="carousel-control-next top-17 top-min768-28" href="#image" role="button" data-slide="next">
                            <i style="color:black;" class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
                            <span class="sr-only">@lang('product/product.next')</span>
                        </a>
                    </div>

                    <div id="wrapper-min-img" class="d-flex flex-row justify-content-between h-30 mt-2">

                        <div id="min-img-1" class="w-31">
                            <a style="cursor: pointer;" class="d-flex" id="carousel-selector-0">
                                <img src="/products/{{$product->id}}/image/0" alt="{{_t($product->name,[],Session::get('locale'))}}">
                            </a>
                        </div>

                        <div id="min-img-2" class="w-31">
                            <a style="cursor: pointer;" id="carousel-selector-1">
                                <img  src="/products/{{$product->id}}/image/1" alt="{{_t($product->name,[],Session::get('locale'))}}">
                            </a>
                        </div>

                        <div id="min-img-3" class="w-31">
                            <a style="cursor: pointer;" id="carousel-selector-2">
                                <img  src="/products/{{$product->id}}/image/2" alt="{{_t($product->name,[],Session::get('locale'))}}">
                            </a>
                        </div>
                    </div>
                </div><!-- / carousel -->

                <!-- Product information -->
                <div id="wrapper-info" class="ml-md-2 pl-md-5">
                    <div id="info" class="w-100 h-100 pull-right px-4">
                        <h3 class="product-name pt-5 text-center">{{_t($product->name,[],Session::get('locale'))}}<small class="product-brand">@if(isset($product->brand->name)){{$product->brand->name}}@else  @endif</small></h3>
                        <h5 class="text-left mt-5">@lang('product/product.description')</h5>
                        <p class="text-justify">{{_t($product->description,[],Session::get('locale'))}}</p>
                        <button type="button" class="btn btn-default text-brown button-no-decoration hidden-md-up" data-toggle="collapse" data-target="#ingredients" aria-expanded="false" aria-controls="ingredients">
                          <i class="fa fa-plus" aria-hidden="true"></i> Ingredients
                        </button>
                        <div class="collapse hidden-md-up" id="ingredients">
                          <div class="card card-block ingredients-card">
                              @foreach ($product->ingredients as $ingredient)
                                <span><i class="fa fa-envira" aria-hidden="true"></i>{{ _t($ingredient->name,[],Session::get('locale')) }}</span>
                              @endforeach
                          </div>
                        </div>
                        <div class="ingredients hidden-md-down">
                          <h5 class="text-left mt-5 text-brown">@lang('product/product.ingredients')</h5>
                          @foreach ($product->ingredients as $ingredient)
                            <p><span><i class="fa fa-envira" aria-hidden="true"></i>{{ _t($ingredient->name,[],Session::get('locale')) }}</span></p>
                          @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- / content-wrapper-show -->
    </div><!-- / main-wrapper -->
@endsection

@if(!Auth::check())
    @include('layouts.register')
    @include('layouts.login')
@endif

<!-- Aquí hi ha el footer -->

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script>
@endsection
