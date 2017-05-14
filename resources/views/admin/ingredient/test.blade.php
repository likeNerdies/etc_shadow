@extends('admin.index')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('panel-right')
<div>

</div>
@if(count($errors))

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.

        <br/>

        <ul>

            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>

            @endforeach

        </ul>



    </div>

@endif
@foreach($ingredients as $ingredient)
    {{$ingredient->name}} <hr>
    @foreach($ingredient->allergies as $allergy)
        allergie : {{$allergy->name}}
    @endforeach
@endforeach
    <form method="post" action="/admin/ingredients">
        <input type="text" name="name">
        <div class="form-group">
            <label for="tag_list">Tags:</label>
            <select id="tag_list" name="allergies[]" class="form-control" multiple></select>
        </div>
        <input type="submit" value="sub">
        {{csrf_field()}}
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#tag_list').select2({
        placeholder: "Choose allergies...",
        minimumInputLength: 1,
        ajax: {
            url: "/search/allergySelect",
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
</script>
@endsection