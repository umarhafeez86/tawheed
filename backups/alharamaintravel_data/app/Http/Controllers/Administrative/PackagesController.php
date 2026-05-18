<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;  // Import the GD driver
//use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Settings;
use App\Models\Wladmins;
use App\Models\Packages;

class PackagesController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"9_v")==true){
        
                $page_name     = "Manage Hajj Packages";
                $subpage_name  = "Manage Hajj Packages";
                
                $packages = Packages::orderBy('created_at','desc')->get();

                return view('administrative.packages.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "packages"      => $packages 
                ]); 
        
        }else{

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"9_a")==true){

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

            return view('administrative.packages.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"9_a")==true){
            $rules = [
                'packages_name'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.packages.create")->withInput()->withErrors($validator);
            }

            $packages = new Packages();
            $packages->packages_name            = $request->packages_name;
            $packages->packages_tag             = $request->packages_tag; 
            $packages->packages_info            = $request->packages_info;
            $packages->packages_details         = $request->packages_details;
            
            $packages->packages_price           = $request->packages_price;
            $packages->packages_priceby         = $request->packages_priceby;

            $packages->packages_sort            = $request->packages_sort;
            $packages->packages_status          = $request->packages_status;

            $packages->packages_tag2            = $request->packages_tag2; 
            $packages->packages_price2          = $request->packages_price2; 
            $packages->packages_tag3            = $request->packages_tag3; 
            $packages->packages_price3          = $request->packages_price3; 

            $packages->save();

            if ($request->packages_image != ""){

                // Validate the incoming image file
                $request->validate([
                    'packages_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);
            
                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());
            
                // Get uploaded image
                $packages_image = $request->file('packages_image');
                
                $packages_imageName = time() . '-package-.' . $packages_image->getClientOriginalExtension();

                // Resize the image
                if ($packages_image->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $packages_image = $manager->read($packages_image)->scale(width: 409, height: 264); // Resize to ...
                    $packages_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $packages_image->save(public_path('uploads/packages/'.$packages_imageName));

                }else{
                    $resizedImage = $manager->read($packages_image)->scale(width: 409, height: 264);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/packages/'.$packages_imageName));
                }   
                

                $packages->packages_image = $packages_imageName;
                $packages->save();
    
            }

            
            return redirect()->route("administrative.packages.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"9_e")==true){
                $page_name     = "Manage Hajj Packages";
                $subpage_name  = "Manage Hajj Packages";

                    $packages = Packages::findorFail($id);
                    return view('administrative.packages.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'packages'      => $packages
                    ]);
        }else{

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"9_e")==true){

                $packages = Packages::findOrFail($id);

                $rules = [
                    'packages_name'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.packages.edit",$packages->packages_id)->withInput()->withErrors($validator);
                }

                $packages->packages_name            = $request->packages_name;
                $packages->packages_tag             = $request->packages_tag; 
                $packages->packages_info            = $request->packages_info;
                $packages->packages_details         = $request->packages_details;
                
                $packages->packages_price           = $request->packages_price;
                $packages->packages_priceby         = $request->packages_priceby;

                $packages->packages_sort            = $request->packages_sort;
                $packages->packages_status          = $request->packages_status;

                $packages->packages_tag2            = $request->packages_tag2; 
                $packages->packages_price2          = $request->packages_price2; 
                $packages->packages_tag3            = $request->packages_tag3; 
                $packages->packages_price3          = $request->packages_price3; 

                $packages->save();

                if ($request->packages_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'packages_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $packages_image = $request->file('packages_image');
                    
                    $packages_imageName = time() . '-package-.' . $packages_image->getClientOriginalExtension();

                    // Resize the image
                    if ($packages_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $packages_image = $manager->read($packages_image)->scale(width: 409, height: 264); // Resize to ...
                        $packages_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $packages_image->save(public_path('uploads/packages/'.$packages_imageName));

                    }else{
                        $resizedImage = $manager->read($packages_image)->scale(width: 409, height: 264);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/packages/'.$packages_imageName));
                    }   
                    

                    $packages->packages_image = $packages_imageName;
                    $packages->save();
        
                }

                
            return redirect()->route("administrative.packages.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"9_d")==true){
                
                $packages = Packages::findOrFail($id);
                $packages->delete();
                
                return redirect()->route("administrative.packages.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Hajj Packages";
            $subpage_name  = "Manage Hajj Packages";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
