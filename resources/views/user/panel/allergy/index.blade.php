@extends('user.layouts.panel')
@section('right-panel')

<div class="ml-15">
  <div class="col-md-10 text-center">
    <table class="table ">
      <th class="text-center">Allergy</th>
      <th class="text-center">Do you have it?</th>
      @foreach ($allergies as $allergy)
        <tr>
          <td id=" {{ $allergy->id }} ">{{ $allergy->name }}</td><td class="allergy_yesno"></td>
        </tr>
      @endforeach
  </table>
  </div>
</div>

@endsection

@section('scriptsPersonalizados')
  <script src="/js/user/allergies/allergies.js"></script>
@endsection
