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
use App\Models\Partners;

class PartnersController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"14_v")==true){
        
                $page_name     = "Manage Partners";
                $subpage_name  = "Manage Partners";
                
                $partners = Partners::orderBy('created_at','desc')->get();

                return view('administrative.partners.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "partners"      => $partners 
                ]); 
        
        }else{

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"14_a")==true){

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

            return view('administrative.partners.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"14_a")==true){
            $rules = [
                'partners_name'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.partners.create")->withInput()->withErrors($validator);
            }

            $partners = new Partners();
            $partners->partners_name            = $request->partners_name; 
            $partners->partners_link            = $request->partners_link;
            $partners->partners_sort            = $request->partners_sort;
            $partners->partners_status          = $request->partners_status;
            $partners->save();
            
            if ($request->partners_image != ""){

                $partners_image       = $request->partners_image;
                $ext                  = $partners_image->getClientOriginalExtension();
                $partners_imageName   = time().'.'.$ext;
        
                $partners_image->move(public_path('uploads/partners/'),$partners_imageName);
                
                $partners->partners_image = $partners_imageName;
                $partners->save();
        
            }

            
            return redirect()->route("administrative.partners.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"14_e")==true){
                $page_name     = "Manage Partners";
                $subpage_name  = "Manage Partners";

                    $partners = Partners::findorFail($id);
                    return view('administrative.partners.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'partners'      => $partners
                    ]);
        }else{

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"14_e")==true){

                $partners = Partners::findOrFail($id);

                $rules = [
                    'partners_name'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.partners.edit",$partners->partners_id)->withInput()->withErrors($validator);
                }

                $partners->partners_name            = $request->partners_name;
                $partners->partners_link            = $request->partners_link;
                $partners->partners_sort            = $request->partners_sort;
                $partners->partners_status          = $request->partners_status;
                $partners->save();
                
                if ($request->partners_image != ""){

                    $partners_image       = $request->partners_image;
                    $ext                  = $partners_image->getClientOriginalExtension();
                    $partners_imageName   = time().'.'.$ext;
            
                    $partners_image->move(public_path('uploads/partners/'),$partners_imageName);
                    
                    $partners->partners_image = $partners_imageName;
                    $partners->save();
            
                }
                

                
            return redirect()->route("administrative.partners.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"14_d")==true){
                
                $partners = Partners::findOrFail($id);
                $partners->delete();
                
                return redirect()->route("administrative.partners.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Partners";
            $subpage_name  = "Manage Partners";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
