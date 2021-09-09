@extends('layouts.app')



@section('title-header')
@endsection



@section('css')
@endsection




@section('main-container')


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">

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
                    <div class="pull-left">
                        <h4 class="text-blue h4">@lang('app.add transaction')</h4>
                    </div>
                </div>
                <form method="post" action="{{route('add_transactions')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="form-group" id="teller">
                                <label>@lang('app.teller/accountant')</label>
                                <input type="text"  name="teller" value="@if(session()->has('user_login')) {{\App\Employee::find((session()->get('user_login'))[0]['employee_id'])->{'full_name_'.app()->getLocale()} }} @endif" class="form-control" readonly="">
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <div class="form-group" >
                                <label>@lang('app.money')</label>
                                <input  type="text" value="0" name="money">
                            </div>
                        </div>




                        @error('money')
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>error</label>
                                <button type="submit" class="btn btn-danger  form-control active "><i class="fa fa-warning"></i></button>
                            </div>
                        </div>
                        @enderror


                        <div class="col-md-6 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" checked onchange="window.location.reload()" value="employee" type="radio" name="Pay" id="employee">
                                <label class="form-check-label" for="employee">
                                    employee
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" onchange="another_recipient()" value="another"  type="radio" name="Pay" id="another">
                                <label class="form-check-label" for="another">
                                    another
                                </label>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <div class="form-group" id="recipient">
                                <label>@lang('app.recipient')</label>
                                <select class="form-control" name="recipient"  >
                                    <option ></option>
                                @foreach(\App\Employee::all() as $employee)
                                    <option value="{{$employee->{'full_name_'.app()->getLocale()} }}">{{$employee->{'full_name_'.app()->getLocale()} }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" checked onchange="window.location.reload()"  type="radio" name="type" id="typs">
                                <label class="form-check-label" for="typs">
                                    types
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" onchange="another_type()"   type="radio" name="type" id="another2">
                                <label class="form-check-label" for="another2">
                                    another2
                                </label>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <div class="form-group" id="type">
                                <label>@lang('app.type of transaction')</label>
                                <select class="form-control" name="type"  >
                                    <option ></option>
                                @foreach(\App\TypeTransaction::all() as $type)
                                        <option value="{{$type->{'name_'.app()->getLocale()} }}">{{$type->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group" >
                                <label>@lang('app.add')</label>
                                <button type="submit" class="btn btn-primary form-control active">@lang('app.add')</button>
                            </div>
                        </div>





                    </div>





                </form>
            </div>


            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
            </div>

        </div>
    </div>



@endsection







@section('scripts')
    @include('layouts.basic_scripts')

    <script src="{{asset('them/vendors/scripts/datatable-setting.js')}}"></script>
    <script src="{{asset('them/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('them/vendors/scripts/advanced-components.js')}}"></script>


    <script>
        $("input[name='money']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
    </script>
    <script>
        function another_recipient(){
            let label = document.createElement('label');
            label.textContent = '@lang('app.recipient')'

            let input = document.createElement('input')
            input.type = "text"
            input.classList = "form-control"
            input.name = "recipient"

            $('#recipient').html('')
            $('#recipient').append(label)
            $('#recipient').append(input)


        }
        function another_type(){
            let label = document.createElement('label');
            label.textContent = '@lang('app.type of transaction')'

            let input = document.createElement('input')
            input.type = "text"
            input.classList = "form-control"
            input.name = "type"

            $('#type').html('')
            $('#type').append(label)
            $('#type').append(input)


        }
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






