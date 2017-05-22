@extends('layouts.app')
@section('title')
    Product {{$product->name}}
@endsection

@section('content')
    @include('layouts.navbar_out')
    <div id="main-wrapper">
        <div id="content-wrapper-show">
            <div id="wrapper-product" class="d-flex flex-md-row flex-column">
                <div id="wrapper-image"><!-- carousel -->
                    <div id="image" class="carousel slide h-70" data-ride="false">
                        <ol class="carousel-indicators">
                            <li data-target="#image" data-slide-to="0" class="active ci-1"></li>
                            <li data-target="#image" data-slide-to="1" class="ci-2"></li>
                            <li data-target="#image" data-slide-to="2" class="ci-3"></li>
                        </ol>

                        <div class="carousel-inner h-100" role="listbox">
                            <div class="carousel-item active ci-1">
                                <img id="img1" class="d-block img-fluid" src="/admin/products/{{$product->images->first()->id}}/image" alt="First slide">
                            </div>
                            <div class="carousel-item ci-2">
                                <img id="img2" class="d-block img-fluid" src="/admin/products/{{$product->images->first()->id}}/image" alt="Second slide">
                            </div>
                            <div class="carousel-item ci-3">
                                <img id="img3" class="d-block img-fluid" src="/admin/products/{{$product->images->first()->id}}/image" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#image" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#image" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div id="wrapper-min-img" class="d-flex flex-row justify-content-between h-30 mt-2">
                        <div id="min-img-1" style="background: light" class="w-30 h-100">
                            <img id="tg-1" data-slide="0" class="w-100 h-100" src="/admin/products/{{$product->images->first()->id}}/image" alt="First slide">
                        </div>

                        <div id="min-img-2" style="background: greenyellow;" class="w-30 h-100">
                            <img id="tg-2" data-slide="1" class="w-100 h-100" src="/admin/products/{{$product->images->first()->id}}/image" alt="First slide">
                        </div>

                        <div id="min-img-3" style="background: indianred;" class="w-30 h-100">
                            <img id="tg-3" data-slide="2" class="w-100 h-100" src="/admin/products/{{$product->images->first()->id}}/image" alt="First slide">
                        </div>
                    </div>
                </div><!-- / carousel -->

                <!-- Product information -->
                <div id="wrapper-info" class="ml-md-2 pl-5">
                    <div id="info" class="w-100 h-100 pull-right px-4">
                        <h3 class="product-name pt-5 text-center">{{$product->name}}<small class="product-brand">{{$product->brand->name}}</small></h3>
                        <h5 class="text-left mt-5">Description</h5>
                        <p class="text-justify">{{$product->description}}</p>
                        <button type="button" class="btn btn-default text-brown button-no-decoration hidden-md-up" data-toggle="collapse" data-target="#ingredients" aria-expanded="false" aria-controls="ingredients">
                          <i class="fa fa-plus" aria-hidden="true"></i> Ingredients
                        </button>
                        <div class="collapse hidden-md-up" id="ingredients">
                          <div class="card card-block ingredients-card">
                              @foreach ($product->ingredients as $ingredient)
                                <span><i class="fa fa-envira" aria-hidden="true"></i>{{ $ingredient->name }}</span>
                              @endforeach
                          </div>
                        </div>
                        <div class="ingredients hidden-md-down">
                          <h5 class="text-left mt-5 text-brown">Ingredients</h5>
                          @foreach ($product->ingredients as $ingredient)
                            <!--<i class="fa fa-thumb-tack" aria-hidden="true">-->
                            <i class="fa fa-envira" aria-hidden="true"></i>{{ $ingredient->name }}
                          @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- / content-wrapper-show -->
    </div><!-- / main-wrapper -->
@endsection

<!-- Aquí hi ha el footer -->

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script>
@endsection
