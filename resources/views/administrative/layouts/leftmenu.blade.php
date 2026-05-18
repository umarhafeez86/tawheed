<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
@php
use App\Models\Wlusergroups;
use App\Models\Wlleftmenu;

$currnet_usergroups_permissions = Wlusergroups::where('usergroups_id',session()->get("adminusergroups_id"))->valueOrFail("usergroups_permissions");
$current_allowed_menu	 =	explode(",",$currnet_usergroups_permissions);

$leftmenus = Wlleftmenu::tree();
@endphp        
@foreach ($leftmenus as $leftmenu) 
@if (in_array($leftmenu->leftmenuid."_v",$current_allowed_menu))
        @if (count($leftmenu->children) > 0)
        <li> 
            <a @if ($page_name == $leftmenu->leftmenu_name2) class="active" @endif href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1_{{ $leftmenu->leftmenuid }}">
                <div class="pull-left">
                    <i class="zmdi {{ $leftmenu->leftmenu_icon }} mr-20"></i>
                     <span class="right-nav-text">
                            {{ $leftmenu->leftmenu_name }}
                     </span>
                </div>
                <div class="pull-right">
                     <i class="zmdi zmdi-caret-down"></i>
                </div>
                <div class="clearfix"></div>
            </a>
            <ul id="dropdown_dr_lv1_{{ $leftmenu->leftmenuid }}" class="collapse collapse-level-1">
                @foreach ($leftmenu->children as $Subleftmenu) 
                @if (in_array($Subleftmenu->leftmenuid."_v",$current_allowed_menu))
                <li>
                    <a href="{{ url($Subleftmenu->leftmenu_link) }}" @if ($subpage_name == $Subleftmenu->leftmenu_name2) class="active" @endif >&raquo; {{ $Subleftmenu->leftmenu_name }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </li>  

        @else
         <li>
            <a @if ($page_name == $leftmenu->leftmenu_name) class="active" @endif href="{{ url($leftmenu->leftmenu_link) }}">
            <div class="pull-left">
                 <i class="zmdi {{ $leftmenu->leftmenu_icon }} mr-20"></i>
                 <span class="right-nav-text">{{ $leftmenu->leftmenu_name }}</span>
            </div><div class="clearfix"></div>
            </a>
        </li>        
        @endif 
@endif 
@endforeach  
    </ul>
</div>