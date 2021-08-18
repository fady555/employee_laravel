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
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index.html">Dashboard style 1</a></li>
                        <li><a href="index2.html">Dashboard style 2</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">@lang('app.employees')</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('show_employees')}}">@lang('app.show employees')</a></li>
                        <li><a href="{{route('add_employee')}}">@lang('app.add employee')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="sitemap.html" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-diagram"></span><span class="mtext">Sitemap</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
