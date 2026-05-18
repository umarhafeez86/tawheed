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

class ServicesdetailsController extends Controller
{
    // This method will list
    public function index($services_id){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"6_v")==true){
        
                $page_name     = "Manage Services";
                $subpage_name  = "Manage Services Details";
                
                $servicesdetails = Servicesdetails::where('services_id',$services_id)->orderBy('created_at','desc')->get();

                return view('administrative.servicesdetails.list',[
                    'page_name'         => $page_name,
                    'subpage_name'      => $subpage_name,
                    "services_id"       => $services_id,
                    "servicesdetails"   => $servicesdetails 
                ]); 
        
        }else{

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // This method will create
    public function create ($services_id){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"6_a")==true){

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

            return view('administrative.servicesdetails.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                'services_id'   => $services_id
            ]); 
        }else{

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"6_a")==true){
            $rules = [
                'servicesdetails_details'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.servicesdetails.create",$request->services_id)->withInput()->withErrors($validator);
            }

            $servicesdetails = new Servicesdetails();
            $servicesdetails->services_id             = $request->services_id;
            $servicesdetails->servicesdetails_heading = $request->servicesdetails_heading;
            $servicesdetails->servicesdetails_details = $request->servicesdetails_details;
            $servicesdetails->servicesdetails_image   = $request->servicesdetails_image;
            $servicesdetails->servicesdetails_sort    = $request->servicesdetails_sort;
            $servicesdetails->servicesdetails_status  = $request->servicesdetails_status;
            $servicesdetails->save();

            if ($request->servicesdetails_image != ""){

                $servicesdetails_image       = $request->servicesdetails_image;
                $ext                         = $servicesdetails_image->getClientOriginalExtension();
                $servicesdetails_imageName   = time().'.'.$ext;
        
                $servicesdetails_image->move(public_path('uploads/services/'),$servicesdetails_imageName);
                
                $servicesdetails->servicesdetails_image = $servicesdetails_imageName;
                $servicesdetails->save();
        
            }
           
            return redirect()->route("administrative.servicesdetails.index",$request->services_id)->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"6_e")==true){
                $page_name     = "Manage Services";
                $subpage_name  = "Manage Services Details";

                    $servicesdetails = Servicesdetails::findorFail($id);
                    return view('administrative.servicesdetails.edit',[
                        'page_name'            => $page_name,
                        'subpage_name'         => $subpage_name,
                        'servicesdetails'      => $servicesdetails
                    ]);
        }else{

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"6_e")==true){

                $servicesdetails = Servicesdetails::findOrFail($id);

                $rules = [
                    'servicesdetails_details'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.servicesdetails.edit",$servicesdetails->servicesdetails_id)->withInput()->withErrors($validator);
                }

            
            $servicesdetails->services_id             = $request->services_id;
            $servicesdetails->servicesdetails_heading = $request->servicesdetails_heading;
            $servicesdetails->servicesdetails_details = $request->servicesdetails_details;
            $servicesdetails->servicesdetails_image   = $request->servicesdetails_image;
            $servicesdetails->servicesdetails_sort    = $request->servicesdetails_sort;
            $servicesdetails->servicesdetails_status  = $request->servicesdetails_status;
            $servicesdetails->save();
                
            return redirect()->route("administrative.servicesdetails.index",$request->services_id)->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"6_d")==true){
                $servicesdetails = Servicesdetails::findOrFail($id);
                $servicesdetails->delete();

                return redirect()->route("administrative.servicesdetails.index",$servicesdetails->services_id)->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services Details";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
