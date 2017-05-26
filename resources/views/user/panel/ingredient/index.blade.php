@extends('user.layouts.panel')
@section('right-panel')

    <div class="ml-15">


        <div class="card-columns text-center row">
            {{ csrf_field() }}
            @php
                foreach ($ingredients as $ingredient){
                      $userUnlikeIngredients=Auth::user()->ingredients;
                      $exists=false;
                      $style="border:1px solid #42aa55";
                      $class="like";
                      for ($i=0;$i<count($userUnlikeIngredients)&& !$exists;$i++){
                              if($ingredient->id == $userUnlikeIngredients[$i]->id){
                                  $exists=true;
                              }
                      }
                    if($exists){
                         $style="border:1px solid #bf2c1b";
                         $class="unlike";
                    }
                      echo  '<div id="'.$ingredient->id.'" class="card p-2 col-md-3 mx-1 '.$class.'" style="'.$style.'">';
                      echo  ' <img src="/user/panel/ingredients/'.$ingredient->id .'/image" class="rounded card-img-top ingredient-img img-fluid pt-3 pb-3" alt="'. $ingredient->name.'">';
                      echo ' <div class="card-footer">';
                      echo '<small>', $ingredient->name,'</small>';
                      echo ' </div> </div>';

                }
            @endphp

            {{--      <div id=" {{ $ingredient->id }} " class="card p-2 col-md-3 mx-1">
                    <img src="/user/panel/ingredients/{{ $ingredient->id }}/image" class="rounded card-img-top ingredient-img img-fluid pt-3 pb-3" alt=" {{ $ingredient->name }} ">
                    <div class="card-footer">
                        <small> {{ $ingredient->name }} </small>
                    </div>
                  </div>
          --}}
        </div>

    </div>

@endsection

@section('scriptsPersonalizados')
    <script src="/js/user/ingredients/ingredients.js"></script>
@endsection
