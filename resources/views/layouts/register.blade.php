<!-- Modal register -->

<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterLabel"
aria-hidden="true">
  <div class="modal-dialog justify-content-center" role="document">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modalRegisterLabel">@lang('login.register')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--/ Header-->

    <!-- Body -->
      <div class="modal-body">
        <form  id="registerForm" class="form-horizontal" method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}

          {{--  <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">--}}
            <div class="form-group" id="register-name">
              <label for="name" class="control-label float-left">@lang('login.name')</label>

              <div>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                required autofocus>

                {{-- @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif --}}
                <span class="help-block">
                  <strong id="register-errors-name"></strong>
                </span>
                <!--<span class="help-block small">Your name</span>-->
              </div>
            </div>

            {{-- <div class="form-group row{{ $errors->has('first_surname') ? ' has-error' : '' }}">--}}
              <div class="form-group" id="register-surname">
                <label for="name" class="control-label float-left">@lang('login.surname')</label>

                <div>
                  <input id="first_surname" type="text" class="form-control" name="first_surname"
                  value="{{ old('first_surname') }}" required autofocus>

                  {{--   @if ($errors->has('first_surname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('first_surname') }}</strong>
                  </span>
                  @endif--}}
                  <span class="help-block">
                    <strong id="register-errors-surname"></strong>
                  </span>
                  <!--<span class="help-block small">Your surname</span>-->
                </div>
              </div>

              <div class="form-group" id="register-email">
                {{-- <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                  <label for="email" class="control-label float-left">@lang('login.email')</label>

                  <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                    required>

                    {{--   @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif--}}
                    <span class="help-block">
                      <strong id="register-errors-email"></strong>
                    </span>
                    <!--<span class="help-block small">Your email</span>-->
                  </div>
                </div>

                {{-- <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="control-label float-left">Password</label>

                  <div>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password-confirm" class="control-label float-left">Confirm Password</label>

                  <div>
                    <input id="password-confirm" type="password" class="form-control"
                    name="password_confirmation" required>
                  </div>
                </div>--}}
                <div class="form-group" id="register-password">
                  <label for="password" class="control-label float-left">@lang('login.password')</label>
                  <input class="form-control" id="password" name="password" placeholder="***********" required="" title="Please enter your password" type="password" value="">
                  <span class="help-block">
                    <strong id="register-errors-password"></strong>
                  </span>
                  <!--<span class="help-block small">Your strong password</span>-->

                </div>
                <div class="form-group">
                  <label class="control-label float-left" for="password-confirm">@lang('login.passwordConfirm')</label>
                  <input class="form-control" id="password-confirm" name="password_confirmation" placeholder="***********" type="password">
                  <span class="help-block"><strong id="form-errors-password-confirm"></strong></span>
                </div>

                <div class="form-group">
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                      @lang('login.register')
                    </button>
                  </div>
                </div>
              </form>
            </div><!-- / Body -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
