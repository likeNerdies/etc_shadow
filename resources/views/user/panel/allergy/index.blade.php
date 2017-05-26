@extends('user.layouts.panel')
@section('right-panel')

<div class="ml-15">

  <form class="" action="user/panel/allergies" method="post">
    <table class="table text-center">


      @foreach ($allergies as $allergy)
        <div class="card p-2 col-md-3 mx-1">
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
