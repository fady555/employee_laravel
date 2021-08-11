@extends('layouts.app')

@section('title-header')
            @lang('app.show employees')
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/sweetalert2/sweetalert2.css')}}">

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
                                    <li class="breadcrumb-item"><a href="index.html">@lang('app.employees')</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@lang('app.show employees')</li>
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
                        <h4 class="text-blue h4">@lang('app.show employees')</h4>
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
                                                <a class="dropdown-item" onclick="Delet_em({{$employee->id}})" href="javascript:;"><i class="dw dw-delete-3"></i> Delete</a>
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



@section('scripts')
    <@include('layouts.basic_scripts')
    <!-- Datatable Setting js -->
    <script src="{{asset('them/vendors/scripts/datatable-setting.js')}}"></script>
    <script src="{{asset('them/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
    <script>
        function Delet_em(id_employee) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success margin-5',
                cancelButtonClass: 'btn btn-danger margin-5',
                buttonsStyling: false
            }).then(function (result) {
                //console.log(result['dismiss']);
                if(result['dismiss'] == "cancel"){
                    console.log('you are cancel delete'+id_employee);
                }else{
                    //if your choose yes delte
                    console.log('you are submit delete'+id_employee);
                    var x = '{{route('delete_employee')}}' + '/' + id_employee;
                    $.post(x,{'_token':'{{csrf_token()}}'},function (one){

                        var res = JSON.parse(one.trim());

                        swal({
                            position: 'top-end',
                            type: res['result'],
                            title: res['message'],
                            showConfirmButton: false,
                            timer: 3000
                        })
                        setTimeout(function (){ window.location.reload();},3000);
                    });
                }
            })
        }
    </script>



@endsection

