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
                        <h4 class="text-blue h4">اضافه تعامل مالى</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 mb-30">
                        <div class="card text-white bg-warning card-box">
                            <div class="card-header">Header</div>
                            <div class="card-header text-right ">الحساب</div>
                            <div class="card-body">
                                <h1 class="card-title text-white text-center ">50$</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-30">
                        <div class="card text-white bg-warning card-box">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Primary card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-30">
                        <div class="card text-white bg-warning card-box">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Primary card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-30">
                        <div class="card text-white bg-warning card-box">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Primary card title</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">اضافه تعامل مالى</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 mb-30">
                        <a href="#" class="btn btn-success btn-lg btn-block" role="button" aria-disabled="true">Primary link</a>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-30">
                        <a href="#" class="btn btn-success btn-lg btn-block" role="button" aria-disabled="true">Primary link</a>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-30">
                        <a href="#" class="btn btn-success btn-lg btn-block" role="button" aria-disabled="true">Primary link</a>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab" aria-selected="true">Timeline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tasksss" role="tab" aria-selected="false">Tasks</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                        <div class="pd-20" style="overflow-y: scroll;height: 410px">
                                            <div class="profile-timeline ">
                                                <div class="timeline-month">
                                                    <h5>August, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 Aug</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="timeline-month">
                                                    <h5>July, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 July</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 July</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="timeline-month">
                                                    <h5>June, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 June</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 June</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 June</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Timeline Tab End -->
                                    <!-- Tasks Tab start -->
                                    <div class="tab-pane fade" id="tasksss" role="tabpanel">
                                        <div class="pd-20 profile-task-wrap">
                                            hgfhyfgyh
                                        </div>
                                    </div>
                                    <!-- Tasks Tab End -->
                                    <!-- Setting Tab start -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>



@endsection







@section('scripts')
    @include('layouts.basic_scripts')
@endsection






