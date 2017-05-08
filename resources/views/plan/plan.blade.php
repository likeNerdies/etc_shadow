@extends('plan.layouts.panel')

@section('contenido-plan')

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2>Hi <strong>{{Auth::user()->name}}</strong>, we got differents plans for you. Take a look below.
                </h2>
            </div>

            <br/>

            <div class="row">
                <div class="" style="margin-left: 50px">
                    <form method="post" action="{{route('plan')}}">
                        {{csrf_field()}}
                        @if (Auth::user()->plan->id==1)
                            <input type="submit" value="Poor Plan" class="col-md-3 col-md-offset text-center  btn btn-default disabled"><span class="glyphicon glyphicon-ok"></span> Subscribed
                        @else
                        <input type="hidden" name="plan_id" value="1">
                        <input type="submit" value="Poor Plan" class="col-md-3 col-md-offset text-center  btn btn-default">
                        @endif
                    </form>

                </div>
                <div class="" style="margin-left: 50px">
                    <form method="post" action="{{route('plan')}}">
                        {{csrf_field()}}
                        @if (Auth::user()->plan->id==2)
                            <input type="submit" value="Medium Plan" class="col-md-3 col-md-offset-1 text-center  btn btn-default disabled"><span class="glyphicon glyphicon-ok"></span> Subscribed
                        @else
                            <input type="hidden" name="plan_id" value="2">
                            <input type="submit" value="Medium Plan" class="col-md-3 col-md-offset-1 text-center  btn btn-default">
                        @endif
                    </form>
                </div>
                <div class="" style="margin-left: 50px">
                    <form method="post" action="{{route('plan')}}">
                        {{csrf_field()}}
                        @if (Auth::user()->plan->id==3)
                            <input type="submit" value="Highest Plan" class="col-md-3 col-md-offset-1 text-center  btn btn-default disabled"><span class="glyphicon glyphicon-ok"></span> Subscribed
                        @else
                            <input type="hidden" name="plan_id" value="3">
                            <input type="submit" value="Highest Plan" class="col-md-3 col-md-offset-1 text-center  btn btn-default">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection