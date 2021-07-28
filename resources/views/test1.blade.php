@extends('layouts.app')



@section('title-header')
@endsection



@section('css')
@endsection



<?php
$action = "";  ?>
@if($action == 'show')
@elseif($action == 'add')
@elseif($action == 'edit')
@else

@section('main-container')
    <div class="main-container">
        <div class="pd-20 card-box height-100-p">

            <div class="alert alert-danger" role="alert">
                there are not action here
            </div>

        </div>
    </div>
@endsection

@endif





@section('scripts')
@endsection



