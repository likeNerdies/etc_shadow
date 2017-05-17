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
            <div class="box-info bg-red">
                <p class="text-center">Info</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box-info bg-blue">
                <p class="text-center">Info</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box-info bg-yellow">
                <p class="text-center">Info</p>
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
                <p class="text-center">Graphics</p>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div id="graphic-two" class="bg-yellow">
                <p class="text-center">Graphics</p>
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

<!-- Scripts not yet -->