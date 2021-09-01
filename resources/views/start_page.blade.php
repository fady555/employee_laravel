@extends('layouts.app')



@section('title-header')
@endsection



@section('css')
@endsection




@section('main-container')


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">

        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Form</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">@lang('app.home')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('app.information')</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{date('D(d)-M(m)-Y')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('them/vendors/images/banner-img.png')}}" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Welcome back <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
                    </h4>
                    <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
                </div>
            </div>
        </div>

    </div>

</div>



@endsection







@section('scripts')
    @include('layouts.basic_scripts')
@endsection





