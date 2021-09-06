<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{asset('them/vendors/images/img.jpg')}}" alt="" class="light-logo rounded">
            {{------
            <img src="{{asset('them/vendors/images/deskapp-logo.svg')}}" alt="" class="dark-logo">

            <img src="{{asset('them/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
             -----}}
            <div class="ml-3">
                <button type="button" class="btn btn-primary btn-lg">

                    @if(session()->has('user_login')) {{\App\Employee::find((session()->get('user_login'))[0]['employee_id'])->{'full_name_'.app()->getLocale()} }} @endif

                </button>
            </div>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">@lang('app.home')</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index.html">Dashboard style 1</a></li>
                        <li><a href="index2.html">Dashboard style 2</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy dw dw-user-3 "></span><span class="mtext">@lang('app.employees')</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('show_employees')}}">@lang('app.show employees')</a></li>
                        <li><a href="{{route('add_employee')}}">@lang('app.add employee')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('show_jop')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-compass-1 "></span><span class="mtext">@lang('app.jops')</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('show_experience')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-compass-1 "></span><span class="mtext">@lang('app.level experience')</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('show_type_work')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-workflow"></span><span class="mtext">@lang('app.type of work')</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('show_education')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-edit-file"></span><span class="mtext">@lang('app.education')</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('show_degree')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-compass-1 "></span><span class="mtext">@lang('app.degree')</span>
                    </a>
                </li>

                <li class="dropdown show">
                    <a href="javascript:;" class="dropdown-toggle" data-options="on">
                        <span class="micon dw dw-money-2"></span><span class="mtext">@lang('app.treasury')</span>
                    </a>
                    <ul class="submenu" style="display: block;">
                        <li><a href="{{route('treasury')}}">@lang('app.dashboard')</a></li>
                        <li><a href="{{route('employees_treasury')}}">@lang('app.employees by salary')</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
