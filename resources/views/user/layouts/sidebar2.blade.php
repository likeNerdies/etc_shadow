<div class="container">
    <div class="profile-block mt-3">
        <div class="block-user-profile mb-2">
            <a href="{{route('profile')}}" class="">@lang("user/profile/profile.myProfile")</a>
        </div>
        <div class="block-user-profile mb-2 hidden-sm-up">
            <a href="{{route('my-data')}}" class="">@lang("user/profile/profile.myData")</a>
        </div>
        <div class="block-user-profile mb-2 hidden-sm-up">
            <a href="/user/panel/plan" class="">@lang("user/profile/profile.plan")</a>
        </div>
        <div class="block-user-profile mb-2 hide-show-toggler hidden-sm-up">
            <a href="" data-toggle="collapse" data-target="#hide-show2"  class="">@lang("user/profile/profile.ingredientsAllergies")
                <i class="fa fa-caret-down pl-2" aria-hidden="true"></i>
            </a>
        </div>
        <div class="collapse" id="hide-show2">
            <div class="block-user-profile mb-2">
                <a href="/user/panel/ingredients" class="">@lang("user/profile/profile.ingredients")</a>
            </div>
            <div class="block-user-profile mb-2">
                <a href="/user/panel/allergies" class="">@lang("user/profile/profile.allergies")</a>
            </div>
        </div>
        <div class="block-user-profile mb-3 hidden-sm-up">
            <a href="/user/panel/help" class="">@lang("user/profile/profile.help")</a>
        </div>
        <div class="block-user-profile mb-3">
          <form id="logoutformuser" class="floating-form" action="/logout" method="post">
            {{ csrf_field() }}
            <a href="#" onclick="document.getElementById('logoutformuser').submit();">@lang("user/profile/profile.logout")</a>
          </form>
        </div>
    </div>

</div>
