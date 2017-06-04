@extends('user.layouts.panel')
@section('title','My allergies')
@section('right-panel')
<div class="ml-5rem">
  <div class="col-md-10 text-center">

    <div class="alert alert-warning mb-5">
      <h5 class="allergy-ingredient-warning text-warning"><strong>@lang('user/allergy/allergy.hey')</strong> @lang('user/allergy/allergy.make_sure')</h5>
    </div>

    <div class="error mt-3 text-center"></div>

    <table class="table">
      <th class="text-center">@lang('user/allergy/allergy.allergy')</th>
      <th class="text-center">@lang('user/allergy/allergy.haveit')</th>

      {{ csrf_field() }}
      @php

      $contador=0;
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
              if($contador==0){
               $text=_t("Click here",[],Session::get('locale')) ;
              }else{
                $text="";
              }
              $contador++;

              for ($i=0;$i < count($hasAllergies)&& !$exists;$i++){
                    if($allergy->id == $hasAllergies[$i]->id){
                          $exists=true;
                          $class="hasAllergy";
                          $text="Yes";
                    }
              }
              echo '<tr><td id="'. $allergy->id .'">'._t($allergy->name,[],Session::get('locale')) .'</td><td class="'.$class.' allergy" style="cursor: pointer"><strong>'.$text .'</strong></td></tr>';
        }
      @endphp
  </table>
  </div>
</div>

@endsection

@section('more-scripts-for-user-panel')
  <script src="/js/user/allergies/allergies.js"></script>
@endsection
