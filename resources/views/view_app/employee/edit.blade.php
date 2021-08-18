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
            <div class="min-height-200px">
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
                @if(session()->has('edit_employee'))
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session()->get('edit_employee')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <h4 class="text-blue h4">@lang('app.add employee')</h4>
                    </div>

                    <div class="wizard-content">

                        <form id="form" class="tab-wizard wizard-circle wizard" method="post" action="{{route('update_employee',['id'=>$employee->id])}}" enctype="multipart/form-data">

                            @csrf
                            <h5 >@lang('app.personal information')

                                @if($errors->has('full_name_en') or $errors->has('full_name_ar')
                                    or $errors->has('full_name_fr') or $errors->has('age')
                                    or $errors->has('email') or $errors->has('phone')
                                    or $errors->has('personal_identity_id')
                                    or $errors->has('personal_identity_img')
                                    or $errors->has('avatar')
                                    or $errors->has('name_of_bank')
                                    or $errors->has('number_of_account')
                                    or $errors->has('number_of_wif_husband')
                                    or $errors->has('number_of_wif_children')
                                    )
                                    <i class="fa fa-warning text-danger d-block" ></i>
                                @endif
                            </h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('full_name_en')has-danger @enderror ">
                                            <label>@lang('app.full_name_en')</label>
                                            <input type="text" name="full_name_en" id="full_name_en" value="{{old('full_name_en',$employee->full_name_en)}}" class="form-control  @error('full_name_en')form-control-danger @enderror " onclick="RemoveError('full_name_en')">
                                            @error('full_name_en')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('full_name_ar')has-danger @enderror ">
                                            <label>@lang('app.full_name_ar')</label>
                                            <input type="text" name="full_name_ar" id="full_name_ar" value="{{old('full_name_ar',$employee->full_name_ar)}}" class="form-control @error('full_name_ar')form-control-danger @enderror "  onclick="RemoveError('full_name_ar')">
                                            @error('full_name_ar')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('full_name_fr')has-danger @enderror ">
                                            <label>@lang('app.full_name_fr')</label>
                                            <input type="text" name="full_name_fr" id="full_name_fr" value="{{old('full_name_fr',$employee->full_name_ar)}}" class="form-control @error('full_name_fr')form-control-danger @enderror "  onclick="RemoveError('full_name_fr')">
                                            @error('full_name_fr')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('age')has-danger @enderror ">
                                            <label>@lang('app.age')</label>
                                            <input type="text" name="age" id="age" value="{{old('age',$employee->age)}}" class="form-control @error('age')form-control-danger @enderror "  onclick="RemoveError('age')">
                                            @error('age')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('email')has-danger @enderror ">
                                            <label>@lang('app.email')</label>
                                            <input type="email" name="email" id="email" value="{{old('email',$employee->email)}}" class="form-control @error('email')form-control-danger @enderror "  onclick="RemoveError('email')">
                                            @error('email')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('phone')has-danger @enderror ">
                                            <label>@lang('app.phone')</label>
                                            <input type="text"  name="phone" id="phone" value="{{old('phone',$employee->phone)}}" class="form-control @error('phone')form-control-danger @enderror "  onclick="RemoveError('phone')">
                                            @error('phone')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('personal_identity_id')has-danger @enderror ">
                                            <label>@lang('app.personal identity id')</label>
                                            <input type="text" name="personal_identity_id" id="personal_identity_id"  value="{{old('personal_identity_id',$employee->personal_identity_id)}}" class="form-control  @error('personal_identity_id')form-control-danger @enderror " onclick="RemoveError('personal_identity_id')" >
                                            @error('personal_identity_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('personal_identity_img')has-danger @enderror ">
                                            <label >@lang('app.personal identity img')</label>
                                            <input type="file"  name="personal_identity_img" id="personal_identity_img"  class="form-control @error('personal_identity_img')form-control-danger @enderror " onclick="RemoveError('personal_identity_img')" >
                                            @error('personal_identity_img')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('avatar')has-danger @enderror ">
                                            <label >@lang('app.personal img')</label>
                                            <input type="file"  name="avatar" id="avatar"  class="form-control @error('avatar')form-control-danger @enderror " onclick="RemoveError('avatar')" >
                                            @error('avatar')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('name_of_bank')has-danger @enderror ">
                                            <label >@lang('app.name of bank')</label>
                                            <input type="text"  name="name_of_bank" id="name_of_bank" value="{{old('name_of_bank',$employee->name_of_bank)}}" class="form-control @error('name_of_bank')form-control-danger @enderror" onclick="RemoveError('name_of_bank')" >
                                            @error('name_of_bank')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('number_of_account')has-danger @enderror ">
                                            <label >@lang('app.name of account')</label>
                                            <input type="text"  name="number_of_account" id="number_of_account" value="{{old('number_of_account',$employee->number_of_account)}}" class="form-control @error('number_of_account')form-control-danger @enderror"  onclick="RemoveError('number_of_account')">
                                            @error('number_of_account')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('number_of_wif_husband')has-danger @enderror ">
                                            <label >@lang('app.number of wif husband')</label>
                                            <input type="text"  name="number_of_wif_husband" id="number_of_wif_husband" value="{{old('number_of_wif_husband',$employee->number_of_wif_husband)}}" class="form-control @error('number_of_wif_husband')form-control-danger @enderror" onclick="RemoveError('number_of_wif_husband')"  >
                                            @error('number_of_wif_husband')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('number_of_wif_children')has-danger @enderror ">
                                            <label >@lang('app.number of wif children')</label>
                                            <input type="text"   name="number_of_wif_children" id="number_of_wif_children" value="{{old('number_of_wif_children',$employee->number_of_wif_children)}}"  class="form-control @error('number_of_wif_children')form-control-danger @enderror" onclick="RemoveError('number_of_wif_children')" >
                                            @error('number_of_wif_children')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!-- Step 2 -->
                            <h5> @lang('app.jop')
                                @if($errors->has('jop_id') or $errors->has('type_id')
                                    or $errors->has('data_of_start_work') or $errors->has('time_of_attendees')
                                    or $errors->has('time_of_going') or $errors->has('contract_file')
                                    or $errors->has('fixed_salary')
                                    )
                                    <i class="fa fa-warning text-danger d-block" ></i>
                                @endif
                            </h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('jop_id')has-danger @enderror ">
                                            <label>@lang('app.jop') <i class="fa fa-refresh" id="jop_id_refresh"></i></label>
                                            <select name="jop_id" id="" class="custom-select form-control @error('jop_id')form-control-danger @enderror" onclick="RemoveError('jop_id')" >
                                                {{------ by ajax ------}}
                                                <option value="{{$employee->jop_id}}">{{ \App\Jop::find($employee->jop_id)->{'name_'.app()->getLocale()} }}</option>
                                                <optgroup id="jop_id" label="{{ \App\Jop::find($employee->jop_id)->{'name_'.app()->getLocale()} }}" data-max-options="2">
                                                    @if(old('jop_id')) <option value="{{old('jop_id')}}">{{ \App\Jop::find(old('jop_id'))->{'name_'.app()->getLocale()} }}</option> @endif
                                                </optgroup>
                                            </select>
                                            @error('jop_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('app.create jop')</label>
                                            <a href="#" class="btn btn-primary  btn-block">@lang('app.create jop')</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('type_id')has-danger @enderror ">
                                            <label>@lang('app.type of work') <i class="fa fa-refresh" id=type_id_refresh"></i></label>
                                            <select name="type_id" id="" class="custom-select form-control @error('type_id')form-control-danger @enderror" onclick="RemoveError('type_id')" >
                                                {{------ by ajax ------}}
                                                <option value="{{$employee->contract->type_id}}">{{ \App\TypeOfWork::find($employee->contract->type_id)->{'work_type_'.app()->getLocale()} }}</option>
                                                <optgroup id="type_id" label="{{ \App\TypeOfWork::find($employee->contract->type_id)->{'work_type_'.app()->getLocale()} }}" data-max-options="2">
                                                    @if(old('type_id')) <option value="{{old('type_id')}}">{{ \App\TypeOfWork::find(old('type_id'))->{'work_type_'.app()->getLocale()} }}</option> @endif
                                                </optgroup>
                                            </select>
                                            @error('type_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('app.create type work')</label>
                                            <a href="#" class="btn btn-primary  btn-block">@lang('app.create type work')</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('data_of_start_work') has-danger @enderror">
                                            <label>@lang('app.start date')</label>
                                            <input type="text" name="data_of_start_work" id="data_of_start_work"  class="form-control date-picker @error('data_of_start_work') form-control-danger @enderror" onclick="RemoveError('data_of_start_work')" placeholder="Select Date">
                                            @error('data_of_start_work')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('time_of_attendees') has-danger @enderror">
                                            <label>@lang('app.time of attendance')</label>
                                            <input type="text" name="time_of_attendees" id="time_of_attendees"  class="form-control time-picker-default td-input @error('time_of_attendees') form-control-danger @enderror" onclick="RemoveError('time_of_attendees')"  >
                                            @error('time_of_attendees')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('time_of_going') has-danger @enderror">
                                            <label>@lang('app.time of going')</label>
                                            <input type="text" name="time_of_going" id="time_of_going"  class="form-control time-picker-default td-input  @error('time_of_going') form-control-danger @enderror" onclick="RemoveError('time_of_going')"  readonly="">
                                            @error('time_of_going')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('contract_file') has-danger @enderror">
                                            <label>@lang('app.contract')</label>
                                            <input type="file" name="contract_file" id="contract_file"  class="form-control  file-upload @error('contract_file') form-control-danger @enderror" onclick="RemoveError('contract_file')" >
                                            @error('contract_file')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('fixed_salary')  has-danger @enderror">
                                            <label>@lang('app.fixed_salary') ($)</label>
                                            <input type="text" name="fixed_salary" id="fixed_salary" value="{{old('fixed_salary',$employee->salary->fixed_salary)}}" class="form-control   @error('fixed_salary') form-control-danger @enderror" onclick="RemoveError('fixed_salary')" >
                                            @error('fixed_salary')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!-- Step 3-->
                            <h5> @lang('app.qualification')
                                @if($errors->has('education_status_id') or $errors->has('degree_id')or $errors->has('level_experience_id') or $errors->has('experience_description') )
                                    <i class="fa fa-warning text-danger d-block" ></i>
                                @endif
                            </h5>
                            <section>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('education_status_id')has-danger @enderror ">
                                            <label>@lang('app.education') <i class="fa fa-refresh" id="education_status_id_refresh"></i></label>
                                            <select name="education_status_id" id="" class="custom-select form-control @error('education_status_id')form-control-danger @enderror" onclick="RemoveError('education_status_id')" >
                                                {{------ by ajax ------}}
                                                <option value="{{$employee->education_status_id}}">{{ \App\EducationStatus::find($employee->education_status_id)->{'education_status_'.app()->getLocale()} }}</option>
                                                <optgroup id="education_status_id" label="{{ \App\EducationStatus::find($employee->education_status_id)->{'education_status_'.app()->getLocale()} }}" data-max-options="2">
                                                    @if(old('education_status_id')) <option value="{{old('education_status_id')}}">{{ \App\EducationStatus::find(old('education_status_id'))->{'education_status_'.app()->getLocale()} }}</option> @endif
                                                </optgroup>
                                            </select>
                                            @error('education_status_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('app.create education status')</label>
                                            <a href="#" class="btn btn-primary  btn-block">@lang('app.create education status')</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('degree_id')has-danger @enderror ">
                                            <label>@lang('app.degree') <i class="fa fa-refresh" id="degree_id_refresh"></i></label>
                                            <select name="degree_id" id="" class="custom-select form-control @error('degree_id')form-control-danger @enderror" onclick="RemoveError('degree_id')" >
                                                {{------ by ajax ------}}
                                                <option value="{{$employee->degree_id}}">{{ \App\Degree::find($employee->degree_id)->{'degree_'.app()->getLocale()} }}</option>
                                                <optgroup id="degree_id" label="{{ \App\Degree::find($employee->degree_id)->{'degree_'.app()->getLocale()} }}" data-max-options="2">
                                                    @if(old('degree_id')) <option value="{{old('degree_id')}}">{{ \App\Degree::find(old('degree_id'))->{'degree_'.app()->getLocale()} }}</option> @endif
                                                </optgroup>                                            </select>
                                            @error('degree_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('app.create degree')</label>
                                            <a href="#" class="btn btn-primary  btn-block">@lang('app.create degree')</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('level_experience_id')has-danger @enderror ">
                                            <label>@lang('app.level experience') <i class="fa fa-refresh" id="level_experience_id_refresh"></i></label>
                                            <select name="level_experience_id" id="" class="custom-select form-control @error('level_experience_id')form-control-danger @enderror" onclick="RemoveError('level_experience_id')" >
                                                {{------ by ajax ------}}
                                                <option value="{{$employee->level_experience_id}}">{{ \App\LevelExperience::find($employee->level_experience_id)->{'level_experience_'.app()->getLocale()} }}</option>
                                                <optgroup id="level_experience_id" label="{{ \App\LevelExperience::find($employee->level_experience_id)->{'level_experience_'.app()->getLocale()} }}" data-max-options="2">
                                                    @if(old('level_experience_id')) <option value="{{old('level_experience_id')}}">{{ \App\LevelExperience::find(old('level_experience_id'))->{'level_experience_'.app()->getLocale()} }}</option> @endif
                                                </optgroup>
                                            </select>
                                            @error('level_experience_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('app.create level experience')</label>
                                            <a href="#" class="btn btn-primary  btn-block">@lang('app.create level experience')</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('experience_description')has-danger @enderror ">
                                            <label>@lang('app.experience description')</label>
                                            <textarea  name="experience_description" id="experience_description" class="form-control  @error('experience_description')form-control-danger @enderror" value="{{old('experience_description')}}" onclick="RemoveError('experience_description')" >{{old('experience_description',$employee->experience_description)}}</textarea>
                                            @error('experience_description')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <!-- Step 4-->
                            <h5> @lang('app.address')
                                @if($errors->has('country_id') or $errors->has('city_id') or $errors->has('address_desc_en')  or $errors->has('address_desc_ar')  or $errors->has('address_desc_fr') )
                                    <i class="fa fa-warning text-danger d-block" ></i>
                                @endif
                            </h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('country_id') has-danger @enderror">
                                            <label>@lang('countries')</label>

                                            <select name="country_id" id="" onchange="GetCities(this.value)" class="custom-select form-control @error('country_id') form-control-danger @enderror">
                                                <option value="{{$employee->addresses->country_id}}">{{ \App\Country::find($employee->addresses->country_id)->{'name_'.app()->getLocale()} }}</option>
                                                <optgroup id="degree_id" label="{{ \App\Country::find($employee->addresses->country_id)->{'name_'.app()->getLocale()} }}" data-max-options="2">
                                                    @if(old('country_id')) <option value="{{old('country_id')}}">{{ \App\Country::find(old('country_id'))->{'name_'.app()->getLocale()} }}</option> @endif
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{ $country->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            @error('country_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('city_id') has-danger @enderror">
                                            <label>@lang('cities')</label>
                                            <select name="city_id" id=""   class="custom-select form-control @error('city_id') form-control-danger @enderror">

                                                @if(!is_null($employee->addresses->city_id)) <option value="{{$employee->addresses->city_id}}">{{ \App\City::find($employee->addresses->city_id)->{'name_'.app()->getLocale()} }}</option> @endif
                                                <optgroup id="city_id" label="" data-max-options="2">
                                                    @if(old('city_id')) <option value="{{old('city_id')}}">{{ \App\City::find(old('city_id'))->{'name_'.app()->getLocale()} }}</option> @endif
                                                </optgroup>

                                            </select>
                                            @error('city_id')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group @error('address_desc_en')has-danger @enderror ">
                                            <label>@lang('app.address_desc_en')</label>
                                            <textarea  name="address_desc_en" id="address_desc_en" class="form-control  @error('address_desc_en')form-control-danger @enderror" value="{{old('address_desc_en')}}" onclick="RemoveError('address_desc_en')" >{{old('address_desc_en',$employee->addresses->address_desc_en)}}</textarea>
                                            @error('address_desc_en')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('address_desc_ar')has-danger @enderror ">
                                            <label>@lang('app.address_desc_ar')</label>
                                            <textarea  name="address_desc_ar" id="address_desc_ar" class="form-control  @error('address_desc_ar')form-control-danger @enderror" value="{{old('address_desc_ar')}}" onclick="RemoveError('address_desc_ar')" >{{old('address_desc_ar',$employee->addresses->address_desc_ar)}}</textarea>
                                            @error('address_desc_ar')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group @error('address_desc_fr')has-danger @enderror ">
                                            <label>@lang('app.address_desc_fr')</label>
                                            <textarea  name="address_desc_fr" id="address_desc_fr" class="form-control  @error('address_desc_fr')form-control-danger @enderror" value="{{old('address_desc_fr')}}" onclick="RemoveError('address_desc_fr')" >{{old('address_desc_fr',$employee->addresses->address_desc_fr)}}</textarea>
                                            @error('address_desc_fr')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <!-- Step 4-->
                            <h5> @lang('app.user')
                                @if($errors->has('username') or $errors->has('password') or $errors->has('premisess')or $errors->has('premisess.*') )
                                    <i class="fa fa-warning text-danger d-block" ></i>
                                @endif
                            </h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('username') has-danger @enderror">
                                            <label>@lang('app.username') <i id="usergenerate" class="fa fa-refresh"></i> </label>
                                            <input type="text" name="username" id="username" value="{{old('username',$employee->user->username)}}" class="form-control  @error('username') form-control-danger @enderror" onclick="RemoveError('username')" >
                                            @error('username')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('password') has-danger @enderror">
                                            <label>@lang('app.password') </label>
                                            <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control  @error('password') form-control-danger @enderror" onclick="RemoveError('password')" placeholder="@lang('if empty filed the old password consider')" >
                                            @error('password')<div class="form-control-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($premisess as $premises)
                                        <div class="col-md-4">
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" value="{{$premises->id}}" @if(is_array(json_decode($employee->user->premisses)) and in_array($premises->id,json_decode($employee->user->premisses))) checked @endif() name="premisess[]" @if(is_array(old('premisess')) && in_array($premises->id,old('premisess'))) checked @endif  id="customCheck{{$premises->id}}" class="custom-control-input" >
                                                <label class="custom-control-label" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $premises->{'description_'.app()->getLocale()}  }} " aria-describedby="tooltip329944" for="customCheck{{$premises->id}}">{{$premises->nik_name}} ({{$premises->id}})</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </section>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

    @include('layouts.basic_scripts')
    @include('layouts.scripts_add_edit_employee')
    <script>
        setTimeout(function (){
            document.getElementById('data_of_start_work').value = "{{old('data_of_start_work',date('d M Y',strtotime($employee->data_of_start_work)))}}";
            document.getElementById('time_of_attendees').value = "{{old('time_of_attendees',date('h:m a',strtotime($employee->time_of_attendees)))}}";
            document.getElementById('time_of_going').value = "{{old('time_of_going',date('h:m a',strtotime($employee->time_of_going)))}}";
        },3000);
    </script>

@endsection



