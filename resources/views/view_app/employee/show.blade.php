@extends('layouts.app')

@section('title-header')
    {{$employee->{'full_name_'.app()->getLocale()} }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">
@endsection
{{------------------------
<div class="row">

    <div class="col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <h5 class="h4">@lang('app.employee contract')</h5>
            <a target="_blank" class="btn btn-link" href="{{route('show.file',['data'=>$employee->contract->contract_file])}}">@lang('app.contract')</a>
        </div>
    </div>

    <div class="col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <h5 class="h4">@lang('app.personal img')</h5>
            <a target="_blank" class="btn btn-link" href="{{route('show.file',['data'=>$employee->avatar])}}">@lang('app.personal img')</a>
        </div>
    </div>

    <div class="col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <h5 class="h4">@lang('app.personal identity img')</h5>
            <a target="_blank" class="btn btn-link" href="{{route('show.file',['data'=>$employee->personal_identity_img])}}">@lang('app.personal identity img')</a>
        </div>
    </div>
</div>
-------------}}
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
        </div>

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="page-header">

                <div class="text-center">
                    <h4 class="text-blue h4">@lang('app.personal information')</h4>
                </div>

                <table class="table table-bordered">
                    <thead class="thead-dark">
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
                        <th scope="row">1</th>
                        <th scope="row">{{$employee->full_name_en}}</th>
                        <th scope="row">{{$employee->full_name_ar}}</th>
                        <th scope="row">{{$employee->full_name_fr}}</th>
                        <th scope="row">{{$employee->age}}</th>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('app.phone')</th>
                        <th scope="col">@lang('app.email')</th>
                        <th scope="col">@lang('app.personal identity id')</th>
                        <th scope="col">@lang('app.start date')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$employee->phone}}</th>
                        <th scope="row">{{$employee->email}}</th>
                        <th scope="row">{{$employee->personal_identity_id}}</th>
                        <th scope="row">{{$employee->data_of_start_work}}</th>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('app.name of bank')</th>
                        <th scope="col">@lang('app.name of account')</th>
                        <th scope="col">@lang('app.number of wif husband')</th>
                        <th scope="col">@lang('app.number of wif children')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$employee->name_of_bank}}</th>
                        <th scope="row">{{$employee->number_of_account}}</th>
                        <th scope="row">{{$employee->number_of_wif_husband}}</th>
                        <th scope="row">{{$employee->number_of_wif_children}}</th>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('app.time of attendance')</th>
                        <th scope="col">@lang('app.time of going')</th>
                        <th scope="col">@lang('app.number of wif husband')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$employee->time_of_attendees}}</th>
                        <th scope="row">{{$employee->time_of_going}}</th>
                        <th scope="row">{{$employee->experience_description}}</th>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('app.jop')</th>
                        <th scope="col">@lang('app.degree')</th>
                        <th scope="col">@lang('app.education')</th>
                        <th scope="col">@lang('app.level experience')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$employee->jop->{'name_'.app()->getLocale()} }}</th>
                        <th scope="row">{{$employee->degree->{'degree_'.app()->getLocale()} }}</th>
                        <th scope="row">{{$employee->education->{'education_status_'.app()->getLocale()} }}</th>
                        <th scope="row">{{$employee->levelExperience->{'level_experience_'.app()->getLocale()} }}</th>
                    </tr>
                    </tbody>
                </table>


            </div>
        </div>



        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="row">

                <div class="col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h5 class="h4">@lang('app.employee contract')</h5>
                        <a target="_blank" class="btn btn-link" href="{{route('show.file',['data'=>$employee->contract->contract_file])}}">@lang('app.contract')</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h5 class="h4">@lang('app.personal img')</h5>
                        <a target="_blank" class="btn btn-link" href="{{route('show.file',['data'=>$employee->avatar])}}">@lang('app.personal img')</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h5 class="h4">@lang('app.personal identity img')</h5>
                        <a target="_blank" class="btn btn-link" href="{{route('show.file',['data'=>$employee->personal_identity_img])}}">@lang('app.personal identity img')</a>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection

@section('scripts')
    @include('layouts.basic_scripts')
@endsection

