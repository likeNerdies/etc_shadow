<div class="container-fluid" id="footer">

  <div class="justify-content-md-center text-center">
    <h4 class="tex-center">@lang("layouts/footer.tellUsSomething")</h4>
  </div>

  <div class="mt-5 text-center">
    <form class="" action="" method="post">
      <div class="form-group">
        <div class="input-group emailInput offset-md-4 col-md-4 offset-md-4">
          <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts btn-yellow"><a href="mailto:balmeshealthybox@gmail.com" class="" target="_top">@lang("layouts/footer.sendEmail")</a></button>
        </div>
      </div>
    </form>
  </div>

  <div class="justify-content-md-center mt-5 text-center">
    <i class="fa fa-facebook" aria-hidden="true"></i>
    <i class="fa fa-twitter" aria-hidden="true"></i>
    <i class="fa fa-google-plus" aria-hidden="true"></i>
    <i class="fa fa-instagram" aria-hidden="true"></i>
    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
    <i class="fa fa-spotify" aria-hidden="true"></i>
    <i class="fa fa-youtube-play" aria-hidden="true"></i>
  </div>

  <h6 id="needHelpFooter" class=""><a href="/help">@lang("layouts/footer.needHelp")</a></h6>

</div>


@include('layouts.scripts')
@yield('scriptsPersonalizados')

</body>
</html>
