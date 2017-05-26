@extends('user.layouts.panel')
@section('right-panel')

<div class="ml-15">

  <form class="" action="user/panel/ingredients" method="post">
    <div class="card-columns text-center row">

      @foreach ($ingredients as $ingredient)
        <div id=" {{ $ingredient->id }} " class="card p-2 col-md-3 mx-1">
          <img src="/user/panel/ingredients/{{ $ingredient->id }}/image" class="rounded card-img-top ingredient-img img-fluid pt-3 pb-3" alt=" {{ $ingredient->name }} ">
          <div class="card-footer">
              <small> {{ $ingredient->name }} </small>
          </div>
        </div>
      @endforeach

    </div>
  </form>
</div>

@endsection

@section('scriptsPersonalizados')
  <script src="/js/user/ingredients/ingredients.js"></script>
@endsection
