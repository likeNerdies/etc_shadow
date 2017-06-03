<div class="container-fluid" id="footer">

  <div class="justify-content-md-center text-center">
    <h4 class="tex-center">@lang("layouts/footer.tellUsSomething")</h4>
  </div>

  <div class="mt-5 text-center">
    <form class="" action="" method="post">
      <div class="form-group">
        <div class="input-group emailInput offset-md-4 col-md-4 offset-md-4">
          <!--<button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts btn-yellow"><a href="mailto:balmeshealthybox@gmail.com" class="" target="_top">@lang("layouts/footer.sendEmail")</a></button>-->
          <a href="mailto:balmeshealthybox@gmail.com" class="mx-auto mt-3 sans-serif btn btn-primary page-scroll btn-seeProducts btn-yellow" target="_top">@lang("layouts/footer.sendEmail")</a>
        </div>
      </div>
    </form>
  </div>

  <div class="justify-content-md-center mt-5 text-center div-footer-i">
    <a href="http://www.jaumebalmes.net/" class="icon-anchor"><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
    <a href="https://github.com/likeNerdies/etc_shadow" class="icon-anchor"><i class="fa fa-github" aria-hidden="true"></i></a>
    <a href="https://plus.google.com/106213986352561208329?hl=es" class="icon-anchor"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
  </div>

  <!--<h6 id="needHelpFooter" class=""><a href="/help">@lang("layouts/footer.needHelp")</a></h6>-->
  <a id="needHelpFooter" href="/help" class="icon-anchor"><i class="fa fa-question-circle" aria-hidden="true"></i>@lang("layouts/footer.needHelp")</a>

</div>

</div>
@include('layouts.scripts')
@yield('scriptsPersonalizados')

</body>
</html>
