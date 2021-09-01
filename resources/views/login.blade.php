<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>@lang('app.login')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('them/vendors/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('them/vendors/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('them/vendors/images/favicon-16x16.png')}}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/core.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/src/plugins/sweetalert2/sweetalert2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('them/vendors/styles/style.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>



<body class="login-page">
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="{{asset('them/vendors/images/deskapp-logo.svg')}}" alt="">
            </a>
        </div>
        <div class="login-menu">
            <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown show">
                    <a class="btn btn-primary dropdown-toggle"   href="javascript:;" role="button" data-toggle="dropdown" >
                        <i class="fa fa-language"></i>
                        @if (App::isLocale('ar'))
                            العربيه
                        @elseif(App::isLocale('en'))
                            English
                        @elseif(App::isLocale('fr'))
                            Français
                        @else
                            {{app()->getLocale()}}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->has('access_premisses_deny'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('access_premisses_deny')}}<strong><a href="{{URL::previous()}}">Back</a></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{asset('them/vendors/images/login-page-img.png')}}" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">@lang('app.login')</h2>
                    </div>
                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <div class="select-role">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn active">
                                    <input type="radio" name="options" id="admin">
                                    <div class="icon"><img src="{{asset('them/vendors/images/briefcase.svg')}}" class="svg" alt=""></div>
                                    <span>@lang("app.I'm")</span>
                                    @lang('app.manger')
                                </label>
                                <label class="btn">
                                    <input type="radio" name="options" id="user">
                                    <div class="icon"><img src="{{asset('them/vendors/images/person.svg')}}" class="svg" alt=""></div>
                                    <span>@lang("app.I'm")</span>
                                    @lang('app.employee')
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" value="{{old('username')}}" class="form-control form-control-lg  @error('username') form-control-danger @enderror" placeholder="@lang('app.username')" autocomplete="off">
                            @error('username')
                            <div class="form-control-feedback text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control form-control-lg @error('username') form-control-danger @enderror" placeholder="**********">
                            @error('password')
                            <div class="form-control-feedback text-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="row pb-30">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">@lang('app.remember')</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="forgot-password"><a href="forgot-password.html">@lang('app.forget_password')</a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="@lang('app.login')">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- js -->
<script src="{{asset('them/vendors/scripts/core.js')}}"></script>
<script src="{{asset('them/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('them/vendors/scripts/process.js')}}"></script>
<script src="{{asset('them/vendors/scripts/layout-settings.js')}}"></script>
<!-- add sweet alert js & css in footer -->
<script src="{{asset('them/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
<script src="{{asset('them/src/plugins/sweetalert2/sweet-alert.init.js')}}"></script>
<script>
    //Error Message

    function error(){
        swal(
            {
                type: 'error',
                title:'@lang('app.login deny')',
                text: '@lang('app.review login again')',
            }
        )
    }

    function ErrorWithMessage(errors){
        swal(
            {
                type: 'error',
                title:'@lang('app.login deny')',
                text: errors,
            }
        )
    }

</script>

{{-- ===================================star errrror name============================================ --}}
@if ($errors->any())
    <script>
        error();
    </script>
@endif
{{-- ===================================end errrrorrre name============================================ --}}
@if(session()->has('login_error'))
    <script>
        ErrorWithMessage('{{session()->get('login_error')}}');
    </script>
@endif


</body>
</html>
