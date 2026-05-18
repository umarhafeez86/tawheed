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
use App\Models\Blogs;

class BlogsController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"15_v")==true){
        
                $page_name     = "Manage Blogs";
                $subpage_name  = "Manage Blogs";
                
                $blogs = Blogs::orderBy('created_at','desc')->get();

                return view('administrative.blogs.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "blogs"         => $blogs 
                ]); 
        
        }else{

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"15_a")==true){

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

            return view('administrative.blogs.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"15_a")==true){
            $rules = [
                'blogs_name'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.blogs.create")->withInput()->withErrors($validator);
            }

            $blogs = new Blogs();
            $blogs->blogs_name              = $request->blogs_name; 
            if ($request->blogs_url!=""){
                $blogs->blogs_url           = $request->blogs_url;
            }else{
                $blogs->blogs_url           = SEF_URLS($request->blogs_name);
            }

            $blogs->blogs_details           = $request->blogs_details;

            $blogs->blogs_date              = $request->blogs_date;
            $blogs->blogs_author            = $request->blogs_author;
            $blogs->blogs_tag               = $request->blogs_tag;

            $blogs->blogs_sort              = $request->blogs_sort;
            $blogs->blogs_status            = $request->blogs_status;
            $blogs->save();
            
            if ($request->blogs_image != ""){

                $blogs_image   = $request->blogs_image;
                $ext                  = $blogs_image->getClientOriginalExtension();
                $blogs_imageName   = time().'.'.$ext;
        
                $blogs_image->move(public_path('uploads/blogs/'),$blogs_imageName);
                
                $blogs->blogs_image = $blogs_imageName;
                $blogs->save();
        
            }

            
            return redirect()->route("administrative.blogs.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"15_e")==true){
                $page_name     = "Manage Blogs";
                $subpage_name  = "Manage Blogs";

                    $blogs = Blogs::findorFail($id);
                    return view('administrative.blogs.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'blogs'         => $blogs
                    ]);
        }else{

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"15_e")==true){

                $blogs = Blogs::findOrFail($id);

                $rules = [
                    'blogs_name'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.blogs.edit",$blogs->blogs_id)->withInput()->withErrors($validator);
                }

                $blogs->blogs_name          = $request->blogs_name; 
                $blogs->blogs_name          = $request->blogs_name; 
            if ($request->blogs_url!=""){
                $blogs->blogs_url           = $request->blogs_url;
            }else{
                $blogs->blogs_url           = SEF_URLS($request->blogs_name);
            }

            $blogs->blogs_details           = $request->blogs_details;

            $blogs->blogs_date              = $request->blogs_date;
            $blogs->blogs_author            = $request->blogs_author;
            $blogs->blogs_tag               = $request->blogs_tag;

            $blogs->blogs_sort              = $request->blogs_sort;
            $blogs->blogs_status            = $request->blogs_status;
            $blogs->save();
            
            if ($request->blogs_image != ""){

                $blogs_image   = $request->blogs_image;
                $ext                  = $blogs_image->getClientOriginalExtension();
                $blogs_imageName   = time().'.'.$ext;
        
                $blogs_image->move(public_path('uploads/blogs/'),$blogs_imageName);
                
                $blogs->blogs_image = $blogs_imageName;
                $blogs->save();
        
            }
                
            return redirect()->route("administrative.blogs.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"15_d")==true){
                
                $blogs = Blogs::findOrFail($id);
                $blogs->delete();
                
                return redirect()->route("administrative.blogs.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Blogs";
            $subpage_name  = "Manage Blogs";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
