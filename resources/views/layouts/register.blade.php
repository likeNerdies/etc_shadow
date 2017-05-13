<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--HEADER-->
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegisterLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--/HEADER-->

            <!--BODY-->
            <div class="modal-body">
                <form  id="registerForm" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                 {{--  <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                    <div class="form-group" id="register-name">
                        <label for="name" class="col-md-4 col-form-label">Name</label>

                        <div class="col-md-6">
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
                            <span class="help-block small">Your name</span>
                        </div>
                    </div>

                   {{-- <div class="form-group row{{ $errors->has('first_surname') ? ' has-error' : '' }}">--}}
                    <div class="form-group" id="register-surname">
                        <label for="name" class="col-md-4 col-form-label">Surname</label>

                        <div class="col-md-6">
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
                            <span class="help-block small">Your surname</span>
                        </div>
                    </div>

                    <div class="form-group" id="register-email">
                   {{-- <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                        <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required>

                         {{--   @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif--}}
                            <span class="help-block"><strong id="register-errors-email"></strong></span> <span class=
                                                                                                               "help-block small">Your email</span>
                        </div>
                    </div>

                   {{-- <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 col-form-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>--}}
                    <div class="form-group" id="register-password">
                        <label class="control-label" for="password">Password</label> <input class="form-control" id="password" name=
                        "password" placeholder="******" required="" title="Please enter your password" type="password" value="">
                        <span class="help-block"><strong id="register-errors-password"></strong></span> <span class=
                                                                                                              "help-block small">Your strong password</span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password-confirm">Confirm Password</label> <input class="form-control" id=
                        "password-confirm" name="password_confirmation" placeholder="******" type="password"> <span class=
                                                                                                                    "help-block"><strong id="form-errors-password-confirm"></strong></span>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/BODY-->
        </div>
    </div>
</div>
