@extends('layouts.app')

@section('title-header')
    {{$employee->{'full_name_'.app()->getLocale()} }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">
@endsection



@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>@lang('app.show employee')</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('show_employees')}}">@lang('app.employees')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('app.show employee')</li>
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
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="text-center">
                        <h4 class="text-blue h4">@lang('app.personal information')</h4>
                    </div>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('app.full_name_en')</th>
                        <th scope="col">@lang('app.full_name_ar')</th>
                        <th scope="col">@lang('app.full_name_fr')</th>
                        <th scope="col">@lang('app.age')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <th scope="row">{{$employee->full_name_en}}</th>
                        <th scope="row">{{$employee->full_name_ar}}</th>
                        <th scope="row">{{$employee->full_name_fr}}</th>
                        <th scope="row">{{$employee->age}}</th>
                    </tr>
                    </tbody>
                </table>
            </div>



                <div class="row">
                    <div class="col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <h5 class="h4">Small modal</h5>
                            <a href="#" class="btn-block" data-toggle="modal" data-target="#small-modal" type="button">
                                <img src="http://localhost/employee_laravel/public/personal_card.jpg" alt="modal">
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


@endsection

@section('scripts')
    @include('layouts.basic_scripts')
@endsection

