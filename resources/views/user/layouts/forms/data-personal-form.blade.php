<div class="w-80 mx-auto">
    <form class="form-horizontal" role="form" method="POST" action="">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <input type="hidden" value="{{Auth::user()->id}}" id="user_id" name="user_id">
        <div class="d-flex flex-md-row display-767-column mb-4">
            <div class="group-input">
                <label for="name" class="col-form-label">@lang('forms.dni')</label>
                @if (count($errors) > 0)
                    <input id="dni" type="text" class="form-control col-12" name="dni" value="{{ old('dni') }}" required autofocus
                           placeholder="@lang('forms.ph_dni')">
                @else
                    <input id="dni" type="text" class="form-control col-12" name="dni" value="{{ Auth::user()->dni }}" required
                           autofocus placeholder="@lang('forms.ph_dni')">
                @endif

                @if ($errors->has('dni'))
                    <span class="help-block">
                    <strong>{{ $errors->first('dni') }}</strong>
                </span>
                @endif
            </div>
            <div class="group-input ml-md-4 ml-sm-0">
                <label for="name" class="col-form-label">@lang('forms.name')</label>
                @if (count($errors) > 0)
                    <input id="name" type="text" class="form-control col-12" name="name" value="{{ old('name') }}" required
                           autofocus>
                @else
                    <input id="name" type="text" class="form-control col-12" name="name" value="{{ Auth::user()->name }}" required
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
                <label for="name" class="col-form-label">@lang('forms.first_surname')</label>
                @if (count($errors) > 0)
                    <input id="first_surname" type="text" class="form-control col-12" name="first_surname" value="{{ old('first_surname') }}" required autofocus
                           placeholder="First surname">
                @else
                    <input id="first_surname" type="text" class="form-control col-12" name="first_surname" value="{{ Auth::user()->first_surname }}" required
                           autofocus placeholder="First surname">
                @endif

                @if ($errors->has('first_surname'))
                    <span class="help-block">
                    <strong>{{ $errors->first('first_surname') }}</strong>
                </span>
                @endif
            </div>

            <div  class="group-input ml-md-4 ml-sm-0">
                <label for="name" class="col-form-label">@lang('forms.second_surname')</label>
                @if (count($errors) > 0)
                    <input id="second_surname" type="text" class="form-control col-12" name="second_surname" value="{{ old('second_surname') }}"  autofocus
                           placeholder="@lang('forms.ph_second_surname')">
                @else
                    <input id="second_surname" type="text" class="form-control col-12" name="second_surname" value="{{ Auth::user()->second_surname }}"
                           autofocus placeholder="@lang('forms.ph_second_surname')">
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
                <label for="email" class="col-form-label">@lang('forms.email')</label>
                @if (count($errors) > 0)
                    <input id="email" type="text" class="form-control col-12" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Email">
                @else
                    <input id="email" type="text" class="form-control col-12" name="email" value="{{ Auth::user()->email }}" required
                           autofocus placeholder="Email">
                @endif

                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div  class="group-input ml-md-4 ml-sm-0">
                <label for="phone_number" class="col-form-label">@lang('forms.phone_number')</label>
                @if (count($errors) > 0)
                    <input id="phone_number" type="text" class="form-control col-12" name="phone_number" value="{{ old('phone_number') }}"  autofocus
                           placeholder="@lang('forms.ph_phone_number')">
                @else
                    <input id="phone_number" type="text" class="form-control col-12" name="phone_number" value="{{ Auth::user()->phone_number }}"
                           autofocus placeholder="@lang('forms.ph_phone_number')">
                @endif

                @if ($errors->has('phone_number'))
                    <span class="help-block">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
                @endif
            </div>

        </div>

        <!-- email -->

        <div class="d-flex flex-md-row display-767-column mb-4">
            <div class="group-input mt-3">
                <button type="button" class="btn btn-primary float-right" id="btn_save">
                   @lang('forms.save')
                </button>
            </div>
        </div>
    </form>
</div>
