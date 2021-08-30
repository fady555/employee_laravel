@extends('layouts.app')

@section('title-header')
    @lang('app.type of work')
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
                        <h4 class="text-blue h4">@if(empty(request()->segment(4)))@lang('app.create level experience') @else @lang('app.edit level experience') @endif </h4>
                    </div>
                </div>

                @if(empty(request()->segment(4)))
                    <form method="post" action="{{route('add_type_work')}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="work_type_en">
                                    <label>@lang('app.type of work name english')</label>
                                    <input type="text" name="work_type_en" value="{{old('work_type_en')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="work_type_ar">
                                    <label>@lang('app.type of work name arabic')</label>
                                    <input type="text" name="work_type_ar" value="{{old('work_type_ar')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="work_type_fr">
                                    <label>@lang('app.type of work name france')</label>
                                    <input type="text" name="work_type_fr" value="{{old('work_type_fr')}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group" id="description_en">
                                    <label>@lang('app.type of work description english')</label>
                                    <textarea name="description_en"  class="form-control">{{old('description_en')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group" id="description_ar">
                                    <label>@lang('app.type of work description arabic')</label>
                                    <textarea name="description_ar"  class="form-control">{{old('description_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group" id="description_fr">
                                    <label>@lang('app.type of work description france')</label>
                                    <textarea name="description_fr"  class="form-control">{{old('description_fr')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">@lang('app.create/update type of work')</button>
                                </div>
                            </div>
                        </div>

                    </form>
                @else
                    <form method="post" action="{{route('edit_type_work',[request()->segment(4)])}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="work_type_en">
                                    <label>@lang('app.type of work name english')</label>
                                    <input type="text" name="work_type_en" value="{{old('work_type_en',$type->work_type_en)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="work_type_ar">
                                    <label>@lang('app.type of work name arabic')</label>
                                    <input type="text" name="work_type_ar" value="{{old('work_type_ar',$type->work_type_ar)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="work_type_fr">
                                    <label>@lang('app.type of work name france')</label>
                                    <input type="text" name="work_type_fr" value="{{old('work_type_fr',$type->work_type_fr)}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group" id="description_en">
                                    <label>@lang('app.type of work description english')</label>
                                    <textarea name="description_en"  class="form-control">{{old('description_en',$type->description_en)}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group" id="description_ar">
                                    <label>@lang('app.type of work description arabic')</label>
                                    <textarea name="description_ar"  class="form-control">{{old('description_ar',$type->description_ar)}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group" id="description_fr">
                                    <label>@lang('app.type of work description france')</label>
                                    <textarea name="description_fr"  class="form-control">{{old('description_fr',$type->description_fr)}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">@lang('app.create/update level experience')</button>
                                </div>
                            </div>
                        </div>

                    </form>
            @endif


            <!-- Simple Datatable start -->
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">@lang('app.type of work')</h4>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                            <th>@lang('app.type of work name english')</th>
                            <th>@lang('type of work name arabic')</th>
                            <th>@lang('type of work name france')</th>
                            <th>@lang('app.action')</th>
                            <th>@lang('app.type of work description english')</th>
                            <th>@lang('app.type of work description arabic')</th>
                            <th>@lang('app.type of work description france')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>{{$type->work_type_en}}</td>
                                <td>{{$type->work_type_ar}}</td>
                                <td>{{$type->work_type_fr}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('show_type_work_id',['id'=>$type->id])}}"><i class="dw dw-edit2"></i> @lang('app.edit')</a>
                                            <a class="dropdown-item" onclick="DeleteType({{$type->id}})" href="javascript:;"><i class="dw dw-delete-3"></i> @lang('app.delete')</a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$type->description_en}}</td>
                                <td>{{$type->description_ar}}</td>
                                <td>{{$type->description_fr}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

    <script>
        function DeleteType(id){

            swal({
                title: "@lang('app.are you sure to delete')",
                //input: 'text',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: 'yes',
                showLoaderOnConfirm: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                preConfirm: function (nik_name) {

                    $.post('{{route('delete_type_work')}}' +'/'+ id,{'_token':'{{@csrf_token()}}'},function (one,two,three){

                        if(one == 1){
                            swal({
                                position: 'top-end',
                                type: 'success',
                                title: "@lang('app.your work has been completed')",
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.location.reload()
                        }else {
                            swal({
                                type: 'error',
                                title: '{{__("app.no type of work exist")}}',
                                text: '{{__("app.something went wrong")}}',
                            })
                        }


                    })
                    //console.log('delete')



                }


            })

        }
    </script>

    <script>
        function sweetSuc(message){
            swal({
                position: 'top-end',
                type: 'success',
                title: message,
                showConfirmButton: false,
                timer: 3000,
            })
        }

        @if(session()->has('suc'))
        sweetSuc("{{session()->get('suc')}}")
        @endif
    </script>


    @if($errors->any())
        @foreach($errors->getMessages() as $key => $error)
            <script> DangerValidate('{{$key}}','{{$error[0]}}') </script>
        @endforeach
    @endif




@endsection


