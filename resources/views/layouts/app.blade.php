@include('layouts.head')
<!--
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
<body>-->

@yield('content')

@include('layouts.foot')


<!--<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>{{--JQUERY version 3.2.1 min--}}
<script src="{{ asset('js/scripts.js') }}"></script>{{--Scripts js personalizados--}}-->
