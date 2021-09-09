@extends('layouts.app')



@section('title-header')
    @lang('app.show details salary')
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
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>@lang('app.year')</label>
                            <select class="selectpicker form-control" disabled data-size="5" data-style="btn-outline-primary">
                                <option>{{date('Y')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>@lang('app.month')</label>
                            <select onchange="ClickSelect(this.value)" class="selectpicker form-control" data-size="5" data-style="btn-outline-primary">

                                <option value="{{date('m')}}">{{date('M(m)')}}</option>

                                @for($m=1; $m<=12; $m++)
                                    <option value="{{$m}}">{{date('F', mktime(0,0,0,$m,1))}} ({{ $m }}) </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <img src="{{asset('them/vendors/images/photo1.jpg')}}" alt="" class="avatar-photo">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <h3>{{ $employee->{"full_name_".app()->getLocale()} }}</h3>
                    </div>
                </div>

            </div>

            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">@lang('app.table salary of month')  {{ date('F', mktime(0,0,0,request()->segment(5),1)) }} ({{request()->segment(5)}})  @lang('app.for employee') <h3 class="text-danger"> {{ $employee->{"full_name_".app()->getLocale()} }}</h3> </h4>
                </div>
                <div class="pb-20">
                    <table class="table  data-table-export-salary">
                        <thead>
                        <tr>
                            <th class="bg-warning">#</th>
                            <th class="bg-warning">@lang('app.value')</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >@lang('app.number of day month') {{ date('F', mktime(0,0,0,request()->segment(5),1)) }}({{request()->segment(5)}})</td>
                            <td id="day_month">{{ cal_days_in_month(CAL_GREGORIAN,request()->segment(5),'2021')}} </td>
                        </tr>
                        <tr>
                            <td  >@lang('app.fixed_salary')</td>
                            <td id="fixed_salary">{{$employee->salary->fixed_salary}}</td>
                        </tr>
                        <tr>
                            <td >@lang('app.number of time work')</td>
                            <td>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <input id="demoH" type="text" value="8" name="demoH">
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td >@lang('app.the day salary for employee')</td>
                            <td id="day_salary">---</td>
                        </tr>
                        <tr>
                            <td >@lang('app.the hour salary for employee')</td>
                            <td id="hour_salary">---</td>
                        </tr>
                        <tr>
                            <td >@lang('app.the hour number overtime for employee')</td>
                            <td id="extra_hour">{{json_decode($employee->salary->extra_work)->month->{'month_'.request()->segment(5).'_h'} }}</td>
                        </tr>

                        <tr>
                            <td class="bg-info">@lang('app.the hour value salary overtime for employee')</td>
                            <td id="over_time_value">---</td>
                        </tr>
                        <tr>
                            <td class="bg-info" >@lang('app.another increments')</td>
                            <td>
                                <table class="table table-bordered table-sm text-center mx-w-150">

                                    <thead>
                                    <tr class="bg-warning">
                                        <th class="fa fa-money" scope="col"></th>
                                        <th scope="col">@lang('app.responsibility_allowance')</th>
                                        <th scope="col">@lang('app.wife_and_children_allowance')</th>
                                        <th scope="col">@lang('app.natural_work')</th>
                                        <th scope="col">@lang('app.promotion_bonus')</th>
                                        <th scope="col">@lang('app.specialization_bonus')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="bg-info text-sm-right" scope="row">$</th>
                                        <th id="responsibility_allowance" class="bg-info" scope="row">{{json_decode($employee->salary->responsibility_allowance)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="wife_and_children_allowance" class="bg-info" scope="row">{{json_decode($employee->salary->wife_and_children_allowance)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="natural_work" class="bg-info" scope="row">{{json_decode($employee->salary->natural_work)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="promotion_bonus" class="bg-info" scope="row">{{json_decode($employee->salary->promotion_bonus)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="specialization_bonus" class="bg-info" scope="row">{{json_decode($employee->salary->specialization_bonus)->month->{'month_'.request()->segment(5)} }}</th>
                                    </tr>
                                    </tbody>

                                    <thead>
                                    <tr class="bg-warning">
                                        <th class="fa fa-money" scope="col"></th>
                                        <th scope="col">@lang('app.transport')</th>
                                        <th scope="col">@lang('app.supplement_salary')</th>
                                        <th scope="col">@lang('app.rewards')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th id="" class="bg-info text-sm-right" scope="row">$</th>
                                        <th id="transport"  class="bg-info" scope="row">{{json_decode($employee->salary->transport)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="supplement_salary"  class="bg-info" scope="row">{{json_decode($employee->salary->supplement_salary)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="rewards"  class="bg-info" scope="row">{{json_decode($employee->salary->rewards)->month->{'month_'.request()->segment(5)} }}</th>
                                    </tr>
                                    </tbody>


                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-success">@lang('app.total_dues')</td>
                            <td id="total_dues">---</td>
                        </tr>
                        <tr>
                            <td class="bg-danger">@lang('app.borrow')</td>
                            <td id="borrow">{{json_decode($employee->salary->borrow)->month->{'month_'.request()->segment(5)."_$"} }}</td>
                        </tr>
                        <tr>
                            <td class="bg-danger">@lang('app.number day absence')</td>
                            <td id="day_absence">{{json_decode($employee->salary->day_absence)->month->{'month_'.request()->segment(5)."_day"} }}</td>
                        </tr>
                        <tr>
                            <td class="bg-danger">@lang('app.value day absence')</td>
                            <td id="value_day_absence">---</td>
                        </tr>
                        <tr>
                            <td class=" bg-danger">@lang('app.another discounts')</td>
                            <td>
                                <table class="table table-bordered table-sm text-center mx-w-150">

                                    <thead>
                                    <tr class="bg-warning">
                                        <th scope="col">@lang('app.loan')</th>
                                        <th scope="col">@lang('app.health_insurance')</th>
                                        <th scope="col">@lang('app.tax_income')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th id="loan" class="bg-danger" scope="row">{{$employee->salary->loan }}</th>
                                        <th id="health_insurance" class="bg-danger" scope="row">{{json_decode($employee->salary->health_insurance)->month->{'month_'.request()->segment(5)} }}</th>
                                        <th id="tax_income" class="bg-danger" scope="row">{{json_decode($employee->salary->tax_income)->month->{'month_'.request()->segment(5)} }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-success">@lang('app.total_discounts')</td>
                            <td id="total_discounts">---</td>
                        </tr>
                        <tr>
                            <td class="bg-warning">@lang('app.total due for an employee')</td>
                            <td id="total_due_for_an_em">---</td>
                        </tr>
                        <tr>
                            <td class="bg-warning">@lang('app.total due for an employee by word')</td>
                            <td id="total_due_for_an_em_set_by_word">---</td>
                        </tr>
                        <tr>
                            <td class="">@lang("app.accountant's signature"):-</td>
                            <td class="">@lang("app.employee's signature"):-</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->


            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>@lang('app.paid for employee')</h4>
                        </div>

                        <div class="custom-control custom-checkbox mb-5">
                            <button id="chaining-alert" class="btn btn-warning btn-block btn-lg ">@lang('app.paid for employee')  <i class="icon-copy dw dw-money-2"> <h2 id="status_paid" class="margin-5 text-white text-right">------</h2> </i></button>
                            <a href="#" class="btn btn-danger btn-block btn-sm ">@lang('app.add borrow for employee') <i class="icon-copy dw dw-add"></i></a>
                            <a href="#" class="btn btn-warning btn-block btn-sm ">@lang('app.add loan for employee') <i class="icon-copy dw dw-add"></i></a>
                            <a href="#" class="btn btn-danger btn-block btn-sm ">@lang('app.add discount for employee') <i class="icon-copy dw dw-add"></i></a>
                            <a href="#" class="btn btn-info btn-block  btn-sm">@lang('app.add another for employee') <i class="icon-copy dw dw-add"></i></a>
                        </div>

                    </div>
                </div>
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
        function ClickSelect(month){
            window.location.href = "{{url('treasury/employee')}}" + "/" + "{{request()->segment('4')}}" + "/" + month ;
        }
    </script>

    <script>
        $('.data-table-export-salary').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            bPaginate:false,
            responsive: true,
            columns: [
                { orderable: true },
                null,
                null,
                null,
                null
            ],
            dom: 'Bfrtp',
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ]
        });
    </script>


    <script>
        $('.data-table-export-all').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            bPaginate:false,
            responsive: true,
            dom: 'Bfrtp',
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ]
        });
    </script>


    <script>
        $("input[name='demoH']").TouchSpin({
            min: 0,
            max: 24,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'H'
        });
        /*$("input[name='demoH']").change('change',function (){
            alert('fdfd')
        })*/
    </script>

    <script>
        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return; var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str;
        }
    </script>

    <script>
        function calculate(){
            let day_month= parseInt($('#day_month').text())
            let fixed_salary= parseInt($('#fixed_salary').text())
            let number_hour_in_day_work= parseInt($('#demoH').val())

            let day_salary_set= parseInt($('#day_salary').text(fixed_salary/day_month))
            let day_salary_get= parseInt($('#day_salary').text())

            let hour_salary_set= parseInt($('#hour_salary').text(day_salary_get/number_hour_in_day_work))
            let hour_salary_get= parseInt($('#hour_salary').text())

            let extra_hour= parseInt($('#extra_hour').text())

            let over_time_value_set= parseInt($('#over_time_value').text(extra_hour * hour_salary_get))
            let over_time_value_get= parseInt($('#over_time_value').text())



            let responsibility_allowance=parseInt($('#responsibility_allowance').text())
            let wife_and_children_allowance=parseInt($('#wife_and_children_allowance').text())
            let natural_work=parseInt($('#natural_work').text())
            let promotion_bonus=parseInt($('#promotion_bonus').text())
            let specialization_bonus=parseInt($('#specialization_bonus').text())
            let transport=parseInt($('#transport').text())
            let supplement_salary=parseInt($('#supplement_salary').text())
            let rewards=parseInt($('#rewards').text())


            let total_dues_set=parseInt($('#total_dues').text(
                fixed_salary+over_time_value_get
                +responsibility_allowance
                +responsibility_allowance +wife_and_children_allowance
                +natural_work+promotion_bonus+specialization_bonus+transport
                +supplement_salary+rewards
            ))
            let total_dues_get=parseInt($('#total_dues').text())

            let day_absence=parseInt($('#day_absence').text())

            let value_day_absence_set=parseInt($('#value_day_absence').text(day_absence*day_salary_get))
            let value_day_absence_get=parseInt($('#value_day_absence').text())

            let loan=parseInt($('#loan').text())
            let health_insurance=parseInt($('#health_insurance').text())
            let tax_income=parseInt($('#tax_income').text())

            let total_discounts_set=parseInt($('#total_discounts').text(
                value_day_absence_get+loan+health_insurance+tax_income
            ))
            let total_discounts_get=parseInt($('#total_discounts').text())

            let total_due_for_an_em_set=parseInt($('#total_due_for_an_em').text(total_dues_get-total_discounts_get))

            var  total_due_for_an_em_get=parseInt($('#total_due_for_an_em').text())

            let total_due_for_an_em_set_by_word=parseInt($('#total_due_for_an_em_set_by_word').text(inWords(total_due_for_an_em_get)+ "($)Doler"))


        }


        calculate();

        $("input[name='demoH']").change('change',function (){
            //alert('fdfd')
            calculate();
        })
    </script>


    <script>
        //chaining modal alert
        $('#chaining-alert').click(function () {

            swal.setDefaults({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                animation: false,
                progressSteps: ['1', '2']
            })

           var steps = [
                {
                    title: '@lang('app.first confirm')',
                    text: '@lang("app.write salary")' +" "+parseInt($('#total_due_for_an_em').text())+"$",
                },
               {
                    title: '@lang('app.last confirm')',
                    text: '@lang("app.write salary")' +" "+parseInt($('#total_due_for_an_em').text())+"$",
                },

            ]

            swal.queue(steps).then(function (result) {

                console.log(result.value[1])
                console.log(result.value[0])

                if(result.value[1] == result.value[0] && result.value[1]== parseInt($('#total_due_for_an_em').text()) ){
                    console.log('success')
                    $.post('{{route('employee_treasury_paid',['id_em'=>request()->segment(4),'month'=>request()->segment(5)])}}',{'_token':'{{csrf_token()}}','salary':parseInt($('#total_due_for_an_em').text())},function (data,status){

                        if (data.trim()){$('#status_paid').text('@lang("app.paid complete")');}
                    })
                }else {
                    console.log('faild')
                }

            })
        });


    </script>

    <script>
        $.get('{{route('employee_treasury_cheek_paid',['id_em'=>request()->segment(4),'month'=>request()->segment(5)])}}',function (data,status){
            //('#status_paid').text('paid');
            if(data.trim() == 1){ $('#status_paid').text('@lang("app.paid complete")') }
        })
    </script>

@endsection






