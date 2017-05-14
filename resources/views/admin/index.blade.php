<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  @yield('styles')

  <!-- Right panel CSS -->
  <link rel="stylesheet" href="/css/admin/right_panel.css">

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="/css/libraries/bootstrap4/bootstrap.min.css">

  <!-- Animation library for notifications   -->
  <link href="/css/admin/libraries/animate/animate.min.css" rel="stylesheet"/>

  <!--  Light Bootstrap Table core CSS  -->
  <link href="/css/admin/style.css" rel="stylesheet"/>

  <!--  Fonts and icons -->
  <link rel="stylesheet" href="/css/libraries/font-awesome-4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->
  <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
  <!--<link href="/css/admin/style.css" rel="stylesheet" />-->
  <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->

  <title>@yield('title')</title>
</head>
<body>
  <div class="wrapper container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="navButton">
          <span class="text-left"><p>No Name</p></span>
          <a class="btn btn-default toggle-element pull-right"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-md-3 px-0">
        @include('admin.layouts.sidebar')
      </div>

      <div class="col-md-9 col-xs-12 mt-5">
        @yield('right-panel')
      </div>
    </div>
  </div>

  <script src="{{asset('/js/libraries/jquery/jquery-3.2.1.js')}}"></script>
  <script src="{{asset('/js/libraries/tether/tether.js')}}"></script><!-- IMPORTANT: Always before the bootstrap file -->
  <script src="{{asset('/js/libraries/bootstrap4/bootstrap.js')}}"></script>
  @yield('scripts');
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>-->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>-->

</body>
</html>
