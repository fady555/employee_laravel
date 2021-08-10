@extends('layouts.app')

@section('title-header')
    {{$employee[0]['full_name_'.app()->getLocale()]}}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">
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
                            <table id="TableData" class="data-table table hover multiple-select-row  nowrap">
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
                                                                <li class="list-group-item">{{$employee[0]['addresses']['city']?$employee[0]['addresses']['city']['name_'.app()->getLocale()]:""}}</li>
                                                                <li class="list-group-item">@lang('app.code'):{{$employee[0]['addresses']['city']?$employee[0]['addresses']['city']['code']:""}}</li>
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


@endsection

