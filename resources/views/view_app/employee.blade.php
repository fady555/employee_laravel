@extends('layouts.app')







@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
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
                                    <h4>DataTable</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">@lang('app.employee')</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@lang('app.show employee')</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        January 2018
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Export List</a>
                                        <a class="dropdown-item" href="#">Policies</a>
                                        <a class="dropdown-item" href="#">View Assets</a>
                                    </div>
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
                                    <th class="table-plus datatable-nosort">@lang('app.name')</th>
                                    <th>@lang('app.age')</th>
                                    <th>@lang('app.jop')</th>
                                    <th>@lang('app.address')</th>
                                    <th>@lang('app.start date')</th>
                                    <th>@lang('app.salary')</th>
                                    <th>@lang('app.action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="table-plus">{{ $employee->{'full_name_'.app()->getLocale()} }}</td>
                                        <td>{{ $employee->age }}</td>
                                        <td>{{ $employee->jop->{'name_'.app()->getLocale()} }}</td>
                                        <td>{{ $employee->addresses->{'address_desc_'.app()->getLocale()} }}</td>
                                        <td>{{ $employee->data_of_start_work }}</td>
                                        <td>{{ $employee->salary->fixed_salary }}</td>
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
@section('main-container')
<div class="main-container">
                <div class="pd-ltr-20 xs-pd-20-10">
                    <div class="min-height-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="title">
                                        <h4>DataTable</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-md-6 col-sm-12 text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            January 2018
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Export List</a>
                                            <a class="dropdown-item" href="#">Policies</a>
                                            <a class="dropdown-item" href="#">View Assets</a>
                                        </div>
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
                                            <td>--------</td>
                                            <td class="table-plus">@lang('app.personal identity img')</td>
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
                                                ---------
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
                                            <td>--------</td>
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
                                                ---------
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


@elseif($action == 'edit')
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
    <script src="{{asset('them/vendors/scripts/datatable-setting.js')}}"></script></body>
    <script>
//TableData
    </script>
@endsection



