@extends('admin.layouts.app')
@section('title','Configuration')
@section('right-panel')
    <div id="ajaxerror"></div>
    <h2 class="text-left mt-4">Admin Configuration</h2>
    <hr>
    <!--añadir estilos y cosas-->
    <div class="display-center">
        @include('admin.configuration.layouts.data-personal-form')
    </div>
    <!--añadir estilos y cosas-->
@endsection

@section('scripts')
    <script src="/js/user/data/data.js"></script><!-- Includes ajax to save the unliked ingredients -->
    <script src="{{asset('/js/admin/ajax-crud.js')}}"></script>


@endsection
