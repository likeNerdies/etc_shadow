@if(Auth::user()->address==null)
    <h3 class="text-center">@lang("user/data/data.addAddress")</h3>
@else
    <h3 class="text-center">@lang("user/data/data.updateAddress")</h3>
@endif
<div class="error-address mt-3 text-center"></div>
<div class="w-100 m-auto">
    <form id="address_form" name="address_form" class="form-horizontal" role="form" method="POST" action="{{ route('user-address') }}">
        @if(Auth::user()->address!=null)
            {{method_field('PUT')}}
            <input type="hidden" name="id" value="{{Auth::user()->address->id}}">
        @endif
        <div class="d-flex flex-md-row display-767-column mb-4">
            <div class="group-input{{ $errors->has('street') ? ' has-error' : '' }} mar-auto">
                <label for="street" class="col-form-label">@lang('forms.street')</label>

                @if (count($errors) > 0 || Auth::user()->address==null)
                    <input id="street" type="text" class="form-control col-12" name="street" value="{{ old('street') }}" required autofocus
                           placeholder="@lang('forms.ph_street')">
                @else
                    <input id="street" type="text" class="form-control col-12" name="street" value="{{ Auth::user()->address->street }}" required
                           autofocus placeholder="@lang('forms.ph_street')">
                @endif

                @if ($errors->has('street'))
                    <span class="help-block">
                <strong>{{ $errors->first('street') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="d-flex flex-md-row display-767-column mb-4 w-sm-100 w-50 mar-auto">
            <div class="group-input">
                <label for="building_number" class="col-form-label">@lang('forms.building_number')</label>

                @if (count($errors) > 0 || Auth::user()->address==null)
                    <input id="building_number" type="text" class="form-control col-md-11" name="building_number" value="{{ old('building_number') }}" required
                           autofocus placeholder="@lang('forms.ph_building_number')">
                @else
                    <input id="building_number" type="text" class="form-control col-md-11" name="building_number" value="{{ Auth::user()->address->building_number }}" required
                           autofocus placeholder="@lang('forms.ph_building_number')">
                @endif

                @if ($errors->has('building_number'))
                    <span class="help-block">
            <strong>{{ $errors->first('building_number') }}</strong>
        </span>
                @endif
            </div>
            <div class="group-input">
                <label for="building_block" class="col-form-label">@lang('forms.building_block')</label>

                @if(count($errors) > 0 || Auth::user()->address==null)
                    <input id="building_block" type="text" class="form-control col-12" name="building_block"
                           value="{{ old('first_surname') }}"  autofocus placeholder="@lang('forms.ph_building_block')">
                @else
                    <input id="building_block" type="text" class="form-control col-12" name="building_block"
                           value="{{ Auth::user()->address->building_block }}"  autofocus placeholder="@lang('forms.ph_building_block')">
                @endif

                @if ($errors->has('building_block'))
                    <span class="help-block">
                <strong>{{ $errors->first('building_block') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="d-flex flex-md-row display-767-column mb-4 w-sm-100 w-50 mar-auto">
            <div class="group-input">
                <label for="floor" class="col-form-label">@lang('forms.floor')</label>

                @if (count($errors) > 0 || Auth::user()->address==null)
                    <input id="floor" type="text" class="form-control col-md-11" name="floor" value="{{ old('floor') }}"
                           autofocus placeholder="@lang('forms.ph_floor')">
                @else
                    <input id="floor" type="text" class="form-control col-md-11" name="floor" value="{{ Auth::user()->address->floor }}"
                           autofocus placeholder="@lang('forms.ph_floor')">
                @endif

                @if ($errors->has('floor'))
                    <span class="help-block">
                <strong>{{ $errors->first('floor') }}</strong>
            </span>
                @endif
            </div>
            <div class="group-input">
                <label for="door" class="col-form-label">@lang('forms.door')</label>

                @if(count($errors) > 0 || Auth::user()->address==null)
                    <input id="door" type="text" class="form-control col-12" name="door"
                           value="{{ old('door') }}"  autofocus placeholder="@lang('forms.ph_door')">
                @else
                    <input id="door" type="text" class="form-control col-12" name="door"
                           value="{{ Auth::user()->address->door }}"  autofocus placeholder="@lang('forms.ph_door')">
                @endif

                @if ($errors->has('door'))
                    <span class="help-block">
            <strong>{{ $errors->first('door') }}</strong>
        </span>
                @endif

            </div>
        </div>


        <div class="d-flex flex-md-row display-767-column mb-4 w-sm-100 w-50 mar-auto">
            <div class="group-input">
                <label for="postal_code" class="col-form-label">@lang('forms.postal_code')</label>

                @if(count($errors) > 0 || Auth::user()->address==null)
                    <input id="postal_code" type="text" class="form-control col-md-11" name="postal_code" value="{{ old('postal_code') }}" required placeholder="@lang('forms.ph_postal_code')">
                @else
                    <input id="postal_code" type="text" class="form-control col-md-11" name="postal_code" value="{{ Auth::user()->address->postal_code }}"
                           required placeholder="@lang('forms.ph_postal_code')">
                @endif
                @if ($errors->has('postal_code'))
                    <span class="help-block">
                <strong>{{ $errors->first('postal_code') }}</strong>
            </span>
                @endif
            </div>

            <div class="group-input">
                <label for="town" class="col-form-label">@lang('forms.town')</label>

                @if(count($errors) > 0 || Auth::user()->address==null)
                    <input id="town" type="text" class="form-control col-12" name="town" value="{{ old('town') }}" required placeholder="@lang('forms.ph_town')">
                @else
                    <input id="town" type="text" class="form-control col-12" name="town" value="{{ Auth::user()->address->town }}"
                           required placeholder="@lang('forms.ph_town')">
                @endif
                @if ($errors->has('town'))
                    <span class="help-block">
                <strong>{{ $errors->first('town') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="d-flex flex-md-row display-767-column mb-4 w-sm-100 w-50 mar-auto">
            <div class="group-input">
                <label for="province" class="col-form-label">@lang('forms.province')</label>


                @if(count($errors) > 0 || Auth::user()->address==null)
                    <input id="province" type="text" class="form-control col-md-11" name="province" value="{{ old('province') }}" required placeholder="@lang('forms.ph_province')">
                @else
                    <input id="province" type="text" class="form-control col-md-11" name="province" value="{{ Auth::user()->address->province }}"
                           required placeholder="@lang('forms.ph_province')">
                @endif
                @if ($errors->has('province'))
                    <span class="help-block">
                    <strong>{{ $errors->first('province') }}</strong>
                </span>
                @endif
            </div>
            <div class="group-input">
                <label for="country" class="col-form-label">@lang('forms.country')</label>

                @if(count($errors) > 0 || Auth::user()->address==null)
                    <input id="country" type="text" class="form-control col-12" name="country" value="{{ old('country') }}" required placeholder="@lang('forms.ph_country')">
                @else
                    <input id="country" type="text" class="form-control col-12" name="country" value="{{ Auth::user()->address->country }}"
                           required placeholder="@lang('forms.ph_country')">
                @endif
                @if ($errors->has('country'))
                    <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="d-flex flex-md-row display-767-column mb-4 mar-auto">
            <div class="group-input mx-auto">
                <label for="" class="col-form-label">
                    @if(Auth::user()->address==null)
                        <button type="button" class="btn btn-primary" id="address_button_user" value="POST">
                            @lang('forms.save')
                        </button>
                    @else
                        <button type="button" class="btn btn-primary" id="address_button_user" value="PUT">
                            @lang('forms.save')
                        </button>
                    @endif
                </label>
            </div>
        </div>
    </form>
</div>
