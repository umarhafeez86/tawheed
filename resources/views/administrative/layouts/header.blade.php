<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="mobile-only-brand pull-left">
        <div class="nav-header pull-left">
            <div class="logo-wrap">
                <a href="{{ url('administrative') }}">
                    <img class="brand-img" src="{{ asset('uploads/settings/'.get_siteinfo('favicon_logo')) }}" alt="{{ env('App_Name') }}"/>
                    <span class="brand-text">{{ env('App_Name') }}</span>
                </a>
            </div>
        </div>	
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
    </div>
    <div id="mobile_only_nav" class="mobile-only-nav pull-right">
        <ul class="nav navbar-right top-nav pull-right">
            <li class="dropdown auth-drp">
                <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('uploads/settings/'.get_siteinfo('favicon_logo')) }}" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li>
                        <a href="{{ url('administrative/main/change_pass') }}"><i class="zmdi zmdi-card"></i><span>Change Password</span></a>
                    </li>
                    
                    @if (Session::has('admin_id')) 
                    <li>
                        <a href="{{ url('administrative/settings/edit/1') }}"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                    </li>                           
                    @endif
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('administrative/logout') }}"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>	
</nav>