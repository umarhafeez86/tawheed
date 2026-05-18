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
use App\Models\Sliders;

class SlidersController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"18_v")==true){
        
                $page_name     = "Manage Sliders";
                $subpage_name  = "Manage Sliders";
                
                $sliders = Sliders::orderBy('created_at','desc')->get();

                return view('administrative.sliders.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "sliders"       => $sliders 
                ]); 
        
        }else{

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"18_a")==true){

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

            return view('administrative.sliders.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"18_a")==true){
            $rules = [
                'sliders_heading'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.sliders.create")->withInput()->withErrors($validator);
            }

            $sliders = new Sliders();
            $sliders->sliders_heading           = $request->sliders_heading; 
            $sliders_image_name                 = SEF_URLS($request->sliders_heading);

            $sliders->sliders_subheading        = $request->sliders_subheading;
            $sliders->sliders_textdetails       = $request->sliders_textdetails;
            $sliders->sliders_textdetails2      = $request->sliders_textdetails2;

            $sliders->sliders_link              = $request->sliders_link;
            $sliders->sliders_sort              = $request->sliders_sort;
            $sliders->sliders_status            = $request->sliders_status;
            $sliders->save();
            
            if ($request->sliders_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'sliders_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $sliders_image = $request->file('sliders_image');
                    
                    $sliders_imageName = 'slide-'.$sliders_image_name.'.'. $sliders_image->getClientOriginalExtension();

                    // Resize the image
                    if ($sliders_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $sliders_image = $manager->read($sliders_image)->scale(width: 3840, height: 2160); // Resize to ...
                        $sliders_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                         // Saveclsthe resized image
                         $sliders_image->save(public_path('uploads/sliders/'.$sliders_imageName));

                    }else{
                        $resizedImage = $manager->read($sliders_image)->scale(width: 3840, height: 2160);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/sliders/'.$sliders_imageName));
                    }   
        

                    $sliders->sliders_image = $sliders_imageName;
                    $sliders->save();
            }

            
            return redirect()->route("administrative.sliders.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"18_e")==true){
                $page_name     = "Manage Sliders";
                $subpage_name  = "Manage Sliders";

                    $sliders = Sliders::findorFail($id);
                    return view('administrative.sliders.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'sliders'       => $sliders
                    ]);
        }else{

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"18_e")==true){

                $sliders = Sliders::findOrFail($id);

                $rules = [
                    'sliders_heading'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.sliders.edit",$sliders->sliders_id)->withInput()->withErrors($validator);
                }

                $sliders->sliders_heading           = $request->sliders_heading; 
                $sliders_image_name                 = SEF_URLS($request->sliders_heading);

                $sliders->sliders_subheading        = $request->sliders_subheading;
                $sliders->sliders_textdetails       = $request->sliders_textdetails;
                $sliders->sliders_textdetails2      = $request->sliders_textdetails2;
    
                $sliders->sliders_link              = $request->sliders_link;
                $sliders->sliders_sort              = $request->sliders_sort;
                $sliders->sliders_status            = $request->sliders_status;
                $sliders->save();
                
                if ($request->sliders_image != ""){

                        // Validate the incoming image file
                        $request->validate([
                            'sliders_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                        ]);
                    
                        // Initialize ImageManager with GD/Imagick Driver
                        $manager = new ImageManager(new Driver());
                    
                        // Get uploaded image
                        $sliders_image = $request->file('sliders_image');
                        
                        $sliders_imageName = 'slide-'.$sliders_image_name.'.'. $sliders_image->getClientOriginalExtension();

                        // Resize the image
                        if ($sliders_image->getClientOriginalExtension() == "webp"){
                            // Read and compress the WebP image
                            $sliders_image = $manager->read($sliders_image)->scale(width: 3840, height: 2160); // Resize to ...
                            $sliders_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                            // Saveclsthe resized image
                            $sliders_image->save(public_path('uploads/sliders/'.$sliders_imageName));

                        }else{
                            $resizedImage = $manager->read($sliders_image)->scale(width: 3840, height: 2160);
                            
                            // Save the resized image
                            $resizedImage->save(public_path('uploads/sliders/'.$sliders_imageName));
                        }   
            

                        $sliders->sliders_image = $sliders_imageName;
                        $sliders->save();
                }
                

                
            return redirect()->route("administrative.sliders.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"18_d")==true){
                
                $sliders = Sliders::findOrFail($id);
                if ($sliders->sliders_image!=""){
                    $filePath = public_path('uploads/sliders/'.$sliders->sliders_image); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }

                $sliders->delete();
                
                return redirect()->route("administrative.sliders.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Sliders";
            $subpage_name  = "Manage Sliders";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
