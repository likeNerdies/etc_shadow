<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <link rel="icon" href="/img/title-img.png" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="/css/libraries/bootstrap4/bootstrap.min.css">

        <!-- normalize -->
        <link rel="stylesheet" href="/css/libraries/normalize/normalize.css">

        <!-- 'Welcome' style.css (Includes global navbar)-->
        <link rel="stylesheet" href="/css/style.css">

        <!-- CSS for logged in user -->
        <link rel="stylesheet" href="/css/user/style.css">

        <!-- Fonts and icons-->
        <link rel="stylesheet" href="/css/libraries/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->
        @yield('styles')
        <title> @yield('title') </title>
    </head>
    <body>
    <div id="main-app">
        @if (Route::has('login'))
            @if (Auth::check())
                <div id="sidebar-float" class="profile-content">
                  @include('user.layouts.sidebar2')
                </div>
            @endif
        @endif
