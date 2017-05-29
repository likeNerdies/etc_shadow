<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modalLoginLabel">@lang('login.login')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- / Header -->

      <!-- Body -->
      <div class="modal-body justify-content-center">
        <form class="form-horizontal" role="form" method="POST" id="loginForm" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group" id="email-div">
            {{--    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">--}}
              <label for="email" class="control-label float-left">@lang('login.email')</label>

              <div class="">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                {{--  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif--}}
                <span class="help-block">
                  <strong id="form-errors-email"></strong>
                </span>
                <!--<span class="help-block small">Your email</span>-->
              </div>
            </div>

            <div class="form-group" id="password-div">
              {{--   <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}"> --}}
                <label for="password" class="control-label float-left">@lang('login.password')</label>
                <a class="btn btn-link float-right forgottenPassword" href="{{route('password.request')}}">
                  @lang('login.passwordForgot')?
                </a>
                <div>
                  <input id="password" type="password" class="form-control" name="password" required>

                  {{--
                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  --}}

                </div>
              </div>
              <div class="form-group" id="login-errors">
                <span class="help-block">
                  <strong id="form-login-errors"></strong>
                </span>
              </div>

              <div class="form-group">
                <div class="text-left">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('login.rememberMe')
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">
                    @lang('login.login')
                  </button>
                </div>
              </div>

            </form>
          </div>
          <!-- / Body -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
