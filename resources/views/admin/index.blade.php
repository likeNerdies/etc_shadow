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
                        <small>TOTAL PROFIT</small>
                    </div>

                    <div class="icon">
                        <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
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
                <svg></svg>
              </div>
            </div>
        </div>
    </div>
    <div id="content-bottom" class="row">
        <div class="col-md-6 col-12">
            <div id="best-sellers" class="bg-blue">
                <p class="text-center">Best sellers</p>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div id="feedback" class="bg-red">
                <p class="text-center">
                    Feedback
                </p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
  <!--<script src="{{asset('/js/libraries/charts/d3js/d3.v4.min.js')}}"></script>
  <script src="{{asset('/js/libraries/charts/nvd3/nv.d3.js')}}"></script>-->
  <!--<script src="https://d3js.org/d3.v4.min.js"></script>
  <script src="https://cdn.rawgit.com/novus/nvd3/v1.8.1/build/nv.d3.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js" charset="utf-8"></script>
  <script src="{{asset('/js/libraries/charts/nvd3_total/build/nv.d3.js')}}"></script>
  <script src="{{asset('/js/admin/dashboard/graphics.js')}}"></script><!-- Gráficos dashboard -->

@endsection
<!-- Scripts not yet -->
