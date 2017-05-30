@extends("user.layouts.panel")

@section("right-panel")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include("user.layouts.forms.data-address-form")
            </div>
        </div>
    </div>
@endsection
@section('more-scripts-for-user-panel')
    <script src="/js/user/data/data.js"></script><!-- Includes ajax to save the unliked ingredients -->
@endsection