@extends('user.layouts.panel')
@section('title','Profile')
@section('right-panel')
  <div class="container">
      <div class="row mb-5">
          <div class="col-12">
              <h1 class="text-center">Welcome, {{$user->name}}</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6 col-12" style="background: red; padding: 2.5%"></div>
          <div class="col-md-6 col-12" style="background: beige; padding: 2.5%"></div>
      </div>
      <div class="row mt-4">
          <div class="col-md-6 col-12" style="background: blanchedalmond; padding: 2.5%"></div>
          <div class="col-md-6 col-12" style="background: gold; padding: 2.5%"></div>
      </div>
  </div>

@endsection
