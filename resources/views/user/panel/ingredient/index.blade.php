@extends('user.layouts.panel')
@section('right-panel')

<form class="" action="user/panel/ingredients" method="post">
  @foreach ($ingredients as $ingredient)
    <img src="/user/panel/ingredients/{{ $ingredient->id }}/image" alt="">
  @endforeach
</form>

@endsection
