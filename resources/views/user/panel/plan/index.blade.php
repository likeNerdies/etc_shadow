@extends('user.layouts.panel')
@section('right-panel')

<div class="container mt-5 justify-content-center">
  <form class="" action="user/panel/plan/subscribe" method="post">
      @if (Auth::user()->plan_id == null) <!-- If user is not subscribed to any plan -->
        <h1 class="text-center red-font">You don't have any plan yet!</h1>
        <h4 class="text-center mt-3">Wanna subscribe?</h4>

        <!-- Charming -->
        <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
          <div class="col-md-9">
            <h3 class="text-center">Want to start from the very scratch?</h3>
            <h3 class="text-center subtitle">We have the perfect plan for you!</h3>
            <h6 class="mt-5">The Charming plan is small but plenty of delightfulness.</h6>
            <p class="">4 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
            <small class="price">9.95€</small>
          </div>
          <div class="col-md-3 text-center">
            <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="">Subscribe</a></button>
          </div>
        </div>

        <!-- Pro -->
        <div class="row section pro-bg-color p-5 mr-md-5">
          <div class="col-md-9">
            <h3 class="text-center">So you're a pro and you want a box to match?</h3>
            <h3 class="text-center subtitle">We can do that!</h3>
            <h6 class="mt-5">The Pro plan is as pro as you are.</h6>
            <p class="">8 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
            <small class="price">17.95€</small>
          </div>
          <div class="col-md-3 text-center">
            <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Subscribe</a></button>
          </div>
        </div>

        <!-- Premium -->
        <div class="row section premium-bg-color p-5 mr-md-5">
          <div class="col-md-9">
            <h3 class="text-center">You're extra? Just like this box.</h3>
            <h3 class="text-center subtitle">We want you to be healthy, like, extra healthy.</h3>
            <h6 class="mt-5">The Premium plan will change you.</h6>
            <p class="">12 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
            <small class="price">29.95€</small>
          </div>
          <div class="col-md-3 text-center">
            <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Subscribe</a></button>
          </div>
        </div>

        <div class="row section p-5 mr-md-5">
          <div class="col-md-9 text-center">
            <h3 class="">Not enough?</h3>
            <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">More info</a></button>
          </div>
          <div class="col-md-3 text-center">
          </div>
        </div>

      @else <!-- If user is subscribed to a plan, show the two left plans to change subscription -->
        <h1 class="text-center red-font">Great! You're subscribed to {{ Auth::user()->plan->name}}!</h1>
        <h4 class="text-center mt-3">Wanna change?</h4>

        @if (Auth::user()->plan->name == "charming")
            <!-- Pro -->
            <div class="row section pro-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">Feeling pro and you want a box to match?</h3>
                <h3 class="text-center subtitle">We can do that!</h3>
                <h6 class="mt-5">The Pro plan is as pro as you are.</h6>
                <p class="">8 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
                <small class="price">17.95€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="">Change plan</a></button>
              </div>
            </div>
            <!-- Premium -->
            <div class="row section premium-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">Feeling extra? Just like this box.</h3>
                <h3 class="text-center subtitle">We want you to be healthy, like, extra healthy.</h3>
                <h6 class="mt-5">The Premium plan will change you.</h6>
                <p class="">12 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
                <small class="price">29.95€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Change plan</a></button>
              </div>
            </div>
          @elseif (Auth::user()->plan->name == "pro")
            <!-- Charming -->
            <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">Want to start from the very scratch?</h3>
                <h3 class="text-center subtitle">We have the perfect plan for you!</h3>
                <h6 class="mt-5">The Charming plan is small but plenty of delightfulness.</h6>
                <p class="">4 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
                <small class="price">9.95€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Change plan</a></button>
              </div>
            </div>
            <!-- Premium -->
            <div class="row section premium-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">Feeling extra? Just like this box.</h3>
                <h3 class="text-center subtitle">We want you to be healthy, like, extra healthy.</h3>
                <h6 class="mt-5">The Premium plan will change you.</h6>
                <p class="">12 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
                <small class="price">29.95€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Change plan</a></button>
              </div>
          </div>
          @else
          <!-- Charming -->
            <div class="row mr-sm-0 section charming-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">Want to start from the very scratch?</h3>
                <h3 class="text-center subtitle">We have the perfect plan for you!</h3>
                <h6 class="mt-5">The Charming plan is small but plenty of delightfulness.</h6>
                <p class="">4 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
                <small class="price">9.95€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Change plan</a></button>
              </div>
            </div>
            <!-- Pro -->
            <div class="row section pro-bg-color p-5 mr-md-5">
              <div class="col-md-9">
                <h3 class="text-center">Feeling a pro and you want a box to match?</h3>
                <h3 class="text-center subtitle">We can do that!</h3>
                <h6 class="mt-5">The Pro plan is as pro as you are.</h6>
                <p class="">8 products, one drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack.</p>
                <small class="price">17.95€</small>
              </div>
              <div class="col-md-3 text-center">
                <button class="mx-auto mt-3 btn btn-primary page-scroll btn-seeProducts sr-btn btn-subscribe" type="submit" name="button"><a href="/plans">Change plan</a></button>
              </div>
            </div>
        @endif
      @endif
  </form>
</div>


@endsection
