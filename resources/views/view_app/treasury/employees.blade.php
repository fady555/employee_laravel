@extends('layouts.app')



@section('title-header')
    @lang('app.employees')
@endsection



@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
@endsection




@section('main-container')


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">

            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>@lang('app.employees')</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('treasury')}}">@lang('app.treasury')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('app.employee')</li>
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

            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">@lang('app.employees by salary')</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table hover multiple-select-row nowrap">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">@lang('app.name by en')</th>
                            <th class="table-plus datatable-nosort">@lang('app.name by ar')</th>
                            <th class="table-plus datatable-nosort">@lang('app.start date')</th>
                            <th>@lang('app.salary')</th>
                            <th class="table-plus datatable-nosort">@lang('app.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td class="table-plus">{{$employee->full_name_en}}</td>
                            <td class="table-plus">{{$employee->full_name_ar}}</td>
                            <td>{{$employee->data_of_start_work}}</td>
                            <td><a href="{{route('employee_treasury',['id'=>$employee->id,'month'=>ltrim(date('m'),0)])}}" class="margin-5 btn btn-warning btn-sm">( $162,700 )got to table salary</a></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{route('employee_treasury',['id'=>$employee->id,'month'=>ltrim(date('m'),0)])}}"><i class="dw dw-eye"></i> @lang('app.show details salary')</a>
                                        <a class="dropdown-item" href=""><i class="dw dw-add"></i> @lang('app.add loan')</a></a>
                                        <a class="dropdown-item" href=""><i class="dw dw-add"></i> @lang('app.add')</a></a>
                                        <a class="dropdown-item" href=""><i class="dw dw-add"></i> @lang('app.add')</a></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- multiple select row Datatable End -->

        </div>

    </div>



@endsection







@section('scripts')
    @include('layouts.basic_scripts')
    <script src="{{asset('them/vendors/scripts/datatable-setting.js')}}"></script>
@endsection






