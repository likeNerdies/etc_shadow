@extends('user.layouts.panel')

@section('right-panel')
  <!--<div class="row justify-content-center"></div>-->
  <div class="container mt-5">
    <h1 class="text-center">Welcome, {{$user->name}}</h1>
    <div class="row">
      <div class="col-12">
        <div class="mt-4" style="width: 100%;height: 100%; background: grey">
          <h2 class="text-center p-4" style="color: white;">Useful info user</h2>
        </div>
      </div>
    </div>
  </div>

@endsection
