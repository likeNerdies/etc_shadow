<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/css/libraries/bootstrap4/bootstrap.min.css">

    <!-- Charts NVD3 Library -->
    <link rel="stylesheet" href="/css/libraries/nvd3/nv.d3.css">

    <!--  Light Bootstrap Table core CSS  -->
    <link href="/css/admin/style.css" rel="stylesheet"/>

    <!--  Fonts and icons -->
    <link rel="stylesheet" href="/css/libraries/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    @yield('styles')

    <title>@yield('title')</title>
</head>
<body>

<style>
  #donut svg, #subscribers svg {
    height: 400px;
  }
</style>

@include('admin.layouts.sidebar')

<div id="wrapper">
    <div class="container">
        @yield('right-panel')
    </div>
</div>

<!-- <FLOATING LOG OUT BUTTON> -->
<div class="logout-wrapper">
    <form class="floating-form" action="/logout" method="post">
        {{ csrf_field() }}
        <a class="logout-btn"  href="#">
            <i class="fa fa-sign-out media-767-delete fa-2x" aria-hidden="true"></i>
        </a>
    </form>
</div>
<!-- </FLOATING LOG OUT BUTTON> -->


<script src="{{asset('/js/libraries/jquery/jquery-3.2.1.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{asset('/js/libraries/tether/tether.js')}}"></script><!-- IMPORTANT: Always before the bootstrap file -->
<script src="{{asset('/js/libraries/bootstrap4/bootstrap.js')}}"></script>
<script src="{{asset('/js/admin/light-bootstrap-dashboard.js')}}"></script>
<script src="{{asset('/js/validations/validator.js')}}"></script><!-- Validaciones campos formularios -->

@yield('scripts')

</body>
</html>
