@extends('layouts.app')

@section('title-header')
    @lang('app.edit employee'){{ " ".$employee->{'full_name_'.app()->getLocale()} }}
@endsection

@section('css')
    @include('layouts.styles_add_edit_employee')
@endsection


@section('main-container')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 card-box mb-30">




            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.basic_scripts')
@endsection



