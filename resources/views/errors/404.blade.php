@extends('layouts.app')
@section('title','not found')
@section('content')
<div class="row text-center">
    <div class="col-12">

        <h1 class="mt-5">Oops!</h1>

        <h2>404 Not Found</h2>

        <div class="error-details mt-5">
            Sorry, an error has occured, Requested page not found!
        </div>
        <div class="error-actions mt-4">
            <a href="/" class="btn btn-primary btn-lg">
              Take Me Home
            </a>
            <a href="/help" class="btn btn-default btn-lg">
              Contact Support
            </a>
        </div>
    </div>
</div>
@endsection
