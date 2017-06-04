@extends('admin.layouts.app')
@section('title','Box')
@section('right-panel')
  <div class="wrapper-content">

    <h2 class="text-left mt-4">Box</h2>
    @foreach($boxes as $box)
      {{$box->created_at}}
    @endforeach
  </div>


@endsection

@section('scripts')

@endsection
