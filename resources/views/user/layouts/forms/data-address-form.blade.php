<form class="form-horizontal" role="form" method="POST" action="{{ route('user-address') }}">
    {{ csrf_field() }}
    @if(Auth::user()->address!=null)
    {{method_field('PUT')}}
        <input type="hidden" name="id" value="{{Auth::user()->address->id}}">
    @endif

    <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
        <label for="street" class="col-md-4 control-label">@lang('forms.street')</label>

        <div class="col-md-6">
            @if (count($errors) > 0 || Auth::user()->address==null)
                <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required autofocus
                       placeholder="@lang('forms.ph_street')">
            @else
                <input id="street" type="text" class="form-control" name="street" value="{{ Auth::user()->address->street }}" required
                       autofocus placeholder="@lang('forms.ph_street')">
            @endif

            @if ($errors->has('street'))
                <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('building_number') ? ' has-error' : '' }}">
        <label for="building_number" class="col-md-4 control-label">@lang('forms.building_number')</label>

        <div class="col-md-3" style="margin-top: 7px">
            @if (count($errors) > 0 || Auth::user()->address==null)
                <input id="building_number" type="text" class="form-control" name="building_number" value="{{ old('building_number') }}" required
                       autofocus placeholder="@lang('forms.ph_building_number')">
            @else
                <input id="building_number" type="text" class="form-control" name="building_number" value="{{ Auth::user()->address->building_number }}" required
                       autofocus placeholder="@lang('forms.ph_building_number')">
            @endif

            @if ($errors->has('building_number'))
                <span class="help-block">
                                        <strong>{{ $errors->first('building_number') }}</strong>
                                    </span>
            @endif
        </div>

        <label for="building_block" class="col-md-4 control-label"></label>
        <div class="col-md-3 {{ $errors->has('building_block') ? ' has-error' : '' }}">
            @if(count($errors) > 0 || Auth::user()->address==null)
                <input id="building_block" type="text" class="form-control" name="building_block"
                       value="{{ old('first_surname') }}"  autofocus placeholder="@lang('forms.ph_building_block')">
            @else
                <input id="building_block" type="text" class="form-control" name="building_block"
                       value="{{ Auth::user()->address->building_block }}"  autofocus placeholder="@lang('forms.ph_building_block')">
            @endif

            @if ($errors->has('building_block'))
                <span class="help-block">
                                        <strong>{{ $errors->first('building_block') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('floor') ? ' has-error' : '' }}">
        <label for="floor" class="col-md-4 control-label">@lang('forms.floor')/@lang('forms.door')</label>

        <div class="col-md-3" style="margin-top: 7px">
            @if (count($errors) > 0 || Auth::user()->address==null)
                <input id="floor" type="text" class="form-control" name="floor" value="{{ old('floor') }}"
                       autofocus placeholder="@lang('forms.ph_floor')">
            @else
                <input id="floor" type="text" class="form-control" name="floor" value="{{ Auth::user()->address->floor }}"
                       autofocus placeholder="@lang('forms.ph_floor')">
            @endif

            @if ($errors->has('floor'))
                <span class="help-block">
                                        <strong>{{ $errors->first('floor') }}</strong>
                                    </span>
            @endif
        </div>

        <label for="door" class="col-md-4 control-label"></label>
        <div class="col-md-3 {{ $errors->has('door') ? ' has-error' : '' }}">
            @if(count($errors) > 0 || Auth::user()->address==null)
                <input id="door" type="text" class="form-control" name="door"
                       value="{{ old('door') }}"  autofocus placeholder="@lang('forms.ph_door')">
            @else
                <input id="door" type="text" class="form-control" name="door"
                       value="{{ Auth::user()->address->door }}"  autofocus placeholder="@lang('forms.ph_door')">
            @endif

            @if ($errors->has('door'))
                <span class="help-block">
                                        <strong>{{ $errors->first('door') }}</strong>
                                    </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
        <label for="postal_code" class="col-md-4 control-label">@lang('forms.postal_code')</label>

        <div class="col-md-6">
            @if(count($errors) > 0 || Auth::user()->address==null)
                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}" required placeholder="@lang('forms.ph_postal_code')">
            @else
                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ Auth::user()->address->postal_code }}"
                       required placeholder="@lang('forms.ph_postal_code')">
            @endif
            @if ($errors->has('postal_code'))
                <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
        <label for="town" class="col-md-4 control-label">@lang('forms.town')</label>

        <div class="col-md-6">
            @if(count($errors) > 0 || Auth::user()->address==null)
                <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}" required placeholder="@lang('forms.ph_town')">
            @else
                <input id="town" type="text" class="form-control" name="town" value="{{ Auth::user()->address->town }}"
                       required placeholder="@lang('forms.ph_town')">
            @endif
            @if ($errors->has('town'))
                <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
        <label for="province" class="col-md-4 control-label">@lang('forms.province')</label>

        <div class="col-md-6">
            @if(count($errors) > 0 || Auth::user()->address==null)
                <input id="province" type="text" class="form-control" name="province" value="{{ old('province') }}" required placeholder="@lang('forms.ph_province')">
            @else
                <input id="province" type="text" class="form-control" name="province" value="{{ Auth::user()->address->province }}"
                       required placeholder="@lang('forms.ph_province')">
            @endif
            @if ($errors->has('province'))
                <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
        <label for="country" class="col-md-4 control-label">@lang('forms.country')</label>

        <div class="col-md-6">
            @if(count($errors) > 0 || Auth::user()->address==null)
                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required placeholder="@lang('forms.ph_country')">
            @else
                <input id="country" type="text" class="form-control" name="country" value="{{ Auth::user()->address->country }}"
                       required placeholder="@lang('forms.ph_country')">
            @endif
            @if ($errors->has('country'))
                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
            @endif
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-6">
            <button type="submit" class="btn btn-primary">
                @lang('forms.save')
            </button>
        </div>
    </div>
</form>