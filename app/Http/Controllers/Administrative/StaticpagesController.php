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
use App\Models\Services;
use App\Models\Servicesdetails;
use App\Models\Staticpages;

class StaticpagesController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"8_v")==true){
        
                $page_name     = "Manage Pages";
                $subpage_name  = "Manage Pages";
                
                $staticpages = Staticpages::orderBy('created_at','desc')->get();

                return view('administrative.staticpages.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "staticpages"   => $staticpages 
                ]); 
        
        }else{

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"8_a")==true){

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

            return view('administrative.staticpages.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"8_a")==true){
            $rules = [
                'pages_name'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.staticpages.create")->withInput()->withErrors($validator);
            }

            $staticpages = new Staticpages();
            $staticpages->pages_name            = $request->pages_name; 
            $staticpages->pages_details         = $request->pages_details;
            if ($request->pages_url!=""){
                $staticpages->pages_url         = $request->pages_url;
            }else{
                $staticpages->pages_url         = SEF_URLS($request->pages_name);
            }
            
            $staticpages->pages_title           = $request->pages_title;
            $staticpages->pages_descp           = $request->pages_descp;
            $staticpages->pages_keyword         = $request->pages_keyword;
            $staticpages->pages_sort            = $request->pages_sort;
            $staticpages->pages_status          = $request->pages_status;
            $staticpages->pages_status_bottom   = $request->pages_status_bottom;
            $staticpages->pages_bottom_incol    = $request->pages_bottom_incol;

            $staticpages->pages_status_header   = $request->pages_status_header;

            $staticpages->save();
            
            if ($request->staticpages_image != ""){

                $staticpages_image       = $request->staticpages_image;
                $ext                     = $staticpages_image->getClientOriginalExtension();
                $staticpages_imageName   = time().'.'.$ext;
        
                $staticpages_image->move(public_path('uploads/pages/'),$staticpages_imageName);
                
                $staticpages->staticpages_image = $staticpages_imageName;
                $staticpages->save();
        
            }

            
            return redirect()->route("administrative.staticpages.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"8_e")==true){
                $page_name     = "Manage Pages";
                $subpage_name  = "Manage Pages";

                    $staticpages = Staticpages::findorFail($id);
                    return view('administrative.staticpages.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'staticpages'   => $staticpages
                    ]);
        }else{

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"8_e")==true){

                $staticpages = Staticpages::findOrFail($id);

                $rules = [
                    'pages_name'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.staticpages.edit",$services->services_id)->withInput()->withErrors($validator);
                }

                $staticpages->pages_name            = $request->pages_name; 
                $staticpages->pages_details         = $request->pages_details;
                if ($request->pages_url!=""){
                    $staticpages->pages_url         = $request->pages_url;
                }else{
                    $staticpages->pages_url         = SEF_URLS($request->pages_name);
                }
                
                $staticpages->pages_title           = $request->pages_title;
                $staticpages->pages_descp           = $request->pages_descp;
                $staticpages->pages_keyword         = $request->pages_keyword;
                $staticpages->pages_sort            = $request->pages_sort;
                $staticpages->pages_status          = $request->pages_status;
                $staticpages->pages_status_bottom   = $request->pages_status_bottom;
                $staticpages->pages_bottom_incol    = $request->pages_bottom_incol;

                $staticpages->pages_status_header   = $request->pages_status_header;
                
                $staticpages->save();
                
                if ($request->staticpages_image != ""){

                    $staticpages_image       = $request->staticpages_image;
                    $ext                     = $staticpages_image->getClientOriginalExtension();
                    $staticpages_imageName   = time().'.'.$ext;
            
                    $staticpages_image->move(public_path('uploads/pages/'),$staticpages_imageName);
                    
                    $staticpages->staticpages_image = $staticpages_imageName;
                    $staticpages->save();
            
                }

                
            return redirect()->route("administrative.staticpages.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"8_d")==true){
                
                $staticpages = Staticpages::findOrFail($id);
                $staticpages->delete();
                
                return redirect()->route("administrative.staticpages.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Pages";
            $subpage_name  = "Manage Pages";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
