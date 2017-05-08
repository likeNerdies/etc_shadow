@extends('layouts.app');

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('user.layouts.sidebar');{{--incluimos el layout side aqui--}}
            </div>
            <div class="col-md-9">
                    @yield('panel-right');
            </div>
        </div>
    </div>


@endsection
