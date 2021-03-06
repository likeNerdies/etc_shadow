@extends('layouts.app')
@section('title','Reset password')
@section('content')
    @include('layouts.navbar')
    @if(!Auth::check())
        @include('layouts.register')
        @include('layouts.login')
    @endif
<div class="container mt-15vh">
    <div class="row">
        <div class="col-12">
            <div class="w-100">
                <h5 class="text-center">@lang('login.reset_pw')</h5>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="d-flex flex-md-row display-767-column{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="group-input mx-auto">
                                <label for="email" class="col-form-label">@lang('login.email')</label>
                                <input id="email" type="email" class="form-control col-md-11 col-12" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex flex-md-row display-767-column mt-3">
                            <div class="group-input mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    @lang('login.send')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptsPersonalizados')
    <script src="{{asset('/js/welcome/welcome_script.js')}}"></script><!-- Includes navbar animations -->
@endsection