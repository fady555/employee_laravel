@extends('layouts.app')







@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">
    {{----------------switchery css --------------------------------}}
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/switchery/switchery.min.css')}}">
    {{----------------bootstrap-tagsinput css--------------------------------}}
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    {{---------------bootstrap-touchspin css---------------------------------}}
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">
@endsection




@if($action == 'show-all')

        @section('title-header')
            @lang('app.show employee')
        @endsection

        @section('main-container')
                <div class="main-container">
                    <div class="pd-ltr-20 xs-pd-20-10">
                        <div class="min-height-200px">
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
                            <!-- Simple Datatable start -->

                            <div class="card-box mb-30">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Data Table with Export Buttons</h4>
                                </div>
                                <div class="pb-20">
                                    <table class="table hover multiple-select-row data-table-export nowrap">
                                        <thead>
                                        <tr>
                                            <th>@lang('app.action')</th>
                                            <th class="table-plus datatable-nosort">@lang('app.name')</th>
                                            <th>@lang('app.age')</th>
                                            <th>@lang('app.jop')</th>
                                            <th>@lang('app.address')</th>
                                            <th>@lang('app.salary')</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="{{route('show_employee',$employee->id)}}"><i class="dw dw-eye"></i> View</a>
                                                            <a class="dropdown-item" href="{{route('edit_employee',$employee->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                                            <a class="dropdown-item" href="{{route('delete_employee',$employee->id)}}"><i class="dw dw-delete-3"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="table-plus">{{ $employee->{'full_name_'.app()->getLocale()} }}</td>
                                                <td>{{ $employee->age }}</td>
                                                <td>{{ $employee->jop->{'name_'.app()->getLocale()} }}</td>
                                                <td>{{ $employee->addresses->{'address_desc_'.app()->getLocale()} }}</td>
                                                <td>{{ $employee->salary->fixed_salary }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Export Datatable End -->
                        </div>
                        <div class="footer-wrap pd-20 mb-20 card-box">
                            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
                        </div>
                    </div>
                </div>
        @endsection

@elseif($action == 'show')

        @section('title-header')
            {{$employee[0]['full_name_'.app()->getLocale()]}}
        @endsection

        @section('main-container')
        <div class="main-container">
                        <div class="pd-ltr-20 xs-pd-20-10">
                            <div class="min-height-200px">
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
                                <!-- Export Datatable start -->
                                <div class="card-box mb-30">
                                    <div class="pd-20">
                                        <h4 class="text-blue h4">{{$employee[0]['full_name_'.app()->getLocale()]}}</h4>
                                    </div>
                                    <div class="pb-20">
                                        @if(app()->getLocale() == "ar")
                                            <table id="TableData" class="table hover multiple-select-row data-table-export nowrap">
                                                {{---<table class="table hover multiple-select-row data-table-export nowrap">---}}
                                                {{---<table class="data-table table hover multiple-select-row  nowrap">---}}
                                                <thead>
                                                <tr>
                                                    <th>b</th>
                                                    <th class="table-plus datatable-nosort">a</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$employee[0]['full_name_'.app()->getLocale()]}}</td>
                                                    <td class="table-plus">@lang('app.full name')</td>
                                                </tr>
                                                <tr>

                                                    <td>{{$employee[0]['age']}}</td>
                                                    <td class="table-plus">@lang('app.age')</td>
                                                </tr>
                                                {{---avatare-- {{$employee[0]['email']}}--}}
                                                <tr>
                                                    <td>{{$employee[0]['data_of_start_work']}}</td>
                                                    <td class="table-plus">@lang('app.start date')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['personal_identity_id']}}</td>
                                                    <td class="table-plus">@lang('app.personal identity id')</td>
                                                </tr>
                                                <tr>
                                                    <td><img style="display: block; max-width: 20% ; height: auto;" src="{{asset('storage/personal_identity_img/general.jpg')}}" alt=""></td>
                                                    <td class="table-plus">@lang('app.personal identity img')</td>
                                                </tr>
                                                <tr>
                                                    <td><img style="display: block; max-width: 20% ; height: auto;"  src="{{asset('storage/avatar_employee/general.jpg')}}" alt=""></td>
                                                    <td class="table-plus">@lang('app.personal img')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['number_of_day_vacancy']}}</td>
                                                    <td class="table-plus">@lang('app.number of day vacancy')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['number_of_day_vacancy_taken']}}</td>
                                                    <td class="table-plus">@lang('app.number of day token')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['email']}}</td>
                                                    <td class="table-plus">@lang('app.email')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['phone']}}</td>
                                                    <td class="table-plus">@lang('app.phone')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['name_of_bank']}}</td>
                                                    <td class="table-plus">@lang('app.name of bank')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['number_of_account']}}</td>
                                                    <td class="table-plus">@lang('app.name of account')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['number_of_wif_husband']}}</td>
                                                    <td class="table-plus">@lang('app.number of wif husband')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['number_of_wif_children']}}</td>

                                                    <td class="table-plus">@lang('app.number of wif children')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['time_of_attendees']}}</td>
                                                    <td class="table-plus">@lang('app.time of attendance')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['time_of_going']}}</td>
                                                    <td class="table-plus">@lang('app.time of going')</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$employee[0]['experience_description']}}</td>
                                                    <td class="table-plus">@lang('app.experience description')</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">Basic List</h4>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">{{$employee[0]['jop']['nic_name']}}</li>
                                                                <li class="list-group-item">{{$employee[0]['jop']['description_'.app()->getLocale()]}}</li>
                                                            </ul>
                                                        </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{$employee[0]['jop']['name_'.app()->getLocale()]}}

                                                        </button>
                                                    </td>
                                                    <td class="table-plus">@lang('app.jop')</td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">@lang('app.address list')</h4>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">{{$employee[0]['addresses']['country']['name_'.app()->getLocale()]}}</li>
                                                                <li class="list-group-item">{{$employee[0]['addresses']['city']['name_'.app()->getLocale()]}}</li>
                                                                <li class="list-group-item">@lang('app.code'):{{$employee[0]['addresses']['city']['code']}}</li>
                                                            </ul>
                                                        </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{$employee[0]['addresses']['address_desc_'.app()->getLocale()]}}
                                                        </button>

                                                    </td>
                                                    <td class="table-plus">@lang('app.address')</td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">@lang('app.salary list')</h4>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['fixed_salary']}}$</li>
                                                                <li class="list-group-item">@lang('app.responsibility_allowance'){{$employee[0]['salary']['responsibility_allowance']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['natural_work']}}$</li>
                                                                <li class="list-group-item">@lang('app.natural_work'):{{$employee[0]['salary']['promotion_bonus']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['specialization_bonus']}}$</li>
                                                                <li class="list-group-item">@lang('app.specialization_bonus'):{{$employee[0]['salary']['transport']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['extra_work']}}$</li>
                                                                <li class="list-group-item">@lang('app.extra_work'):{{$employee[0]['salary']['supplement_salary']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['rewards']}}$</li>
                                                                <li class="list-group-item">@lang('app.rewards'):{{$employee[0]['salary']['total_dues']}}$</li>
                                                                <li class="list-group-item">@lang('app.discount'):{{$employee[0]['salary']['discount']}}$</li>
                                                                <li class="list-group-item">@lang('app.borrow'):{{$employee[0]['salary']['borrow']}}$</li>
                                                                <li class="list-group-item">@lang('app.loan'):{{$employee[0]['salary']['loan']}}$</li>
                                                                <li class="list-group-item">@lang('app.health_insurance'):{{$employee[0]['salary']['health_insurance']}}$</li>
                                                                <li class="list-group-item">@lang('app.tax_income'):{{$employee[0]['salary']['tax_income']}}$</li>
                                                                <li class="list-group-item">@lang('app.total_discounts'):{{$employee[0]['salary']['total_discounts']}}$</li>
                                                                <li class="list-group-item">@lang('app.created_at'):{{$employee[0]['salary']['created_at']}}$</li>
                                                                <li class="list-group-item">@lang('app.updated_at'):{{$employee[0]['salary']['updated_at']}}$</li>
                                                            </ul>
                                                        </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{$employee[0]['salary']['fixed_salary']}}$
                                                        </button>

                                                    </td>
                                                    <td class="table-plus">@lang('app.salary')</td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{$employee[0]['degree']['degree_'.app()->getLocale()]}}
                                                    </td>
                                                    <td class="table-plus">@lang('app.degree')</td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{$employee[0]['education']['education_status_'.app()->getLocale()]}}
                                                    </td>
                                                    <td class="table-plus">@lang('app.education')</td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{  $employee[0]['levelExperience']['level_experience_'.app()->getLocale()] }}
                                                    </td>
                                                    <td class="table-plus">@lang('app.level experience')</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="{{asset('storage/contract/contract-labor-agreement.pdf')}}"><button type="button" class="btn" data-bgcolor="#bd081c" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(189, 8, 28);"><i class="fa fa-file-pdf-o"></i> @lang('app.show')</button></a>
                                                    </td>
                                                    <td class="table-plus">@lang('app.contract')</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body"  data-trigger="focus" data-toggle="popover" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">@lang('app.premisess')</h4>
                                                            <ul class="list-group">
                                                                @for($i=0;$i< count(json_decode($employee[0]['user']['premisses']))  ;$i++)
                                                                <li class="list-group-item">
                                                                {{\App\Premisese::find(json_decode($employee[0]['user']['premisses'])[$i])->nik_name }}
                                                                </li>
                                                                @endfor
                                                                </ul>
                                                            </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{ $employee[0]['user']['username']}}
                                                        </button>

                                                    </td>
                                                    <td class="table-plus">@lang('app.user')</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        @else
                                            <table id="TableData" class="table hover multiple-select-row data-table-export nowrap">
                                                {{---<table class="table hover multiple-select-row data-table-export nowrap">---}}
                                                {{---<table class="data-table table hover multiple-select-row  nowrap">---}}
                                                <thead>
                                                <tr>
                                                    <th class="table-plus datatable-nosort">a</th>
                                                    <th>b</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="table-plus">@lang('app.full name')</td>
                                                    <td>{{$employee[0]['full_name_'.app()->getLocale()]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.age')</td>
                                                    <td>{{$employee[0]['age']}}</td>
                                                </tr>
                                                {{---avatare-- {{$employee[0]['email']}}--}}
                                                <tr>
                                                    <td class="table-plus">@lang('app.start date')</td>
                                                    <td>{{$employee[0]['data_of_start_work']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.personal identity id')</td>
                                                    <td>{{$employee[0]['personal_identity_id']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.personal identity img')</td>
                                                    <td><img style="display: block; max-width: 20% ; height: auto;" src="{{asset('storage/personal_identity_img/general.jpg')}}" alt=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.personal img')</td>
                                                    <td><img style="display: block; max-width: 20% ; height: auto;"  src="{{asset('storage/avatar_employee/general.jpg')}}" alt=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.number of day vacancy')</td>
                                                    <td>{{$employee[0]['number_of_day_vacancy']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.number of day token')</td>
                                                    <td>{{$employee[0]['number_of_day_vacancy_taken']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.email')</td>
                                                    <td>{{$employee[0]['email']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.phone')</td>
                                                    <td>{{$employee[0]['phone']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.name of bank')</td>
                                                    <td>{{$employee[0]['name_of_bank']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.name of account')</td>
                                                    <td>{{$employee[0]['number_of_account']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.number of wif husband')</td>
                                                    <td>{{$employee[0]['number_of_wif_husband']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.number of wif children')</td>
                                                    <td>{{$employee[0]['number_of_wif_children']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.time of attendance')</td>
                                                    <td>{{$employee[0]['time_of_attendees']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.time of going')</td>
                                                    <td>{{$employee[0]['time_of_going']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.experience description')</td>
                                                    <td>{{$employee[0]['experience_description']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.jop')</td>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">Basic List</h4>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">{{$employee[0]['jop']['nic_name']}}</li>
                                                                <li class="list-group-item">{{$employee[0]['jop']['description_'.app()->getLocale()]}}</li>
                                                            </ul>
                                                        </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{$employee[0]['jop']['name_'.app()->getLocale()]}}

                                                        </button>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.address')</td>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">@lang('app.address list')</h4>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">{{$employee[0]['addresses']['country']['name_'.app()->getLocale()]}}</li>
                                                                <li class="list-group-item">{{$employee[0]['addresses']['city']['name_'.app()->getLocale()]}}</li>
                                                                <li class="list-group-item">@lang('app.code'):{{$employee[0]['addresses']['city']['code']}}</li>
                                                            </ul>
                                                        </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{$employee[0]['addresses']['address_desc_'.app()->getLocale()]}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.salary')</td>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">@lang('app.salary list')</h4>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['fixed_salary']}}$</li>
                                                                <li class="list-group-item">@lang('app.responsibility_allowance'){{$employee[0]['salary']['responsibility_allowance']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['natural_work']}}$</li>
                                                                <li class="list-group-item">@lang('app.natural_work'):{{$employee[0]['salary']['promotion_bonus']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['specialization_bonus']}}$</li>
                                                                <li class="list-group-item">@lang('app.specialization_bonus'):{{$employee[0]['salary']['transport']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['extra_work']}}$</li>
                                                                <li class="list-group-item">@lang('app.extra_work'):{{$employee[0]['salary']['supplement_salary']}}$</li>
                                                                <li class="list-group-item">@lang('app.fixed_salary'):{{$employee[0]['salary']['rewards']}}$</li>
                                                                <li class="list-group-item">@lang('app.rewards'):{{$employee[0]['salary']['total_dues']}}$</li>
                                                                <li class="list-group-item">@lang('app.discount'):{{$employee[0]['salary']['discount']}}$</li>
                                                                <li class="list-group-item">@lang('app.borrow'):{{$employee[0]['salary']['borrow']}}$</li>
                                                                <li class="list-group-item">@lang('app.loan'):{{$employee[0]['salary']['loan']}}$</li>
                                                                <li class="list-group-item">@lang('app.health_insurance'):{{$employee[0]['salary']['health_insurance']}}$</li>
                                                                <li class="list-group-item">@lang('app.tax_income'):{{$employee[0]['salary']['tax_income']}}$</li>
                                                                <li class="list-group-item">@lang('app.total_discounts'):{{$employee[0]['salary']['total_discounts']}}$</li>
                                                                <li class="list-group-item">@lang('app.created_at'):{{$employee[0]['salary']['created_at']}}$</li>
                                                                <li class="list-group-item">@lang('app.updated_at'):{{$employee[0]['salary']['updated_at']}}$</li>
                                                            </ul>
                                                        </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{$employee[0]['salary']['fixed_salary']}}$
                                                        </button>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.degree')</td>
                                                    <td>
                                                        {{$employee[0]['degree']['degree_'.app()->getLocale()]}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.education')</td>
                                                    <td>
                                                        {{$employee[0]['education']['education_status_'.app()->getLocale()]}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.level experience')</td>
                                                    <td>
                                                        {{  $employee[0]['levelExperience']['level_experience_en'] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.contract')</td>
                                                    <td>
                                                        <a href="{{asset('storage/contract/contract-labor-agreement.pdf')}}"><button type="button" class="btn" data-bgcolor="#bd081c" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(189, 8, 28);"><i class="fa fa-file-pdf-o"></i> @lang('app.show')</button></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-plus">@lang('app.user')</td>
                                                    <td>
                                                        <button
                                                            type="button" class="btn btn-outline-primary margin-5" data-container="body"  data-trigger="focus" data-toggle="popover" data-placement="top" data-html="true"
                                                            data-content='<div class="pd-20 card-box height-100-p">
                                                            <h4 class="mb-20 h4">@lang('app.premisess')</h4>
                                                            <ul class="list-group">
                                                                @for($i=0;$i< count(json_decode($employee[0]['user']['premisses']))  ;$i++)
                                                                <li class="list-group-item">
                                                                {{\App\Premisese::find(json_decode($employee[0]['user']['premisses'])[$i])->nik_name }}
                                                                </li>
                                                                @endfor
                                                                </ul>
                                                            </div>'
                                                            title="" data-original-title="" aria-describedby="popover696234">
                                                            {{ $employee[0]['user']['username']}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif


                                    </div>
                                </div>
                                <!-- Export Datatable End -->
                            </div>
                        </div>
                    </div>
        @endsection


@elseif($action == 'add')

        @section('title-header')
            @lang('app.add employee')
        @endsection

        @section('main-container')
            <div class="main-container">
                <div class="pd-ltr-20 xs-pd-20-10">
                    <div class="min-height-200px">
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

                        <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <h4 class="text-blue h4">@lang('app.add employee')</h4>
                            </div>

                            <div class="wizard-content">

                                <form id="form" class="tab-wizard wizard-circle wizard" method="post" action="{{route('store_employee')}}" enctype="multipart/form-data">

                                    @csrf
                                    <h5 >@lang('app.personal information')

                                    @if($errors->has('full_name_en') or $errors->has('full_name_ar')
                                        or $errors->has('full_name_fr') or $errors->has('age')
                                        or $errors->has('email') or $errors->has('phone')
                                        or $errors->has('personal_identity_id')
                                        or $errors->has('personal_identity_img')
                                        or $errors->has('avatar')
                                        or $errors->has('name_of_bank')
                                        or $errors->has('number_of_account')
                                        or $errors->has('number_of_wif_husband')
                                        or $errors->has('number_of_wif_children')
                                        )
                                        <i class="fa fa-warning text-danger d-block" ></i>
                                    @endif
                                    </h5>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('full_name_en')has-danger @enderror ">
                                                    <label>@lang('app.full_name_en')</label>
                                                    <input type="text" name="full_name_en" id="full_name_en" value="{{old('full_name_en')}}" class="form-control  @error('full_name_en')form-control-danger @enderror " onclick="RemoveError('full_name_en')">
                                                    @error('full_name_en')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('full_name_ar')has-danger @enderror ">
                                                    <label>@lang('app.full_name_ar')</label>
                                                    <input type="text" name="full_name_ar" id="full_name_ar" value="{{old('full_name_ar')}}" class="form-control @error('full_name_ar')form-control-danger @enderror "  onclick="RemoveError('full_name_ar')">
                                                    @error('full_name_ar')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('full_name_fr')has-danger @enderror ">
                                                    <label>@lang('app.full_name_fr')</label>
                                                    <input type="text" name="full_name_fr" id="full_name_fr" value="{{old('full_name_fr')}}" class="form-control @error('full_name_fr')form-control-danger @enderror "  onclick="RemoveError('full_name_fr')">
                                                    @error('full_name_fr')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('age')has-danger @enderror ">
                                                    <label>@lang('app.age')</label>
                                                    <input type="text" name="age" id="age" value="{{old('age')}}" class="form-control @error('age')form-control-danger @enderror "  onclick="RemoveError('age')">
                                                    @error('age')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('email')has-danger @enderror ">
                                                    <label>@lang('app.email')</label>
                                                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control @error('email')form-control-danger @enderror "  onclick="RemoveError('email')">
                                                    @error('email')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('phone')has-danger @enderror ">
                                                    <label>@lang('app.phone')</label>
                                                    <input type="text"  name="phone" id="phone" value="{{old('phone')}}" class="form-control @error('phone')form-control-danger @enderror "  onclick="RemoveError('phone')">
                                                    @error('phone')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('personal_identity_id')has-danger @enderror ">
                                                    <label>@lang('app.personal identity id')</label>
                                                    <input type="text" name="personal_identity_id" id="personal_identity_id"  value="{{old('personal_identity_id')}}" class="form-control  @error('personal_identity_id')form-control-danger @enderror " onclick="RemoveError('personal_identity_id')" >
                                                    @error('personal_identity_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('personal_identity_img')has-danger @enderror ">
                                                    <label >@lang('app.personal identity img')</label>
                                                    <input type="file"  name="personal_identity_img" id="personal_identity_img" value="{{old('personal_identity_img')}}" class="form-control @error('personal_identity_img')form-control-danger @enderror " onclick="RemoveError('personal_identity_img')" >
                                                    @error('personal_identity_img')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('avatar')has-danger @enderror ">
                                                    <label >@lang('app.personal img')</label>
                                                    <input type="file"  name="avatar" id="avatar"  class="form-control @error('avatar')form-control-danger @enderror " onclick="RemoveError('avatar')" >
                                                    @error('avatar')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('name_of_bank')has-danger @enderror ">
                                                    <label >@lang('app.name of bank')</label>
                                                    <input type="text"  name="name_of_bank" id="name_of_bank" value="{{old('name_of_bank')}}" class="form-control @error('name_of_bank')form-control-danger @enderror" onclick="RemoveError('name_of_bank')" >
                                                    @error('name_of_bank')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('number_of_account')has-danger @enderror ">
                                                    <label >@lang('app.name of account')</label>
                                                    <input type="text"  name="number_of_account" id="number_of_account" value="{{old('number_of_account')}}" class="form-control @error('number_of_account')form-control-danger @enderror"  onclick="RemoveError('number_of_account')">
                                                    @error('number_of_account')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('number_of_wif_husband')has-danger @enderror ">
                                                    <label >@lang('app.number of wif husband')</label>
                                                    <input type="text"  name="number_of_wif_husband" id="number_of_wif_husband" value="{{old('number_of_wif_husband')}}" class="form-control @error('number_of_wif_husband')form-control-danger @enderror" onclick="RemoveError('number_of_wif_husband')"  >
                                                    @error('number_of_wif_husband')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('number_of_wif_children')has-danger @enderror ">
                                                    <label >@lang('app.number of wif children')</label>
                                                    <input type="text"   name="number_of_wif_children" id="number_of_wif_children" value="{{old('number_of_wif_children')}}"  class="form-control @error('number_of_wif_children')form-control-danger @enderror" onclick="RemoveError('number_of_wif_children')" >
                                                    @error('number_of_wif_children')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <!-- Step 2 -->
                                    <h5> @lang('app.jop')
                                    @if($errors->has('jop_id') or $errors->has('type_id')
                                        or $errors->has('data_of_start_work') or $errors->has('time_of_attendees')
                                        or $errors->has('time_of_going') or $errors->has('contract')
                                        or $errors->has('fixed_salary')
                                        )
                                        <i class="fa fa-warning text-danger d-block" ></i>
                                    @endif
                                    </h5>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('jop_id')has-danger @enderror ">
                                                    <label>@lang('app.jop') <i class="fa fa-refresh" id="jop_id_refresh"></i></label>
                                                    <select name="jop_id" id="jop_id" class="custom-select form-control @error('jop_id')form-control-danger @enderror" onclick="RemoveError('jop_id')" >
                                                        {{------ by ajax ------}}
                                                    </select>
                                                    @error('jop_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('app.create jop')</label>
                                                    <a href="#" class="btn btn-primary  btn-block">@lang('app.create jop')</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('type_id')has-danger @enderror ">
                                                    <label>@lang('app.type of work') <i class="fa fa-refresh" id=type_id_refresh"></i></label>
                                                    <select name="type_id" id="type_id" class="custom-select form-control @error('type_id')form-control-danger @enderror" onclick="RemoveError('type_id')" >
                                                        {{------ by ajax ------}}
                                                    </select>
                                                    @error('type_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('app.create type work')</label>
                                                    <a href="#" class="btn btn-primary  btn-block">@lang('app.create type work')</a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('data_of_start_work') has-danger @enderror">
                                                    <label>@lang('app.start date')</label>
                                                    <input type="text" name="data_of_start_work" id="data_of_start_work" value="{{old('data_of_start_work')}}" class="form-control date-picker @error('data_of_start_work') form-control-danger @enderror" onclick="RemoveError('data_of_start_work')" placeholder="Select Date">
                                                    @error('data_of_start_work')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('time_of_attendees') has-danger @enderror">
                                                    <label>@lang('app.time of attendance')</label>
                                                    <input type="text"  class="form-control time-picker-default td-input @error('time_of_attendees') form-control-danger @enderror" onclick="RemoveError('time_of_attendees')"  >
                                                    @error('time_of_attendees')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('time_of_going') has-danger @enderror">
                                                    <label>@lang('app.time of going')</label>
                                                    <input type="text" name="time_of_going" id="time_of_going" value="{{old('time_of_going')}}" class="form-control time-picker-default td-input  @error('time_of_going') form-control-danger @enderror" onclick="RemoveError('time_of_going')"  readonly="">
                                                    @error('time_of_going')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('contract') has-danger @enderror">
                                                    <label>@lang('app.contract')</label>
                                                    <input type="file" name="contract" id="contract"  class="form-control  file-upload @error('contract') form-control-danger @enderror" onclick="RemoveError('contract')" >
                                                    @error('contract')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('fixed_salary')  has-danger @enderror">
                                                    <label>@lang('app.fixed_salary') ($)</label>
                                                    <input type="text" name="fixed_salary" id="fixed_salary" value="{{old('fixed_salary')}}" class="form-control   @error('fixed_salary') form-control-danger @enderror" onclick="RemoveError('fixed_salary')" >
                                                    @error('fixed_salary')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <!-- Step 3-->
                                    <h5> @lang('app.qualification')
                                        @if($errors->has('education_status_id') or $errors->has('degree_id')or $errors->has('level_experience_id') or $errors->has('experience_description') )
                                            <i class="fa fa-warning text-danger d-block" ></i>
                                        @endif
                                    </h5>
                                    <section>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('education_status_id')has-danger @enderror ">
                                                    <label>@lang('app.education') <i class="fa fa-refresh" id="education_status_id_refresh"></i></label>
                                                    <select name="education_status_id" id="education_status_id" class="custom-select form-control @error('education_status_id')form-control-danger @enderror" onclick="RemoveError('education_status_id')" >
                                                        {{------ by ajax ------}}
                                                    </select>
                                                    @error('education_status_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('app.create education status')</label>
                                                    <a href="#" class="btn btn-primary  btn-block">@lang('app.create education status')</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('degree_id')has-danger @enderror ">
                                                    <label>@lang('app.degree') <i class="fa fa-refresh" id="degree_id_refresh"></i></label>
                                                    <select name="degree_id" id="degree_id" class="custom-select form-control @error('degree_id')form-control-danger @enderror" onclick="RemoveError('degree_id')" >
                                                        {{------ by ajax ------}}
                                                    </select>
                                                    @error('degree_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('app.create degree')</label>
                                                    <a href="#" class="btn btn-primary  btn-block">@lang('app.create degree')</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('level_experience_id')has-danger @enderror ">
                                                    <label>@lang('app.level experience') <i class="fa fa-refresh" id="level_experience_id_refresh"></i></label>
                                                    <select name="level_experience_id" id="level_experience_id" class="custom-select form-control @error('level_experience_id')form-control-danger @enderror" onclick="RemoveError('level_experience_id')" >
                                                        {{------ by ajax ------}}
                                                    </select>
                                                    @error('level_experience_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('app.create level experience')</label>
                                                    <a href="#" class="btn btn-primary  btn-block">@lang('app.create level experience')</a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group @error('experience_description')has-danger @enderror ">
                                                    <label>@lang('app.experience description')</label>
                                                    <textarea  name="experience_description" id="experience_description" class="form-control  @error('experience_description')form-control-danger @enderror" value="{{old('experience_description')}}" onclick="RemoveError('experience_description')" ></textarea>
                                                    @error('experience_description')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                    <!-- Step 4-->
                                    <h5> @lang('app.address')
                                        @if($errors->has('country_id') or $errors->has('city_id') or $errors->has('address_desc_en')  or $errors->has('address_desc_ar')  or $errors->has('address_desc_fr') )
                                            <i class="fa fa-warning text-danger d-block" ></i>
                                        @endif
                                    </h5>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('country_id') has-danger @enderror">
                                                    <label>@lang('countries')</label>
                                                    <select name="country_id" id="country_id" onchange="GetCities(this.value)" class="custom-select form-control @error('country_id') form-control-danger @enderror">
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{ $country->{'name_'.app()->getLocale()} }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('city_id') has-danger @enderror">
                                                    <label>@lang('cities')</label>
                                                    <select name="city_id" id="city_id"   class="custom-select form-control @error('city_id') form-control-danger @enderror">

                                                    </select>
                                                    @error('city_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group @error('address_desc_en')has-danger @enderror ">
                                                    <label>@lang('app.address_desc_en')</label>
                                                    <textarea  name="address_desc_en" id="address_desc_en" class="form-control  @error('address_desc_en')form-control-danger @enderror" value="{{old('address_desc_en')}}" onclick="RemoveError('address_desc_en')" ></textarea>
                                                    @error('address_desc_en')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group @error('address_desc_ar')has-danger @enderror ">
                                                    <label>@lang('app.address_desc_ar')</label>
                                                    <textarea  name="address_desc_ar" id="address_desc_ar" class="form-control  @error('address_desc_ar')form-control-danger @enderror" value="{{old('address_desc_ar')}}" onclick="RemoveError('address_desc_ar')" ></textarea>
                                                    @error('address_desc_ar')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group @error('address_desc_fr')has-danger @enderror ">
                                                    <label>@lang('app.address_desc_fr')</label>
                                                    <textarea  name="address_desc_fr" id="address_desc_fr" class="form-control  @error('address_desc_fr')form-control-danger @enderror" value="{{old('address_desc_fr')}}" onclick="RemoveError('address_desc_fr')" ></textarea>
                                                    @error('address_desc_fr')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                    <!-- Step 4-->
                                    <h5> @lang('app.user')
                                        @if($errors->has('username') or $errors->has('password') or $errors->has('premisess.*') )
                                        <i class="fa fa-warning text-danger d-block" ></i>
                                        @endif
                                    </h5>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('username') has-danger @enderror">
                                                    <label>@lang('app.username') <i id="usergenerate" class="fa fa-refresh"></i> </label>
                                                    <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control  @error('username') form-control-danger @enderror" onclick="RemoveError('username')" >
                                                    @error('username')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group @error('password') has-danger @enderror">
                                                    <label>@lang('app.password') </label>
                                                    <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control  @error('password') form-control-danger @enderror" onclick="RemoveError('password')" >
                                                    @error('password')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            @foreach($premisess as $premises)
                                            <div class="col-md-4">
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input type="checkbox" value="{{$premises->id}}" name="premisess[]" @if(is_array(old('premisess')) && in_array($premises->id,old('premisess'))) checked @endif  id="customCheck{{$premises->id}}" class="custom-control-input" >
                                                    <label class="custom-control-label" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $premises->{'description_'.app()->getLocale()} }}" aria-describedby="tooltip329944" for="customCheck{{$premises->id}}">{{$premises->nik_name}}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>


                                    </section>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endsection

@else

        @section('main-container')
            <div class="main-container">
                <div class="pd-20 card-box height-100-p">

                    <div class="alert alert-danger" role="alert">
                        there are not action here
                    </div>

                </div>
            </div>
        @endsection

@endif





@section('scripts')
    <script src="{{asset('them/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{asset('them/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('them/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
    <!-- Datatable Setting js -->
    <script src="{{asset('them/vendors/scripts/datatable-setting.js')}}"></script>

    {{------- wizerd step ----------------}}
    <script src="{{asset('them/src/plugins/jquery-steps/jquery.steps.js')}}"></script>

    <!-- switchery js -->
    <script src="{{asset('them/src/plugins/switchery/switchery.min.js')}}"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="{{asset('them/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <!-- bootstrap-touchspin js -->
    <script src="{{asset('them/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('them/vendors/scripts/advanced-components.js')}}"></script>



     <script>
         function RemoveError(name){
             var input = document.getElementById(name);
             var parent = input.parentNode;

             parent.classList.remove('has-danger');
             input.classList.remove('form-control-danger');
             if(parent.children[2]){parent.children[2].remove();}

         }
     </script>

     <script>
         $(".tab-wizard").steps({
             headerTag: "h5",
             bodyTag: "section",
             transitionEffect: "fade",
             titleTemplate: '<span class="step">#index#</span> #title#',
             labels: {
                 finish: "Submit"
             },
             onStepChanged: function (event, currentIndex, priorIndex) {
                 $('.steps .current').prevAll().addClass('disabled');
             },
             /*onFinished: function (event, currentIndex) {
                 $('#success-modal').modal('show');
             }*/

             onFinished: function (event, currentIndex) {
                 $("#form")[0].submit();
                 //alert('dfdfs');
             }

         });


     </script>

     <script>
         //ajax jquery

         function JopGet(){
             document.getElementById('jop_id').textContent = '';
             $.get("{{url('jops')}}",function (one,two){
                 //console.log(JSON.parse(one.trim()));
                 var jops = JSON.parse(one.trim());
                 var select = document.getElementById('jop_id');

                 for(var i = 0 ; i< jops.length ; i++){
                     var option   =document.createElement('option');
                     option.value =jops[i]['id'];
                     option.text  =jops[i]['name_'+"{{app()->getLocale()}}"];
                     select.appendChild(option);
                 }
             });
         }

         $('#jop_id_refresh').click(function (){ JopGet(); });

         //First Execute that function
         JopGet();

     </script>
     <script>
         //ajax jquery

         function TypeOfWorkGet(){
             document.getElementById('type_id').textContent = '';
             $.get("{{url('type_of_works')}}",function (one,two){
                 //console.log(JSON.parse(one.trim()));
                 var types = JSON.parse(one.trim());
                 var select = document.getElementById('type_id');

                 for(var i = 0 ; i< types.length ; i++){
                     var option   =document.createElement('option');
                     option.value =types[i]['id'];
                     option.text  =types[i]['work_type_'+"{{app()->getLocale()}}"];
                     select.appendChild(option);
                 }
             });
         }

         $('#type_id_refresh').click(function (){ TypeOfWorkGet(); });

         //First Execute that function
         TypeOfWorkGet();

     </script>

     <script>
         //ajax jquery

         function EducationStatusGet(){
             document.getElementById('education_status_id').textContent = '';
             $.get("{{url('education_status')}}",function (one,two){
                 //console.log(JSON.parse(one.trim()));
                 var education = JSON.parse(one.trim());
                 var select = document.getElementById('education_status_id');

                 for(var i = 0 ; i< education.length ; i++){
                     var option   =document.createElement('option');
                     option.value =education[i]['id'];
                     option.text  =education[i]['education_status_'+"{{app()->getLocale()}}"];
                     select.appendChild(option);
                 }
             });
         }

         $('#education_status_id_refresh').click(function (){ EducationStatusGet(); });

         //First Execute that function
         EducationStatusGet();

     </script>

     <script>
         //ajax jquery

         function DegreeGet(){
             document.getElementById('degree_id').textContent = '';
             $.get("{{url('degrees')}}",function (one,two){
                 //console.log(JSON.parse(one.trim()));
                 var degrees = JSON.parse(one.trim());
                 var select = document.getElementById('degree_id');

                 for(var i = 0 ; i< degrees.length ; i++){
                     var option   =document.createElement('option');
                     option.value =degrees[i]['id'];
                     option.text  =degrees[i]['degree_'+"{{app()->getLocale()}}"];
                     select.appendChild(option);
                 }
             });
         }

         $('#degree_id_refresh').click(function (){ DegreeGet(); });

         //First Execute that function
         DegreeGet();

     </script>

     <script>
         //ajax jquery

         function LevelExperienceGet(){
             document.getElementById('level_experience_id').textContent = '';
             $.get("{{url('experience')}}",function (one,two){
                 //console.log(JSON.parse(one.trim()));
                 var expeiences = JSON.parse(one.trim());
                 var select = document.getElementById('level_experience_id');

                 for(var i = 0 ; i< expeiences.length ; i++){
                     var option   =document.createElement('option');
                     option.value =expeiences[i]['id'];
                     option.text  =expeiences[i]['level_experience_'+"{{app()->getLocale()}}"];
                     select.appendChild(option);
                 }
             });
         }

         $('#level_experience_id_refresh').click(function (){ LevelExperienceGet(); });

         //First Execute that function
         LevelExperienceGet();

     </script>

     <script>// script of address for mwizard step

         //ajax jquery

         function GetCities(country_id){
             document.getElementById('city_id').textContent = '';

             $.get("{{url('cities')}}" + "/" + country_id,function (one,two){
                 //console.log(JSON.parse(one.trim()));
                 var cities = JSON.parse(one.trim());
                 var select = document.getElementById('city_id');

                 for(var i = 0 ; i< cities.length ; i++){
                     var option   =document.createElement('option');
                     option.value =cities[i]['id'];
                     option.text  =cities[i]['name_'+"{{app()->getLocale()}}"];
                     select.appendChild(option);
                 }
             });
         }

     </script>

     <script>// script user form wizard step

         function GenerateUsername(){
             $.get("{{url('generate-username')}}",function (one){
                 //console.log(one.trim());
                 document.getElementById('username').value = one.trim();
             });
         }

         $('#usergenerate').click(function (){
             GenerateUsername();
         });


     </script>

 @endsection



