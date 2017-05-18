@extends('admin.layouts.app')
@section('title','Configuration')
@section('right-panel')

    <h2 class="text-left mt-4">Admin Configuration</h2>
    <hr>
<!--añadir estilos y cosas-->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('admin.configuration.layouts.data-personal-form')
            <!--añadir estilos y cosas-->
@endsection

@section('scripts')
   <!-- <script src="{{asset('/js/admin/brand/ajax-crud.js')}}"></script>-->


@endsection
