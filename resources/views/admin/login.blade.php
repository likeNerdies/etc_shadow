<!-- Admin login -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/css/libraries/bootstrap4/bootstrap.min.css">
    <title>Admin</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-6 col-xs-12 text-center">

          <div class="panel panel-default">
            <div class="panel-heading text-left"><h4>Log in, Admin</h4></div>

            <div class="panel-body mt-4">
              <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="control-label float-left">E-Mail Address</label>

                  <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="control-label float-left">Password</label>
                  <a class="btn btn-link float-right forgottenPassword" href="">
                    Forgot Your Password?
                  </a>
                  <di>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <div class="text-left">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                      Login
                    </button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>

  </body>
</html>
