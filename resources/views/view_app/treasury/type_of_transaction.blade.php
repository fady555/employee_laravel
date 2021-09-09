@extends('layouts.app')



@section('title-header')
    @lang('app.type of transaction')
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

                <div class="row">

                    @if($errors->any())

                        @foreach($errors->all() as $error)
                            <div class="col-md-12 col-sm-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$error}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">@lang('app.create type of transaction')</h4>
                    </div>
                </div>
                <form method="post" action="{{route('create_type_transactions')}}">
                    @csrf

                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="form-group" id="name_en">
                                <label>@lang('app.name by en')</label>
                                <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group" id="name_ar">
                                <label>@lang('app.name by ar')</label>
                                <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group" id="name_fr">
                                <label>@lang('app.name by fr')</label>
                                <input type="text" name="name_fr" value="{{old('name_fr')}}" class="form-control">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-block btn-primary">@lang('app.add')</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">@lang('app.type of transaction')</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table hover  nowrap">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">@lang('app.name by en')</th>
                            <th class="table-plus datatable-nosort">@lang('app.name by ar')</th>
                            <th class="table-plus datatable-nosort">@lang('app.name by fr')</th>
                            <th class="table-plus datatable-nosort">@lang('app.action')</th>
                            <th class="table-plus datatable-nosort">@lang('app.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                                <tr>
                                    <form id="form_edit_type_{{$type->id}}" method="post" action="{{route('edit_type_transactions',['id'=>$type->id])}}">
                                        @csrf
                                    <td class="table-plus"><input name="{{'name_en_'.$type->id}}" disabled="disabled" type="text" value="{{old('name_en_'.$type->id,$type->name_en)}}" class="form-control type_id_{{$type->id}} " ></td>
                                    <td class="table-plus"><input name="{{'name_ar_'.$type->id}}" disabled="disabled" type="text" value="{{old('name_ar_'.$type->id,$type->name_ar)}}" class="form-control type_id_{{$type->id}} " ></td>
                                    <td class="table-plus"><input name="{{'name_fr_'.$type->id}}" disabled="disabled" type="text" value="{{old('name_fr_'.$type->id,$type->name_fr)}}" class="form-control type_id_{{$type->id}} " ></td>
                                    </form>
                                    <td class="table-plus">
                                        <button disabled="disabled"  onclick="edit('{{$type->id}}')" class="btn btn-primary  type_id_{{$type->id}}" role="button" aria-disabled="true">@lang('app.edit')</button>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="javascript:;"  onclick="edit_display('type_id_{{$type->id}}')"><i class="dw dw-edit"></i> @lang('app.edit')</a></a>
                                                <form method="post" action="{{route('delete_type_transactions',$type->id)}}">
                                                    @csrf
                                                    <button type="submit" class="btn" ><i class="dw dw-delete-2">@lang('app.delete')</i></button>
                                                </form>
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


    <script>
        function edit_display(type_id){
            let x = "."+type_id;
            let xid = "#"+type_id;
                $(x).removeAttr("disabled");
                $(xid).removeClass('disabled ')
        }
        function edit(type_id){$('#form_edit_type_'+type_id).submit();}
    </script>

    <script>
        function error_append(name_input,error){
            let div = document.createElement('div')
            div.classList = 'form-control-feedback text-danger'
            div.textContent = error;
            $("input[name="+ name_input +"]").after(div)
            let id = name_input.slice(-1)
            $(".type_id_"+id).removeAttr('disabled')

        }
    </script>

    @if($errors->any())
        @foreach($errors->getMessages() as $key => $error)
            <script> error_append('{{$key}}','{{$error[0]}}') </script>
        @endforeach
    @endif




@endsection






