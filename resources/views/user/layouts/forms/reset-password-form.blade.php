<div class="w-80 mx-auto">
  <form class="form-horizontal" role="form" name="reset-password" method="post" action="" id="reset-password">

      {{csrf_field()}}

      <!-- First row -->
      <div class="d-flex flex-md-row display-767-column mb-4">
        <div class="group-input">
            <label for="old_password" class="col-form-label">@lang('forms.old_password')</label>
            <input type="password" class="form-control col-12" id="old_password" name="old_password" required placeholder="********">
        </div>
        <div class="group-input ml-md-4 ml-sm-0">
            <label for="new_password" class="col-form-label">@lang('forms.new_password')</label>
            <input type="password" class="form-control" id="new_password" name="password" required placeholder="********">
        </div>
      </div>

      <!-- Second row -->
      <div class="form-group">
          <label for="password_confirmation">@lang('forms.repeat_password')</label>
          <input type="password" class="form-control col-12" id="password_confirmation" name="password_confirmation" required  placeholder="********">
      </div>

      <!-- Submit -->
      <div class="d-flex flex-md-row display-767-column mb-4">
          <div class="group-input mt-3">
              <button type="button" class="btn btn-primary float-right" id="btn_change_pw">
                  @lang('forms.save')
              </button>
          </div>
      </div>
  </form>
</div>
