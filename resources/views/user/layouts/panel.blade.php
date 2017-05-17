@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('user.layouts.sidebar'){{--incluimos el layout side aqui--}}
            </div>
            <div class="col-md-9">
                @yield('right-panel')
            </div>
        </div>
    </div>


@endsection
