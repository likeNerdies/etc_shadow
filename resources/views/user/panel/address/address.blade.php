@extends("user.layouts.panel")

@section("right-panel")
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                @include("user.layouts.forms.data-address-form")
            </div>

        </div>
    </div>
@endsection