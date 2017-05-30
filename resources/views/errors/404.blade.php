@extends('layouts.app')
@section('title','not found')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="">
            <h1>
                Oops!</h1>
            <h2>
                404 Not Found</h2>
            <div class="error-details">
                Sorry, an error has occured, Requested page not found!
            </div>
            <div class="error-actions">
                <a href="http://www.jquery2dotnet.com" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                    Take Me Home </a><a href="http://www.healthybox.esy.es" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
            </div>
        </div>
    </div>
</div>
@endsection