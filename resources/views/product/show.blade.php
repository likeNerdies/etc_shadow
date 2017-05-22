@extends('layouts.app')
@section('title')
    Product {{$product->name}}
@endsection

@section('content')
    @include('layouts.navbar_out')
    <div id="main-wrapper">
        <span style="display:none;" class="arrow"></span>
        <div id="sidebar-wrapper">
            <div class="container-fluid">
                @include('product.sidebar')
                    <!--<div class="icon d-flex align-items-center">
                        <i class="fa fa-angle-right fa-2x toggle" aria-hidden="true"></i>
                    </div>-->
            </div>
        </div>

        <div id="content-wrapper">
            <div class="container-fluid">
                <div id="wrapper-product" class="d-flex flex-md-row flex-column">
                    <div id="wrapper-image">
                        <div id="image" class="carousel slide h-70" data-ride="false">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner h-100" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid img-responsive" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="https://images.pexels.com/photos/69731/pexels-photo-69731.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt="Third slide">
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
                        <div id="wrapper-min-img" class="d-flex flex-row justify-content-between h-30">
                            <div id="min-img-1" style="background: lightblue" class="w-30 h-100">

                            </div>

                            <div id="min-img-2" style="background: greenyellow;" class="w-30 h-100">

                            </div>

                            <div id="min-img-3" style="background: indianred;" class="w-30 h-100">

                            </div>
                        </div>
                    </div>

                    <div id="wrapper-info" class="ml-md-2">
                        <div id="info" class="w-80 h-100" style="background: lightgrey;">
                            <h3 class="text-left pt-3">{{$product->name}}</h3>
                            <h4 class="text-left mt-5">Description</h4>
                            <p class="text-left">{{$product->description}}</p>

                            <h4 class="text-left mt-4">Price <span style="color: darkorange">{{$product->price}}€</span></h4>
                        </div>
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