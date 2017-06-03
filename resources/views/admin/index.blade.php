@extends('admin.layouts.app')
@section('title','Index')
@section('right-panel')

    <div id="breadcrumb-wrapper" class="row">

    </div>
    <div id="title-wrapper" class="row">
        <div class="col-12">
            <div id="title">
                <h3 class="text-left">
                    Dashboard
                </h3>
            </div>
        </div>
    </div>
    <div id="content-top" class="row">
        <div class="col-md-4 col-12">
            <div class="box-info">
                <div class="display">
                    <div class="number">
                        <h3>
                            <span>{{ $profit["charming"] + $profit["pro"] + $profit["premium"]}}</span>
                            <small>€</small>
                        </h3>
                        <small>CURRENT MONTH SUBSCRIPTION INCOME</small>
                    </div>

                    <div class="icon">
                        <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box-info">
                <div class="display">
                    <div class="number">
                        <h3>
                            <span>{{ $totalUsers }}</span>

                        </h3>
                        <small>TOTAL USERS</small>
                    </div>

                    <div class="icon">
                        <i class="fa fa fa-users fa-2x" aria-hidden="true"></i>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box-info">
                <div class="display">
                    <div class="number">
                        <h3>
                            <span>{{ $boxToSend }}</span>
                            <small>u</small>
                        </h3>
                        <small>TO SEND</small>
                    </div>

                    <div class="icon">
                        <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="col-md-3 col-12">
            <div class="box-info bg-green">

            </div>
        </div>-->
    </div>
    <div id="content-center" class="row">
        <div class="col-md-6 col-12">
            <div id="graphic-one" class="bg-blue">
              <div id="donut">
                <svg></svg>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div id="graphic-two" class="bg-yellow">
              <div id="subscribers">
                <!--<svg></svg>-->
              </div>
            </div>
        </div>
    </div>
    <div id="content-bottom" class="row">
        <div class="col-md-6 col-12 text-center">
            <div id="last_users">
              <div class="bg-white p-2">
                <h4 class="h4_weight-normal">5 Last users registered</h4>
                <table class="table mt-3">
                  @foreach($lastFiveUsers as $user)
                  <tr>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->created_at->diffForHumans() }} </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-12 text-center">
            <div id="expiration_date">
              <div class="bg-white p-2">
                <h4 class="h4_weight-normal">Products about to expire</h4>
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Stock</th>
                      <th>Expiration Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($productOBED as $prod)
                        <tr>
                          <td>  {{ $prod->id }} </td>
                          <td> {{ $prod->name }} </td>
                          <td> {{ $prod->stock }} </td>
                          <td> {{ $prod->expiration_date }} </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $productOBED->links() }}
              </div>
              </div>

        </div>
    </div>

@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js" charset="utf-8"></script>
  <script src="{{asset('/js/libraries/charts/nvd3_total/build/nv.d3.js')}}"></script>
  <script src="{{asset('/js/admin/dashboard/graphics.js')}}"></script><!-- Gráficos dashboard -->
  <script src="https://code.highcharts.com/highcharts.src.js"></script><!-- Cambiar por descargado -->
@endsection
<!-- Scripts not yet -->
