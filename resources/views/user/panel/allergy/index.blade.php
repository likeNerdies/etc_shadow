@extends('user.layouts.panel')
@section('right-panel')
{{--


INFO AQUI---...NOS PREOCUPAMOS POR TU SALUD BLABLA... BLABLA..POR ESO QUEREMOS QUE MARQUES LAS ALERGIAS QUE TIENE PARA :..BLABLA OFRECERTE UNA CAJA MAS PERSONALIZADA BLABLA

BOTON DE YESNO  NADA PERCEPTIBLE

--}}
<div class="ml-15">
  <div class="col-md-10 text-center">


    <table class="table ">
      <th class="text-center">Allergy</th>
      <th class="text-center">Do you have it?</th>

      {{ csrf_field() }}
      @php
        foreach ($allergies as $allergy){
              $hasAllergies=Auth::user()->allergies;
              $exists=false;
              $class="hasnotAllergy";
              $text=" No ";
              for ($i=0;$i<count($hasAllergies)&& !$exists;$i++){
                      if($allergy->id == $hasAllergies[$i]->id){
                          $exists=true;
                           $class="hasAllergy";
                           $text=" Yes ";
                      }
              }
              echo '<tr><td id="'. $allergy->id .'">'.$allergy->name .'</td><td class="'.$class.' allergy"><strong>'.$text .'</strong></td></tr>';
        }
      @endphp
  </table>
  </div>
</div>

@endsection

@section('scriptsPersonalizados')
  <script src="/js/user/allergies/allergies.js"></script>
@endsection
