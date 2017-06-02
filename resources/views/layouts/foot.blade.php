<div class="container-fluid" id="footer">

  <div class="justify-content-md-center text-center">
    <h4 class="tex-center">@lang("layouts/footer.subscribeToPlanning")</h4>
  </div>

  <div class="mt-5 text-center">
    <form class="" action="" method="post">
      <div class="form-group">
        <div class="input-group emailInput offset-md-4 col-md-4 offset-md-4">
          <!--<div class="input-group-addon">@</div>
          <input type="text" class="form-control text-center  col-xs-9" name="email" value="" placeholder='@lang("layouts/footer.writeEmail")'>
          <a href="mailto:balmeshealthybox@gmail.com" class="mx-auto text-center  col-xs-9" target="_top"><button type="button" class="btn btn-default" name="button">Write email</button></a>-->
          <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts btn-yellow"><a href="mailto:balmeshealthybox@gmail.com" class="" target="_top">Write email</a></button>
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

</div>
@include('layouts.scripts')
@yield('scriptsPersonalizados')

</body>
</html>
