<?php

use App\Models\Wlusergroups;
use App\Models\Settings;

use Carbon\Carbon;


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

if (!function_exists('get_bookedby_info')){
    function get_bookedby_info(){
        $orders = [
            ['personimage' => 'male', 'name' => 'Shahid', 'item' => '4 star Umrah Package', 'time' => Carbon::now()->subMinutes(5)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Ayesha Khanom', 'item' => 'December Umrah Package', 'time' => Carbon::now()->subMinutes(12)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Shahida Bi Shanrou', 'item' => 'Ramadan Umrah Package', 'time' => Carbon::now()->subMinutes(15)->diffForHumans()],
            ['personimage' => 'male', 'name' => 'Abdul Goni Shorif', 'item' => '4 star Umrah Package', 'time' => Carbon::now()->subMinutes(22)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Nureha Begum', 'item' => 'December Umrah Package', 'time' => Carbon::now()->subMinutes(26)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Amal Adam', 'item' => 'Ramadan Umrah Package', 'time' => Carbon::now()->subMinutes(30)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Wahy Ahmed Yahya', 'item' => '5 Star Umrah Package', 'time' => Carbon::now()->subMinutes(34)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Saif ul Islam Hamid', 'item' => 'October Umrah Package', 'time' => Carbon::now()->subMinutes(38)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Rashid Mehmood Kiyani', 'item' => 'Easter Umrah Package', 'time' => Carbon::now()->subMinutes(40)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Diaa Hisham Al Mohtadi', 'item' => '4 Star Package', 'time' => Carbon::now()->subMinutes(44)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Mohamed Adawah Abdi', 'item' => 'February Umrah Package', 'time' => Carbon::now()->subMinutes(45)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Mohammed Ayathul', 'item' => '5 Star Package in February', 'time' => Carbon::now()->subMinutes(46)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'ABM Samsur Rahman', 'item' => '4 Star Package in November', 'time' => Carbon::now()->subMinutes(50)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Yasmin Jade Mirza', 'item' => '4 Star Package', 'time' => Carbon::now()->subMinutes(52)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Nurul Islam Habib', 'item' => '4 Star Package', 'time' => Carbon::now()->subMinutes(54)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Wais Mehmood', 'item' => 'Umrah package in December', 'time' => Carbon::now()->subMinutes(56)->diffForHumans()],
            ['personimage' => 'female', 'name' => 'Soban Waheed', 'item' => 'Umrah package in November', 'time' => Carbon::now()->subHour()->diffForHumans()],
        ];
        return $orders;
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

