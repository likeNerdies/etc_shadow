<div class="w-80 mx-auto">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('my-data-personal') }}">
        {{ csrf_field() }}
        {{method_field('PUT')}}

        <div class="d-flex flex-md-row display-767-column mb-4">
            <div class="group-input">
                <label for="name" class="col-form-label">Dni</label>
                @if (count($errors) > 0)
                    <input id="dni" type="text" class="form-control col-md-11 col-12" name="dni" value="{{ old('dni') }}" required autofocus
                           placeholder="document id">
                @else
                    <input id="dni" type="text" class="form-control col-md-11 col-12" name="dni" value="{{ Auth::user()->dni }}" required
                           autofocus placeholder="Document id">
                @endif

                @if ($errors->has('dni'))
                    <span class="help-block">
                    <strong>{{ $errors->first('dni') }}</strong>
                </span>
                @endif
            </div>
            <div class="group-input">
                <label for="name" class="col-form-label">Name</label>
                @if (count($errors) > 0)
                    <input id="name" type="text" class="form-control col-md-11 col-12" name="name" value="{{ old('name') }}" required
                           autofocus>
                @else
                    <input id="name" type="text" class="form-control col-md-11 col-12" name="name" value="{{ Auth::user()->name }}" required
                           autofocus>
                @endif

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!--  surname second_surname-->
        <div class="d-flex flex-md-row display-767-column mb-4">
            <div class="group-input">
                <label for="name" class="col-form-label">First surname</label>
                @if (count($errors) > 0)
                    <input id="first_surname" type="text" class="form-control col-md-11 col-12" name="first_surname" value="{{ old('first_surname') }}" required autofocus
                           placeholder="First surname">
                @else
                    <input id="first_surname" type="text" class="form-control col-md-11 col-12" name="first_surname" value="{{ Auth::user()->first_surname }}" required
                           autofocus placeholder="First surname">
                @endif

                @if ($errors->has('first_surname'))
                    <span class="help-block">
                    <strong>{{ $errors->first('first_surname') }}</strong>
                </span>
                @endif
            </div>

            <div class="group-input">
                <label for="name" class="col-form-label">Second surname</label>
                @if (count($errors) > 0)
                    <input id="second_surname" type="text" class="form-control col-md-11 col-12" name="second_surname" value="{{ old('second_surname') }}" required autofocus
                           placeholder="Second surname">
                @else
                    <input id="second_surname" type="text" class="form-control col-md-11 col-12" name="second_surname" value="{{ Auth::user()->second_surname }}" required
                           autofocus placeholder="Second surname">
                @endif

                @if ($errors->has('second_surname'))
                    <span class="help-block">
                    <strong>{{ $errors->first('second_surname') }}</strong>
                </span>
                @endif
            </div>

        </div>

        <!-- email -->

        <div class="d-flex flex-md-row display-767-column mb-4">
            <div class="group-input">
                <label for="email" class="col-form-label">Email</label>
                @if (count($errors) > 0)
                    <input id="email" type="text" class="form-control col-md-11 col-12" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Email">
                @else
                    <input id="email" type="text" class="form-control col-md-11 col-12" name="email" value="{{ Auth::user()->email }}" required
                           autofocus placeholder="Email">
                @endif

                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="group-input">
                <label for="phone_number" class="col-form-label">Phone number</label>
                @if (count($errors) > 0)
                    <input id="phone_number" type="text" class="form-control col-md-11 col-12" name="phone_number" value="{{ old('phone_number') }}" required autofocus
                           placeholder="Phone number">
                @else
                    <input id="phone_number" type="text" class="form-control col-md-11 col-12" name="phone_number" value="{{ Auth::user()->phone_number }}" required
                           autofocus placeholder="Phone number">
                @endif

                @if ($errors->has('phone_number'))
                    <span class="help-block">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
                @endif
            </div>

        </div>

        <!-- email -->

        <div class="form-group">
            <div class="col-md-6 col-md-offset-6">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
