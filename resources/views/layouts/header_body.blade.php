<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="ml-3">
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
                <div class="dropdown-menu" style="">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{asset('them/vendors/images/photo1.jpg')}}" alt="">
						</span>
                    <span class="user-name">@if(session()->has('user_login')) {{(session()->get('user_login'))[0]['username']}} @endif </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="#"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
