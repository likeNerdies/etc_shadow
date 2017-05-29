<form name="reset-password" method="post" action="" id="reset-password">
    {{csrf_field()}}
    <div class="form-group">
        <label for="old_password">@lang('forms.old_password')</label>
        <input type="password" class="form-control" id="old_password" name="old_password" required placeholder="********">
    </div>
    <div class="form-group">
        <label for="new_password">@lang('forms.new_password')</label>
        <input type="password" class="form-control" id="new_password" name="password" required placeholder="********">
    </div>
    <div class="form-group">
        <label for="password_confirmation">@lang('forms.repeat_password')</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required  placeholder="********">
    </div>
    <div class="d-flex flex-md-row display-767-column mb-4">
        <div class="group-input mt-3">
            <button type="button" class="btn btn-primary float-right" id="btn_change_pw">
                @lang('forms.save')
            </button>
        </div>
    </div>
</form>