@extends('user.layouts.panel')


@section('panel-right')

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h2>Welcome home <strong>{{Auth::user()->name}}</strong></h2>
        </div>
    </div>
</div>

@endsection