<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.update') }}">
    {{ csrf_field() }}
    {{method_field('PUT')}}
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Dni</label>

        <div class="col-md-6">
            @if (count($errors) > 0)
                <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" required autofocus
                       placeholder="document id">
            @else
                <input id="dni" type="text" class="form-control" name="dni" value="{{ Auth::user()->dni }}" required
                       autofocus placeholder="document id">
            @endif

            @if ($errors->has('dni'))
                <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            @if (count($errors) > 0)
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                       autofocus>
            @else
                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required
                       autofocus>
            @endif

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('first_surname') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">First surname</label>
        <div class="col-md-6">
            @if(count($errors)>0)
                <input id="first_surname" type="text" class="form-control" name="first_surname"
                       value="{{ old('first_surname') }}" required autofocus>
            @else
                <input id="first_surname" type="text" class="form-control" name="first_surname"
                       value="{{ Auth::user()->first_surname }}" required autofocus>
            @endif

            @if ($errors->has('first_surname'))
                <span class="help-block">
                                        <strong>{{ $errors->first('first_surname') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('second_surname') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Second surname</label>
        <div class="col-md-6">
            @if(count($errors)>0)
                <input id="second_surname" type="text" class="form-control" name="second_surname"
                       value="{{ old('second_surname') }}" autofocus>
            @else
                <input id="second_surname" type="text" class="form-control" name="second_surname"
                       value="{{ Auth::user()->second_surname }}" autofocus placeholder="second surname">
            @endif

            @if ($errors->has('second_surname'))
                <span class="help-block">
                                        <strong>{{ $errors->first('second_surname') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            @if(count($errors)>0)
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            @else
                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                       required>
            @endif
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        <label for="phone_number" class="col-md-4 control-label">Phone number</label>
        <div class="col-md-6">
            @if(count($errors)>0)
                <input id="phone_number" type="text" class="form-control" name="phone_number"
                       value="{{ old('phone_number') }}" autofocus placeholder="phone number">
            @else
                <input id="phone_number" type="text" class="form-control" name="phone_number"
                       value="{{ Auth::user()->phone_number }}" autofocus placeholder="phone number">
            @endif

            @if ($errors->has('phone_number'))
                <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-6">
            <button type="button" id="admin_cofig_data" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
</form>