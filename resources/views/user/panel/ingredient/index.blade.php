@extends('user.layouts.panel')
@section('title','My ingredients')
@section('right-panel')
    <div class="container ml-3rem">
        <div class="row">
            <div class="col-11 offset-sm-1 mx-auto text-center">
                <div class="alert alert-warning mb-5" role="alert">
                    <h5 class="allergy-ingredient-warning text-warning"><strong>@lang('user/ingredient/ingredient.hey')</strong> @lang('user/ingredient/ingredient.make_sure')</h5>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-11 col-12 mx-auto">
              <div class="error mt-3 text-center"></div>
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
                              echo  ' <img src="/user/panel/ingredients/'.$ingredient->id .'/image" class="rounded card-img-top ingredient-img img-responsive mx-auto py-3" alt="'. _t($ingredient->name,[],Session::get('locale')).'">';
                              echo ' <div class="card-footer">';
                              echo '<small>', _t($ingredient->name,[],Session::get('locale')),'</small>';
                              echo ' </div> </div> </div>';

                        }
                    @endphp
                </div>
            </div>
        </div>
    </div>
@endsection

@section('more-scripts-for-user-panel')
    <script src="/js/user/ingredients/ingredients.js"></script><!-- Includes ajax to save the unliked ingredients -->
@endsection
