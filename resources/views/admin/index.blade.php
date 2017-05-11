<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  	<title>Light Bootstrap Dashboard by Creative Tim</title>

  	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />


      <!-- Animation library for notifications   -->
      <link href="/css/admin/style.css" rel="stylesheet" />
      <link href="/css/admin/animate.min.css" rel="stylesheet"/>

      <!--  Light Bootstrap Table core CSS    -->
      <link href="/css/admin/light-bootstrap-dashboard.css" rel="stylesheet"/>

      <!--     Fonts and icons     -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      <link href="/css/admin/pe-icon-7-stroke.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.sidebar')
            </div>
            <div class="col-md-9">
                <!--@yield('panel-right');-->
            </div>
        </div>
    </div>
  </body>
</html>
