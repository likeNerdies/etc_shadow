@extends('user.layouts.panel')
@section('title','My data')
@section('right-panel')
<div style="height: auto; background: red;" class="container justify-content-center">
  <div class="row">
    <div style="height: 300px; background: greenyellow;" class="col-md-8"></div>
    <div style="height: 300px; background: lightblue;" class="col-md-4">
      <h1>9.99€</h1>
    </div>
  </div>
  <div class="row">
    <div style="height: 200px; background: blanchedalmond;" class="col-md-8"></div>
    <div style="height: 200px; background: navajowhite;" class="col-md-4 ">
      <div style="width: 90%;height: 100px; background: aquamarine;" class="mx-auto my-5"></div>
    </div>
  </div>
</div>
@endsection


{{--@section('more-scripts-for-user-panel')
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
@endsection--}}