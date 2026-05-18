<?php

use App\Models\Wlusergroups;
use App\Models\Settings;

if (!function_exists('p')){
    function p($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('get_formated_date')){
    function get_formated_date($data,$chgformat){
        $resdate = date($chgformat,strtotime($data));
        return $resdate;
    }
}

if (!function_exists('userpermission_status')){
function userpermission_status($cur_user_group,$cur_requested_option){
    $current_user_group	 =	Wlusergroups::where('usergroups_id',$cur_user_group)->first();
        if ($current_user_group){
            $currnet_usergroups_permissions=$current_user_group->usergroups_permissions;

                $data['current_allowed_menu']	 =	explode(",",$currnet_usergroups_permissions);

                if (in_array($cur_requested_option,$data['current_allowed_menu'])){			
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
}
}

if (!function_exists('get_siteinfo')){
    function get_siteinfo($fieldname){
            $site_settings	 =	Settings::select($fieldname)->where('id',1)->first();
            if ($site_settings){
                return $site_settings->$fieldname;    
            }else{
                return false;
            }
    }
}


/******************** SEF URL ***********************/
if (!function_exists('SEF_URLS')){	
    function SEF_URLS($str, $replace=array(), $delimiter='-') 
    {
        $str=trim($str);
        if( !empty($replace) )
        {
            $str = str_replace((array)$replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }
}

