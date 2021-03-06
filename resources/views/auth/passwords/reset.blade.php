@extends('layouts.app')
@section('title','Reset password')
@section('content')
<div class="container">
    @include('layouts.navbar')
    @if(!Auth::check())
        @include('layouts.register')
        @include('layouts.login')
    @endif
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-6 col-xs-12 text-center">

            <div class="panel panel-default">
                <div class="panel-heading"><h4>@lang('login.reset_pw')</h4></div>

                <div class="panel-body mt-4">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label float-left">@lang('login.email')</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label float-left">@lang('login.password')</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label float-left">@lang('login.passwordConfirm')</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    @lang('login.reset')
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