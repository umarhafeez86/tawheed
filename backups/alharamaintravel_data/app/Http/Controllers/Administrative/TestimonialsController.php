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
use App\Models\Testimonials;

class TestimonialsController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"12_v")==true){
        
                $page_name     = "Manage Testimonials";
                $subpage_name  = "Manage Testimonials";
                
                $testimonials = Testimonials::orderBy('created_at','desc')->get();

                return view('administrative.testimonials.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "testimonials"  => $testimonials 
                ]); 
        
        }else{

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"12_a")==true){

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

            return view('administrative.testimonials.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"12_a")==true){
            $rules = [
                'testimonials_name'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.testimonials.create")->withInput()->withErrors($validator);
            }

            $testimonials = new Testimonials();
            $testimonials->testimonials_name            = $request->testimonials_name; 
            $testimonials->testimonials_details         = $request->testimonials_details;

            $testimonials->testimonials_location        = $request->testimonials_location;

            $testimonials->testimonials_ratings         = $request->testimonials_ratings;
            $testimonials->testimonials_sort            = $request->testimonials_sort;
            $testimonials->status                       = $request->status;
            $testimonials->save();
            
            if ($request->testimonials_image != ""){

                $testimonials_image   = $request->testimonials_image;
                $ext                  = $testimonials_image->getClientOriginalExtension();
                $testimonials_imageName   = time().'.'.$ext;
        
                $testimonials_image->move(public_path('uploads/testimonials/'),$testimonials_imageName);
                
                $testimonials->testimonials_image = $testimonials_imageName;
                $testimonials->save();
        
            }

            
            return redirect()->route("administrative.testimonials.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"12_e")==true){
                $page_name     = "Manage Testimonials";
                $subpage_name  = "Manage Testimonials";

                    $testimonials = Testimonials::findorFail($id);
                    return view('administrative.testimonials.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'testimonials'  => $testimonials
                    ]);
        }else{

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"12_e")==true){

                $testimonials = Testimonials::findOrFail($id);

                $rules = [
                    'testimonials_name'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.testimonials.edit",$testimonials->testimonials_id)->withInput()->withErrors($validator);
                }

                $testimonials->testimonials_name            = $request->testimonials_name; 
                $testimonials->testimonials_details         = $request->testimonials_details;

                $testimonials->testimonials_location        = $request->testimonials_location;

                $testimonials->testimonials_ratings         = $request->testimonials_ratings;
                $testimonials->testimonials_sort            = $request->testimonials_sort;
                $testimonials->status                       = $request->status;
                $testimonials->save();
                
                if ($request->testimonials_image != ""){

                    $testimonials_image   = $request->testimonials_image;
                    $ext                  = $testimonials_image->getClientOriginalExtension();
                    $testimonials_imageName   = time().'.'.$ext;
            
                    $testimonials_image->move(public_path('uploads/testimonials/'),$testimonials_imageName);
                    
                    $testimonials->testimonials_image = $testimonials_imageName;
                    $testimonials->save();
            
                }
                

                
            return redirect()->route("administrative.testimonials.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"12_d")==true){
                
                $testimonials = Testimonials::findOrFail($id);
                $testimonials->delete();
                
                return redirect()->route("administrative.testimonials.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Testimonials";
            $subpage_name  = "Manage Testimonials";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
