@extends('user.layouts.panel')
@section('right-panel')

    <div class="ml-15">


        <div class="card-columns text-center row">
            {{ csrf_field() }}
            @php
                foreach ($ingredients as $ingredient){
                      $userUnlikeIngredients=Auth::user()->ingredients;
                      $exists = false;
                      $class = "like";
                      for ($i = 0; $i <count($userUnlikeIngredients) && !$exists; $i++) {
                              if ($ingredient->id == $userUnlikeIngredients[$i]->id) {
                                  $exists = true;
                                   $class = "unlike";
                              }
                      }
                      echo  '<div id="'.$ingredient->id.'" class="card p-2 col-md-3 mx-1 '.$class.'">';
                      echo  ' <img src="/user/panel/ingredients/'.$ingredient->id .'/image" class="rounded card-img-top ingredient-img img-fluid pt-3 pb-3" alt="'. $ingredient->name.'">';
                      echo ' <div class="card-footer">';
                      echo '<small>', $ingredient->name,'</small>';
                      echo ' </div> </div>';

                }
            @endphp
        </div>

    </div>

@endsection

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script><!-- Includes navbar animations -->
    <script src="/js/user/ingredients/ingredients.js"></script><!-- Includes ajax to save the unliked ingredients -->
@endsection
