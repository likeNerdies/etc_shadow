@extends('layouts.app')
@section('title')
    Product {{$product->name}}
@endsection

@section('content')
    @include('layouts.navbar_out')
    <div id="main-wrapper">
        <div id="content-wrapper-show">
            <div id="wrapper-product" class="d-flex flex-md-row flex-column">
                <div id="wrapper-image">
                    <div id="image" class="carousel slide h-70" data-ride="false">
                        <ol class="carousel-indicators">
                            <li data-target="#image" data-slide-to="0" class="active ci-1"></li>
                            <li data-target="#image" data-slide-to="1" class="ci-2"></li>
                            <li data-target="#image" data-slide-to="2" class="ci-3"></li>
                        </ol>

                        <!--<div class="carousel-inner h-100" role="listbox">
                            <div class="carousel-item active ci-1">
                                <img id="img1" class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt="First slide">
                            </div>
                            <div class="carousel-item ci-2">
                                <img id="img2" class="d-block img-fluid" src="https://images.pexels.com/photos/31105/pexels-photo-31105.jpg?w=1260&h=750&auto=compress&cs=tinysrgb" alt="Second slide">
                            </div>
                            <div class="carousel-item ci-3">
                                <img id="img3" class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt="Third slide">
                            </div>
                        </div>-->
                        <div class="carousel-inner h-100" role="listbox">
                            <div class="active carousel-item" data-slide-number="0">
                                <img class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                            </div>

                            <div class="carousel-item" data-slide-number="1">
                                <img class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                            </div>

                            <div class="carousel-item" data-slide-number="2">
                                <img class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                            </div>

                        </div><!-- Carousel nav -->
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
                        <div id="min-img-1" class="w-31 h-100">
                            <a id="carousel-selector-0">
                                <img class="w-100 h-100" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                            </a>
                        </div>

                        <div id="min-img-2" class="w-31 h-100">
                            <a id="carousel-selector-1">
                                <img class="w-100 h-100" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                            </a>
                        </div>

                        <div id="min-img-3" class="w-31 h-100">
                            <a id="carousel-selector-2">
                                <img class="w-100 h-100" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="wrapper-info" class="ml-md-2">
                    <div id="info" class="w-80 h-100 pull-right" style="background: lightgrey;">
                        <h3 class="text-left pt-3">{{$product->name}}<small style="font-size: 20px !important; margin-left: 10px;">{{$product->brand->name}}</small></h3>
                        <h5 class="text-left mt-5">Description</h5>
                        <p class="text-left">{{$product->description}}</p>

                        <h5 class="text-left mt-4 pb-4">Price <span style="color: darkorange">{{$product->price}}€</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<!-- Aquí hi ha el footer -->

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script>
@endsection