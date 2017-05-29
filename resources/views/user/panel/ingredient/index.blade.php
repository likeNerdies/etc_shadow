@extends('user.layouts.panel')
@section('title','My ingredients')
@section('right-panel')
    <div class="container">
        <div class="row">
            <div class="col-11 offset-sm-1 mx-auto">
                <div class="alert alert-warning text-center" role="alert">
                    <h5 style="font-weight: normal;"><strong>Hey there!</strong> Here you can choose the ingredients you don't like, so we make sure that you don't receive those that you've chosen</h5>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-11 col-12 mx-auto">
                <div class="card-columns text-center">
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
                              echo '<div class="card-wrapper m-1">';
                              echo  '<div id="'.$ingredient->id.'" class="card mx-auto '.$class.'">';
                              echo  ' <img src="/user/panel/ingredients/'.$ingredient->id .'/image" class="rounded card-img-top ingredient-img img-responsive mx-auto py-3" alt="'. $ingredient->name.'">';
                              echo ' <div class="card-footer">';
                              echo '<small>', $ingredient->name,'</small>';
                              echo ' </div> </div> </div>';

                        }
                    @endphp
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptsPersonalizados')
    <script src="/js/welcome/welcome_script.js"></script><!-- Includes navbar animations -->
    <script src="/js/user/ingredients/ingredients.js"></script><!-- Includes ajax to save the unliked ingredients -->
@endsection
