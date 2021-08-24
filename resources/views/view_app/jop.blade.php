@extends('layouts.app')

@section('title-header')
   jop
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
@endsection


@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">@lang('app.add jop')</h4>
                    </div>

                </div>

                @if(empty(request()->segment(4)))
                    <form method="post" action="{{route('add_jop')}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="name_en">
                                    <label>@lang('app.jop name english')</label>
                                    <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="name_ar">
                                    <label>@lang('app.jop name arabic')</label>
                                    <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="name_fr">
                                    <label>@lang('app.jop name france')</label>
                                    <input type="text" name="name_fr"  value="{{old('name_fr')}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="nic_name">
                                    <label>@lang('app.nik name')</label>
                                    <input type="text" name="nic_name" value="{{old('nic_name')}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="description_en">
                                    <label>@lang('app.english description')</label>
                                    <textarea type="text" name="description_en" class="form-control">{{old('description_en')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="description_ar">
                                    <label>@lang('app.arabic description')</label>
                                    <textarea type="text" name="description_ar" class="form-control">{{old('description_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="description_fr">
                                    <label>@lang('app.france description')</label>
                                    <textarea type="text" name="description_fr" class="form-control">{{old('description_fr')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">@lang('app.add jop')</button>
                                </div>
                            </div>
                        </div>

                    </form>
                @else
                    <form method="post" action="{{route('edit_jop',[request()->segment(4)])}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="name_en">
                                    <label>@lang('app.jop name english')</label>
                                    <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="name_ar">
                                    <label>@lang('app.jop name arabic')</label>
                                    <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="name_fr">
                                    <label>@lang('app.jop name france')</label>
                                    <input type="text" name="name_fr"  value="{{old('name_fr')}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="nic_name">
                                    <label>@lang('app.nik name')</label>
                                    <input type="text" name="nic_name" value="{{old('nic_name')}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="description_en">
                                    <label>@lang('app.english description')</label>
                                    <textarea type="text" name="description_en" class="form-control">{{old('description_en')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="description_ar">
                                    <label>@lang('app.arabic description')</label>
                                    <textarea type="text" name="description_ar" class="form-control">{{old('description_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="description_fr">
                                    <label>@lang('app.france description')</label>
                                    <textarea type="text" name="description_fr" class="form-control">{{old('description_fr')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">@lang('app.add jop')</button>
                                </div>
                            </div>
                        </div>

                    </form>
                @endif

                <!-- Simple Datatable start -->
                <div class="">
                    <div class="pd-20">
                        <h4 class="text-blue h4">@lang('app.jops')</h4>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">@lang('app.nik name')</th>
                                <th>@lang('app.jop name arabic')</th>
                                <th>@lang('app.jop name france')</th>
                                <th>@lang('app.jop name english')</th>
                                <th class="datatable-nosort">@lang('app.action')</th>
                                <th>@lang('app.english description')</th>
                                <th>@lang('app.arabic description')</th>
                                <th>@lang('app.france description')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jops as $jop)
                                <tr>
                                    <td class="table-plus">{{$jop->nic_name}}</td>
                                    <td>{{$jop->name_en}}</td>
                                    <td>{{$jop->name_ar}}</td>
                                    <td>{{$jop->name_fr}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{route('show_jop_id',['id'=>$jop->id])}}"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$jop->description_en}}</td>
                                    <td>{{$jop->description_ar}}</td>
                                    <td>{{$jop->description_fr}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Simple Datatable End -->

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.basic_scripts')
    <!-- Datatable Setting js -->
    <script src="{{asset('them/vendors/scripts/datatable-setting.js')}}"></script></body>
    <script>
        //DangerValidate
        /*
        <div class="form-group has-danger "  id='age'>
            <label class="form-control-label">Input with danger</label>
            <input type="text" class="form-control form-control-danger">
            <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
        </div>
        */

        function DangerValidate(DivGId,ErrorMessage){
            var DivG = document.getElementById(DivGId)
            DivG.classList = "form-group has-danger"
            DivG.children[1].classList = "form-control form-control-danger"
            //DivG.children[1].value = old


            DivErrCreate = document.createElement('div')
            DivErrCreate.class = "form-control-feedback"
            DivErrCreate.textContent = ErrorMessage;

            DivG.appendChild(DivErrCreate)

            DivG.children[1].onclick = function (){
                DivG.classList.remove('has-danger')
                DivG.children[1].classList.remove('form-control-danger')
                DivG.removeChild(DivG.children[2])
            }

        }
    </script>



    @if($errors->any())
        @foreach($errors->getMessages() as $key => $error)
            <script> DangerValidate('{{$key}}','{{$error[0]}}') </script>
        @endforeach
    @endif





@endsection

