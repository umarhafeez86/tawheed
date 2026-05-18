<?php
namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Settings;
use App\Models\Wladmins;

class SettingsController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"5_v")==true){
        
                $page_name     = "Manage Website";
                $subpage_name  = "Manage Settings";
                
                $settings = Settings::orderBy('created_at','desc')->get();

                return view('administrative.settings.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "settings"      => $settings 
                ]); 
        
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // This method will create
    public function create (){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"5_a")==true){

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.settings.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // This method will store
    public function store (Request $request){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"5_a")==true){
            $rules = [
                'setting_name'         => 'required',
                'setting_address'      => 'required',
                'setting_phone'        => 'required',
                'setting_email'        => 'required',
                'setting_copyrights'   => 'required'
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.settings.create")->withInput()->withErrors($validator);
            }

            $settings = new Settings();
            $settings->setting_name            = $request->setting_name;
            $settings->setting_address         = $request->setting_address;
            $settings->setting_phone           = $request->setting_phone;
            $settings->setting_email           = $request->setting_email;
            $settings->setting_copyrights      = $request->setting_copyrights;
            $settings->setting_fb_link         = $request->setting_fb_link;
            $settings->setting_insta_link      = $request->setting_insta_link;
            $settings->setting_tw_link         = $request->setting_tw_link;
            $settings->setting_linkedin_link   = $request->setting_linkedin_link;
            $settings->setting_whatsappno      = $request->setting_whatsappno;
            $settings->setting_webaddress      = $request->setting_webaddress;
            $settings->setting_phone2          = $request->setting_phone2;

            $settings->currency_symbol         = $request->currency_symbol;
            $settings->price_range             = $request->price_range;
            $settings->filter_nights_values    = $request->filter_nights_values;
            $settings->filter_star_values      = $request->filter_star_values;

            $settings->save();


            return redirect()->route("administrative.settings.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }  
    
    
    // This method will edit
    public function edit ($id){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        //echo $id;
        if (userpermission_status(session()->get('adminusergroups_id'),"5_e")==true){
                $page_name     = "Manage Website";
                $subpage_name  = "Manage Settings";

                    $settings = Settings::findorFail($id);
                    return view('administrative.settings.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'settings'      => $settings
                    ]);
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }


    // This method will update
    public function update ($id, Request $request){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"5_e")==true){

                $settings = Settings::findOrFail($id);

                $rules = [
                    'setting_name'         => 'required',
                    'setting_address'      => 'required',
                    'setting_phone'        => 'required',
                    'setting_email'        => 'required',
                    'setting_copyrights'   => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.settings.edit",$usergroup->settings_id)->withInput()->withErrors($validator);
                }


                $settings->setting_name            = $request->setting_name;
                $settings->setting_address         = $request->setting_address;
                $settings->setting_phone           = $request->setting_phone;
                $settings->setting_email           = $request->setting_email;
                $settings->setting_copyrights      = $request->setting_copyrights;
                $settings->setting_fb_link         = $request->setting_fb_link;
                $settings->setting_insta_link      = $request->setting_insta_link;
                $settings->setting_tw_link         = $request->setting_tw_link;
                $settings->setting_linkedin_link   = $request->setting_linkedin_link;
                $settings->setting_whatsappno      = $request->setting_whatsappno;
                $settings->setting_webaddress      = $request->setting_webaddress;
                $settings->setting_phone2          = $request->setting_phone2;

                $settings->currency_symbol         = $request->currency_symbol;
                $settings->price_range             = $request->price_range;
                $settings->filter_nights_values    = $request->filter_nights_values;
                $settings->filter_star_values      = $request->filter_star_values;
                
                $settings->save();

                if ($request->header_logo != ""){

                    $header_logo      = $request->header_logo;
                    $ext              = $header_logo->getClientOriginalExtension();
                    $header_logoName  = 'logo.'.$ext; //time().'.'.$ext
            
                    $header_logo->move(public_path('uploads/settings/'),$header_logoName);
                    
                    $settings->header_logo = $header_logoName;
                    $settings->save();
            
                }

                if ($request->footer_logo != ""){

                    $footer_logo      = $request->footer_logo;
                    $ext              = $footer_logo->getClientOriginalExtension();
                    $footer_logoName  = 'footer-logo.'.$ext; //time().'.'.$ext
                
                    $footer_logo->move(public_path('uploads/settings/'),$footer_logoName);
                    
                    $settings->footer_logo = $footer_logoName;
                    $settings->save();
                
                }

                if ($request->favicon_logo != ""){

                    $favicon_logo      = $request->favicon_logo;
                    $ext               = $favicon_logo->getClientOriginalExtension();
                    $favicon_logoName  = 'favicon.'.$ext; // time().'.'.$ext
                
                    $favicon_logo->move(public_path('uploads/settings/'),$favicon_logoName);
                    
                    $settings->favicon_logo = $favicon_logoName;
                    $settings->save();
                
                }
            

                return redirect("/administrative/settings/edit/".$settings->id)->with("success","Data Updated Successfully.");

        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }   
    
    // This method will destroy
    public function destroy ($id){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"5_d")==true){
                $settings = Settings::findOrFail($id);
                
                $settings->delete();

                return redirect()->route("administrative.settings.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Settings";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
