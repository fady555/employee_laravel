@extends('layouts.app')

@section('title-header')
    @lang('app.education')
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}" />
@endsection


@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="text-center">
                        <h4 class="text-blue h4">@if(empty(request()->segment(4)))@lang('app.create degree') @else @lang('app.edit degree') @endif </h4>
                    </div>
                </div>

                @if(empty(request()->segment(4)))
                    <form method="post" action="{{route('add_degree')}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="degree_en">
                                    <label>@lang('app.degree name english')</label>
                                    <input type="text" name="degree_en" value="{{old('degree_en')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="degree_ar">
                                    <label>@lang('app.degree name arabic')</label>
                                    <input type="text" name="degree_ar" value="{{old('degree_ar')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="degree_fr">
                                    <label>@lang('app.degree name france')</label>
                                    <input type="text" name="degree_fr" value="{{old('degree_fr')}}" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">@lang('app.create/update degree')</button>
                                </div>
                            </div>
                        </div>

                    </form>
                @else
                    <form method="post" action="{{route('edit_degree',[request()->segment(4)])}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="degree_en">
                                    <label>@lang('app.degree name english')</label>
                                    <input type="text" name="degree_en" value="{{old('degree_en',$degree->degree_en)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="degree_ar">
                                    <label>@lang('app.degree name arabic')</label>
                                    <input type="text" name="degree_ar" value="{{old('degree_ar',$degree->degree_ar)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group" id="degree_fr">
                                    <label>@lang('app.degree name france')</label>
                                    <input type="text" name="degree_fr" value="{{old('degree_fr',$degree->degree_fr)}}" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">@lang('app.create/update degree')</button>
                                </div>
                            </div>
                        </div>
                    </form>
            @endif


            <!-- Simple Datatable start -->
                <div class="clearfix">
                    <div class="text-center">
                        <h4 class="text-blue h4">@lang('app.degree')</h4>
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                            <th>@lang('app.degree name english')</th>
                            <th>@lang('app.degree name arabic')</th>
                            <th>@lang('app.degree name france')</th>
                            <th>@lang('app.action')</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($degrees as $degree)
                            <tr>
                                <td>{{$degree->degree_en}}</td>
                                <td>{{$degree->degree_ar}}</td>
                                <td>{{$degree->degree_fr}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('show_degree_id',['id'=>$degree->id])}}"><i class="dw dw-edit2"></i> @lang('app.edit')</a>
                                            <a class="dropdown-item" onclick="DeleteDegree({{$degree->id}})" href="javascript:;"><i class="dw dw-delete-3"></i> @lang('app.delete')</a>
                                        </div>
                                    </div>
                                </td>
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
        function DeleteDegree(id){

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

                    $.post('{{route('delete_degree')}}' +'/'+ id,{'_token':'{{@csrf_token()}}'},function (one,two,three){

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
                                title: '{{__("app.no degree exist")}}',
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



