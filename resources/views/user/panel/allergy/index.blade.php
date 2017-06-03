@extends('user.layouts.panel')
@section('title','My allergies')
@section('right-panel')
<div class="ml-5rem">
  <div class="col-md-10 text-center">

    <div class="alert alert-warning mb-5">
      <h5 class="allergy-ingredient-warning text-warning"><strong>Hey there!</strong> To make you sure we don't sent you stuff you're alergic at, please select your allergies on the list!</h5>
    </div>

    <div class="error mt-3 text-center"></div>

    <table class="table">
      <th class="text-center">Allergy</th>
      <th class="text-center">Do you have it?</th>

      {{ csrf_field() }}
      @php

        foreach ($allergies as $allergy){
              //$cont = 0;
              $hasAllergies=Auth::user()->allergies;
              $exists=false;
              $class="hasnotAllergy";
              /*if ($cont == 0) { // First allergy
                $text = "Click here to mark the allergy";
              } else {
                $text="";
              }
              $cont++;*/
              $text="";
              for ($i=0;$i < count($hasAllergies)&& !$exists;$i++){
                    if($allergy->id == $hasAllergies[$i]->id){
                          $exists=true;
                          $class="hasAllergy";
                          $text="Yes";
                    }
              }
              echo '<tr><td id="'. $allergy->id .'">'.$allergy->name .'</td><td class="'.$class.' allergy" style="cursor: pointer"><strong>'.$text .'</strong></td></tr>';
        }
      @endphp
  </table>
  </div>
</div>

@endsection

@section('more-scripts-for-user-panel')
  <script src="/js/user/allergies/allergies.js"></script>
@endsection
