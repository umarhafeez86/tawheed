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
use App\Models\Services;
use App\Models\Servicesdetails;
use App\Models\Servicepackages;
use App\Models\Servicepackagesimgs;

class ServicepackagesController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"17_v")==true){
        
                $page_name     = "Manage Service Packages";
                $subpage_name  = "Manage Service Packages";
                
                $servicepackages = Servicepackages::orderBy('created_at','desc')->get();

                return view('administrative.servicepackages.list',[
                    'page_name'         => $page_name,
                    'subpage_name'      => $subpage_name,
                    "servicepackages"   => $servicepackages 
                ]); 
        
        }else{

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Manage Service Packages";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"17_a")==true){

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Add Data";

            return view('administrative.servicepackages.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Add Data";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"17_a")==true){
            $rules = [
                'servicepackages_name'         => 'required',
                'servicepackages_totalnights'  => 'required',
                'servicepackages_startype'     => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.servicepackages.create")->withInput()->withErrors($validator);
            }

            $servicepackages = new Servicepackages();

            $servicepackages->services_id                       = $request->services_id; 
            $servicepackages->servicepackages_name              = $request->servicepackages_name;
            $servicepackages->servicepackages_totalnights       = $request->servicepackages_totalnights;
            $servicepackages->servicepackages_startype          = $request->servicepackages_startype;

            $servicepackages->servicepackages_makkahnights      = $request->servicepackages_makkahnights;
            $servicepackages->servicepackages_madinahnights     = $request->servicepackages_madinahnights;
            $servicepackages->servicepackages_flightinfo        = $request->servicepackages_flightinfo;
            $servicepackages->servicepackages_price             = $request->servicepackages_price;

            $servicepackages->servicepackages_details           = $request->servicepackages_details;

            if ($request->servicepackages_url!=""){
                $servicepackages->servicepackages_url           = $request->servicepackages_url;
            }else{
                $servicepackages->servicepackages_url           = SEF_URLS($request->servicepackages_name);
            }
            
            $servicepackages->servicepackages_title           = $request->servicepackages_title;
            $servicepackages->servicepackages_description     = $request->servicepackages_description;
            $servicepackages->servicepackages_keyword         = $request->servicepackages_keyword;
            $servicepackages->servicepackages_sort            = $request->servicepackages_sort;
            $servicepackages->servicepackages_status          = $request->servicepackages_status;

            $servicepackages->servicepackages_makkah_hotel_name         = $request->servicepackages_makkah_hotel_name;
            $servicepackages->servicepackages_makkah_hotel_details      = $request->servicepackages_makkah_hotel_details;

            $servicepackages->servicepackages_madinah_hotel_name        = $request->servicepackages_madinah_hotel_name;
            $servicepackages->servicepackages_madinah_hotel_details     = $request->servicepackages_madinah_hotel_details;

            $servicepackages->makkah_hotelinfos_id                      = $request->makkah_hotelinfos_id;
            $servicepackages->madinah_hotelinfos_id                     = $request->madinah_hotelinfos_id;

            $servicepackages->heading1                = $request->heading1;
            $servicepackages->heading1_details        = $request->heading1_details;
            $servicepackages->heading2                = $request->heading2;
            $servicepackages->heading2_details        = $request->heading2_details;
            $servicepackages->heading3                = $request->heading3;
            $servicepackages->heading3_details        = $request->heading3_details;
            $servicepackages->heading4                = $request->heading4;
            $servicepackages->heading4_details        = $request->heading4_details;
            

            $servicepackages->makkah_hotel_meal_info        = $request->makkah_hotel_meal_info;
            $servicepackages->madinah_hotel_meal_info       = $request->madinah_hotel_meal_info;
            $servicepackages->visa_info                     = $request->visa_info;
            $servicepackages->transport_info                = $request->transport_info;
            $servicepackages->flight_info                   = $request->flight_info;

            $servicepackages->soldout                   = $request->soldout;
            $servicepackages->showall                   = $request->showall;

            $servicepackages->destinations_id                       = $request->destinations_id;
            $servicepackages->custom_label                          = $request->custom_label;
            $servicepackages->destination_hotelinfos_id             = $request->destination_hotelinfos_id;
            $servicepackages->servicepackages_destinations_nights   = $request->servicepackages_destinations_nights;
            $servicepackages->destination_hotel_meal_info           = $request->destination_hotel_meal_info;

            $servicepackages->save();

            if ($request->servicepackages_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'servicepackages_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $servicepackages_image = $request->file('servicepackages_image');
                    
                    $servicepackages_imageName = time() . '-package-.' . $servicepackages_image->getClientOriginalExtension();

                    // Resize the image
                    if ($servicepackages_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $servicepackages_image = $manager->read($servicepackages_image)->scale(width: 500, height: 254); // Resize to ...
                        $servicepackages_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                         // Saveclsthe resized image
                         $servicepackages_image->save(public_path('uploads/servicepackages/'.$servicepackages_imageName));

                    }else{
                        $resizedImage = $manager->read($servicepackages_image)->scale(width: 500, height: 254);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_imageName));
                    }   
                    

                    $servicepackages->servicepackages_image = $servicepackages_imageName;
                    $servicepackages->save();
        
            }

            if ($request->servicepackages_featured_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'servicepackages_featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $servicepackages_featured_image = $request->file('servicepackages_featured_image');
                    
                    $servicepackages_featured_imageName = time() . '-package-.' . $servicepackages_featured_image->getClientOriginalExtension();

                    // Resize the image
                    if ($servicepackages_featured_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $servicepackages_featured_image = $manager->read($servicepackages_featured_image)->scale(width: 527, height: 573); // Resize to ...
                        $servicepackages_featured_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                         // Saveclsthe resized image
                         $servicepackages_featured_image->save(public_path('uploads/servicepackages/'.$servicepackages_featured_imageName));

                    }else{
                        $resizedImage = $manager->read($servicepackages_featured_image)->scale(width: 527, height: 573);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_featured_imageName));
                    }   
                    

                    $servicepackages->servicepackages_featured_image = $servicepackages_featured_imageName;
                    $servicepackages->save();
        
            }

            if ($request->servicepackages_makkah_hotel_picture != ""){

                // Validate the incoming image file
                $request->validate([
                    'servicepackages_makkah_hotel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);
    
                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());
    
                // Get uploaded image
                $servicepackages_makkah_hotel_picture = $request->file('servicepackages_makkah_hotel_picture');
    
                $servicepackages_makkah_hotel_pictureName = time() . '-makkah-hotel.' . $servicepackages_makkah_hotel_picture->getClientOriginalExtension();
    
                // Resize the image
                if ($servicepackages_makkah_hotel_picture->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $servicepackages_makkah_hotel_picture = $manager->read($servicepackages_makkah_hotel_picture)->scale(width: 586, height: 354); // Resize to ...
                    $servicepackages_makkah_hotel_picture->toWebp(quality: 70); // Convert to WebP with 70% quality
    
                    // Saveclsthe resized image
                    $servicepackages_makkah_hotel_picture->save(public_path('uploads/servicepackages/'.$servicepackages_makkah_hotel_pictureName));
    
                }else{
                    $resizedImage = $manager->read($servicepackages_makkah_hotel_picture)->scale(width: 500, height: 254);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_makkah_hotel_pictureName));
                }   
    
    
                $servicepackages->servicepackages_makkah_hotel_picture = $servicepackages_makkah_hotel_pictureName;
                $servicepackages->save();
    
            }


            if ($request->servicepackages_madinah_hotel_picture != ""){

                // Validate the incoming image file
                $request->validate([
                    'servicepackages_madinah_hotel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);
    
                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());
    
                // Get uploaded image
                $servicepackages_madinah_hotel_picture = $request->file('servicepackages_madinah_hotel_picture');
    
                $servicepackages_madinah_hotel_pictureName = time() . '-madinah-hotel.' . $servicepackages_madinah_hotel_picture->getClientOriginalExtension();
    
                // Resize the image
                if ($servicepackages_madinah_hotel_picture->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $servicepackages_madinah_hotel_picture = $manager->read($servicepackages_madinah_hotel_picture)->scale(width: 586, height: 354); // Resize to ...
                    $servicepackages_madinah_hotel_picture->toWebp(quality: 70); // Convert to WebP with 70% quality
    
                    // Saveclsthe resized image
                    $servicepackages_madinah_hotel_picture->save(public_path('uploads/servicepackages/'.$servicepackages_madinah_hotel_pictureName));
    
                }else{
                    $resizedImage = $manager->read($servicepackages_madinah_hotel_picture)->scale(width: 500, height: 254);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_madinah_hotel_pictureName));
                }   
    
    
                $servicepackages->servicepackages_madinah_hotel_picture = $servicepackages_madinah_hotel_pictureName;
                $servicepackages->save();
    
            }
    

            return redirect()->route("administrative.servicepackages.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Add Data";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"17_e")==true){
                $page_name     = "Manage Service Packages";
                $subpage_name  = "Add Data";

                    $servicepackages = Servicepackages::findorFail($id);
                    return view('administrative.servicepackages.edit',[
                        'page_name'            => $page_name,
                        'subpage_name'         => $subpage_name,
                        'servicepackages'      => $servicepackages
                    ]);
        }else{

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Add Data";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"17_e")==true){

                $servicepackages = Servicepackages::findOrFail($id);

                $rules = [
                    'servicepackages_name'         => 'required',
                    'servicepackages_totalnights'  => 'required',
                    'servicepackages_startype'     => 'required',
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.servicepackages.edit",$servicepackages->servicepackages_id)->withInput()->withErrors($validator);
                }

   
            $servicepackages->services_id                       = $request->services_id; 
        
            $servicepackages->servicepackages_name              = $request->servicepackages_name;
            $servicepackages->servicepackages_totalnights       = $request->servicepackages_totalnights;
            $servicepackages->servicepackages_startype          = $request->servicepackages_startype;

            $servicepackages->servicepackages_makkahnights      = $request->servicepackages_makkahnights;
            $servicepackages->servicepackages_madinahnights     = $request->servicepackages_madinahnights;
            $servicepackages->servicepackages_flightinfo        = $request->servicepackages_flightinfo;
            $servicepackages->servicepackages_price             = $request->servicepackages_price;

            $servicepackages->servicepackages_details           = $request->servicepackages_details;

            if ($request->servicepackages_url!=""){
                $servicepackages->servicepackages_url           = $request->servicepackages_url;
            }else{
                $servicepackages->servicepackages_url           = SEF_URLS($request->servicepackages_name);
            }
            
            $servicepackages->servicepackages_title           = $request->servicepackages_title;
            $servicepackages->servicepackages_description     = $request->servicepackages_description;
            $servicepackages->servicepackages_keyword         = $request->servicepackages_keyword;
            $servicepackages->servicepackages_sort            = $request->servicepackages_sort;
            $servicepackages->servicepackages_status          = $request->servicepackages_status;

            $servicepackages->servicepackages_makkah_hotel_name         = $request->servicepackages_makkah_hotel_name;
            $servicepackages->servicepackages_makkah_hotel_details      = $request->servicepackages_makkah_hotel_details;

            $servicepackages->servicepackages_madinah_hotel_name        = $request->servicepackages_madinah_hotel_name;
            $servicepackages->servicepackages_madinah_hotel_details     = $request->servicepackages_madinah_hotel_details;

            $servicepackages->makkah_hotelinfos_id                      = $request->makkah_hotelinfos_id;
            $servicepackages->madinah_hotelinfos_id                     = $request->madinah_hotelinfos_id;
            
            $servicepackages->heading1                = $request->heading1;
            $servicepackages->heading1_details        = $request->heading1_details;
            $servicepackages->heading2                = $request->heading2;
            $servicepackages->heading2_details        = $request->heading2_details;
            $servicepackages->heading3                = $request->heading3;
            $servicepackages->heading3_details        = $request->heading3_details;
            $servicepackages->heading4                = $request->heading4;
            $servicepackages->heading4_details        = $request->heading4_details;

            $servicepackages->makkah_hotel_meal_info        = $request->makkah_hotel_meal_info;
            $servicepackages->madinah_hotel_meal_info       = $request->madinah_hotel_meal_info;
            $servicepackages->visa_info                     = $request->visa_info;
            $servicepackages->transport_info                = $request->transport_info;
            $servicepackages->flight_info                   = $request->flight_info;

            $servicepackages->soldout                   = $request->soldout;
            $servicepackages->showall                   = $request->showall;

            $servicepackages->destinations_id                       = $request->destinations_id;
            $servicepackages->custom_label                          = $request->custom_label;
            $servicepackages->destination_hotelinfos_id             = $request->destination_hotelinfos_id;
            $servicepackages->servicepackages_destinations_nights   = $request->servicepackages_destinations_nights;
            $servicepackages->destination_hotel_meal_info           = $request->destination_hotel_meal_info;

            $servicepackages->save();

            if ($request->servicepackages_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'servicepackages_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $servicepackages_image = $request->file('servicepackages_image');
                    
                    $servicepackages_imageName = time() . '-package-.' . $servicepackages_image->getClientOriginalExtension();

                    // Resize the image
                    if ($servicepackages_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $servicepackages_image = $manager->read($servicepackages_image)->scale(width: 500, height: 254); // Resize to ...
                        $servicepackages_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $servicepackages_image->save(public_path('uploads/servicepackages/'.$servicepackages_imageName));

                    }else{
                        $resizedImage = $manager->read($servicepackages_image)->scale(width: 500, height: 254);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_imageName));
                    }   
                    

                    $servicepackages->servicepackages_image = $servicepackages_imageName;
                    $servicepackages->save();
        
            }

            if ($request->servicepackages_featured_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'servicepackages_featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $servicepackages_featured_image = $request->file('servicepackages_featured_image');
                    
                    $servicepackages_featured_imageName = time() . '-package-.' . $servicepackages_featured_image->getClientOriginalExtension();

                    // Resize the image
                    if ($servicepackages_featured_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $servicepackages_featured_image = $manager->read($servicepackages_featured_image)->scale(width: 527, height: 573); // Resize to ...
                        $servicepackages_featured_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                         // Saveclsthe resized image
                         $servicepackages_featured_image->save(public_path('uploads/servicepackages/'.$servicepackages_featured_imageName));

                    }else{
                        $resizedImage = $manager->read($servicepackages_featured_image)->scale(width: 527, height: 573);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_featured_imageName));
                    }   
                    

                    $servicepackages->servicepackages_featured_image = $servicepackages_featured_imageName;
                    $servicepackages->save();
        
            }

            if ($request->servicepackages_makkah_hotel_picture != ""){

                // Validate the incoming image file
                $request->validate([
                    'servicepackages_makkah_hotel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $servicepackages_makkah_hotel_picture = $request->file('servicepackages_makkah_hotel_picture');

                $servicepackages_makkah_hotel_pictureName = time() . '-makkah-hotel.' . $servicepackages_makkah_hotel_picture->getClientOriginalExtension();

                // Resize the image
                if ($servicepackages_makkah_hotel_picture->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $servicepackages_makkah_hotel_picture = $manager->read($servicepackages_makkah_hotel_picture)->scale(width: 586, height: 354); // Resize to ...
                    $servicepackages_makkah_hotel_picture->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $servicepackages_makkah_hotel_picture->save(public_path('uploads/servicepackages/'.$servicepackages_makkah_hotel_pictureName));

                }else{
                    $resizedImage = $manager->read($servicepackages_makkah_hotel_picture)->scale(width: 500, height: 254);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_makkah_hotel_pictureName));
                }   


                $servicepackages->servicepackages_makkah_hotel_picture = $servicepackages_makkah_hotel_pictureName;
                $servicepackages->save();

            }


            if ($request->servicepackages_madinah_hotel_picture != ""){

                // Validate the incoming image file
                $request->validate([
                    'servicepackages_madinah_hotel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $servicepackages_madinah_hotel_picture = $request->file('servicepackages_madinah_hotel_picture');

                $servicepackages_madinah_hotel_pictureName = time() . '-madinah-hotel.' . $servicepackages_madinah_hotel_picture->getClientOriginalExtension();

                // Resize the image
                if ($servicepackages_madinah_hotel_picture->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $servicepackages_madinah_hotel_picture = $manager->read($servicepackages_madinah_hotel_picture)->scale(width: 586, height: 354); // Resize to ...
                    $servicepackages_madinah_hotel_picture->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $servicepackages_madinah_hotel_picture->save(public_path('uploads/servicepackages/'.$servicepackages_madinah_hotel_pictureName));

                }else{
                    $resizedImage = $manager->read($servicepackages_madinah_hotel_picture)->scale(width: 500, height: 254);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/servicepackages/'.$servicepackages_madinah_hotel_pictureName));
                }   


                $servicepackages->servicepackages_madinah_hotel_picture = $servicepackages_madinah_hotel_pictureName;
                $servicepackages->save();

            }          

                
            return redirect()->route("administrative.servicepackages.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Edit Data";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"17_d")==true){
                
                $servicepackages = Servicepackages::findOrFail($id);
                if ($servicepackages->servicepackages_image!=""){
                    $filePath = public_path('uploads/servicepackages/'.$servicepackages->servicepackages_image); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }

                if ($servicepackages->servicepackages_featured_image!=""){
                    $filePath = public_path('uploads/servicepackages/'.$servicepackages->servicepackages_featured_image); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }


                if ($servicepackages->servicepackages_makkah_hotel_picture!=""){
                    $filePath = public_path('uploads/servicepackages/'.$servicepackages->servicepackages_makkah_hotel_picture); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }    
                if ($servicepackages->servicepackages_madinah_hotel_picture!=""){
                    $filePath = public_path('uploads/servicepackages/'.$servicepackages->servicepackages_madinah_hotel_picture); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }
                
                $servicepackagesimgs = Servicepackagesimgs::where('servicepackages_id',$servicepackages->servicepackages_id)->orderBy('created_at','desc')->get();
                foreach ($servicepackagesimgs as $servicepackagesimg){
                    if ($servicepackagesimg->gallery_image!=""){
                        $filePath = public_path('uploads/servicepackages/gallery/'.$servicepackagesimg->gallery_image); // Path to the file
                        if (file_exists($filePath)) {
                            unlink($filePath); // Delete the file
                        }
                    }
                }

                $servicepackagesimgs = Servicepackagesimgs::where('servicepackages_id',$servicepackages->servicepackages_id);
                $servicepackagesimgs->delete();


                $servicepackages->delete();
                
                return redirect()->route("administrative.servicepackages.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Service Packages";
            $subpage_name  = "Delete Data";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }


        // This method will imagesgallery list
        public function imagesgallery ($id){

            if (session()->has("admin_name")){
            
            }else{
                return redirect()->route("administrative.login");
            }
    
            //echo $id;
            if (userpermission_status(session()->get('adminusergroups_id'),"17_e")==true){

                $page_name     = "Manage Service Packages";
                $subpage_name  = "Manage Service Packages Gallery";
                
                $servicepackages     = Servicepackages::findorFail($id);

                $servicepackagesimgs = Servicepackagesimgs::where('servicepackages_id',$id)->orderBy('created_at','desc')->get();

                return view('administrative.servicepackages.listgallery',[
                    'page_name'                 => $page_name,
                    'subpage_name'              => $subpage_name,
                    "servicepackages"           => $servicepackages,
                    "servicepackagesimgs"       => $servicepackagesimgs,
                    "servicepackages_id"        => $id
                ]);

            }else{
    
                $page_name     = "Manage Service Packages";
                $subpage_name  = "Manage Service Packages Gallery";
    
                return view('administrative.permissions',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name
                ]); 
            }
        }

        // This method will create images gallery
        public function createimagesgallery ($id){

            if (session()->has("admin_name")){
            
            }else{
                return redirect()->route("administrative.login");
            }

            if (userpermission_status(session()->get('adminusergroups_id'),"17_a")==true){

                $page_name     = "Manage Service Packages";
                $subpage_name  = "Add Service Packages Gallery";

                $servicepackages     = Servicepackages::findorFail($id);

                return view('administrative.servicepackages.createimagesgallery',[
                    'page_name'         => $page_name,
                    'subpage_name'      => $subpage_name,
                    "servicepackages"   => $servicepackages,
                ]); 
            }else{

                $page_name     = "Manage Service Packages";
                $subpage_name  = "Add Service Packages Gallery";

                return view('administrative.permissions',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name
                ]); 
            }
        }

        // This method will store images gallery
        public function storeimagesgallery (Request $request){

                if (session()->has("admin_name")){
                
                }else{
                    return redirect()->route("administrative.login");
                }

                if (userpermission_status(session()->get('adminusergroups_id'),"17_a")==true){
                    $rules = [
                        'gallery_caption'         => 'required',
                        'gallery_status'          => 'required',
                        'gallery_sort'            => 'required',
                    ];
                    $validator = Validator::make($request->all(),$rules);
                
                    if ($validator->fails()){
                        return redirect()->back()->withInput()->withErrors($validator);
                        //"administrative.servicepackages.createimagesgallery/".$request->servicepackages_id
                    }

                    $servicepackagesimgs = new Servicepackagesimgs();

                    $servicepackagesimgs->servicepackages_id   = $request->servicepackages_id; 
                    $servicepackagesimgs->gallery_caption      = $request->gallery_caption;
                    $servicepackagesimgs->gallery_sort         = $request->gallery_sort;
                    $servicepackagesimgs->gallery_status       = $request->gallery_status;
                    $servicepackagesimgs->save();

                    if ($request->gallery_image != ""){

                            // Validate the incoming image file
                            $request->validate([
                                'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                            ]);
                        
                            // Initialize ImageManager with GD/Imagick Driver
                            $manager = new ImageManager(new Driver());
                        
                            // Get uploaded image
                            $gallery_image = $request->file('gallery_image');
                            
                            $gallery_imageName = time() . '-package-.' . $gallery_image->getClientOriginalExtension();
        
                            // Resize the image
                            if ($gallery_image->getClientOriginalExtension() == "webp"){
                                // Read and compress the WebP image
                                $gallery_image = $manager->read($gallery_image)->scale(width: 760, height: 563); // Resize to ...
                                $gallery_image->toWebp(quality: 70); // Convert to WebP with 70% quality
        
                                // Saveclsthe resized image
                                $gallery_image->save(public_path('uploads/servicepackages/gallery/'.$gallery_imageName));
        
                            }else{
                                $resizedImage = $manager->read($gallery_image)->scale(width: 760, height: 563);
                                
                                // Save the resized image
                                $resizedImage->save(public_path('uploads/servicepackages/gallery/'.$gallery_imageName));
                            }   
                            
        
                            $servicepackagesimgs->gallery_image = $gallery_imageName;
                            $servicepackagesimgs->save();
                
                    }

                    
                    //return redirect()->route("administrative.servicepackages.imagesgallery")->with("success","Data Added Successfully.");
                    return redirect(url("/administrative/servicepackages/imagesgallery/".$request->servicepackages_id))->with("success","Data Added Successfully.");
                    
                
                }else{

                    $page_name     = "Manage Service Packages";
                    $subpage_name  = "Add Service Packages Gallery";

                    return view('administrative.permissions',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name
                    ]); 
                }
        }

        // This method will edit images gallery
        public function editimagesgallery ($id){

                if (session()->has("admin_name")){
                
                }else{
                    return redirect()->route("administrative.login");
                }

                //echo $id;
                if (userpermission_status(session()->get('adminusergroups_id'),"17_e")==true){
                        $page_name     = "Manage Service Packages";
                        $subpage_name  = "Edit Service Packages Gallery";

                            $servicepackagesimgs = Servicepackagesimgs::findorFail($id);
                            return view('administrative.servicepackages.editimagesgallery',[
                                'page_name'             => $page_name,
                                'subpage_name'          => $subpage_name,
                                'servicepackagesimgs'   => $servicepackagesimgs
                            ]);
                }else{

                    $page_name     = "Manage Service Packages";
                    $subpage_name  = "Edit Service Packages Gallery";

                    return view('administrative.permissions',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name
                    ]); 
                }
        }

        // This method will update images gallery
        public function updateimagesgallery ($id, Request $request){

            if (session()->has("admin_name")){
            
            }else{
                return redirect()->route("administrative.login");
            }

            if (userpermission_status(session()->get('adminusergroups_id'),"17_e")==true){

                    $servicepackagesimgs = Servicepackagesimgs::findOrFail($id);

                    $rules = [
                        'gallery_caption'         => 'required',
                        'gallery_status'          => 'required',
                        'gallery_sort'            => 'required',
                    ];

                    $validator = Validator::make($request->all(),$rules);
                
                    if ($validator->fails()){
                        return redirect()->route("administrative.servicepackages.editimagesgallery",$servicepackagesimgs->gallery_id)->withInput()->withErrors($validator);
                    }
            
                $servicepackagesimgs->servicepackages_id   = $request->servicepackages_id; 
                $servicepackagesimgs->gallery_caption      = $request->gallery_caption;
                $servicepackagesimgs->gallery_sort         = $request->gallery_sort;
                $servicepackagesimgs->gallery_status       = $request->gallery_status;
                $servicepackagesimgs->save();
                
                    if ($request->gallery_image != ""){

                                // Validate the incoming image file
                                $request->validate([
                                    'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                                ]);
                            
                                // Initialize ImageManager with GD/Imagick Driver
                                $manager = new ImageManager(new Driver());
                            
                                // Get uploaded image
                                $gallery_image = $request->file('gallery_image');
                                
                                $gallery_imageName = time() . '-package-.' . $gallery_image->getClientOriginalExtension();

                                // Resize the image
                                if ($gallery_image->getClientOriginalExtension() == "webp"){
                                    // Read and compress the WebP image
                                    $gallery_image = $manager->read($gallery_image)->scale(width: 760, height: 563); // Resize to ...
                                    $gallery_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                                    // Saveclsthe resized image
                                    $gallery_image->save(public_path('uploads/servicepackages/gallery/'.$gallery_imageName));

                                }else{
                                    $resizedImage = $manager->read($gallery_image)->scale(width: 760, height: 563);
                                    
                                    // Save the resized image
                                    $resizedImage->save(public_path('uploads/servicepackages/gallery/'.$gallery_imageName));
                                }   
                                

                                $servicepackagesimgs->gallery_image = $gallery_imageName;
                                $servicepackagesimgs->save();
                    
                    }
                        
                //return redirect()->route("administrative.servicepackages.index")->with("success","Data Updated Successfully.");
                return redirect(url("/administrative/servicepackages/imagesgallery/".$request->servicepackages_id))->with("success","Data Updated Successfully.");
                    
            }else{

                $page_name     = "Manage Service Packages";
                $subpage_name  = "Edit Service Packages Gallery";

                return view('administrative.permissions',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name
                ]); 
            }
        }   

        // This method will destroy images gallery
        public function destroyimagesgallery ($id){

                if (session()->has("admin_name")){
                
                }else{
                    return redirect()->route("administrative.login");
                }

                if (userpermission_status(session()->get('adminusergroups_id'),"17_d")==true){
                        
                        $servicepackagesimgs = Servicepackagesimgs::findOrFail($id);
                        if ($servicepackagesimgs->gallery_image!=""){
                            $filePath = public_path('uploads/servicepackages/gallery/'.$servicepackagesimgs->gallery_image); // Path to the file
                            if (file_exists($filePath)) {
                                unlink($filePath); // Delete the file
                            }
                        }
                        $servicepackagesimgs->delete();
                        
                        //return redirect()->route("administrative.servicepackages.index")->with("success","Data Deleted Successfully.");
                        return redirect()->route("administrative.servicepackages.imagesgallery",$servicepackagesimgs->servicepackages_id)->with("success","Data Deleted Successfully.");
                }else{

                    $page_name     = "Manage Service Packages";
                    $subpage_name  = "Delete Service Packages Gallery";

                    return view('administrative.permissions',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name
                    ]); 
                }
        }

        // change stock info.
        public function change_stock ($id){
            $servicepackages = Servicepackages::findorFail($id);
            if ($servicepackages->soldout=="Yes"){
                $servicepackages->soldout    =    "No";
            }else{
                $servicepackages->soldout    =    "Yes";
            }
            $servicepackages->save();
            echo $servicepackages->soldout;
        }

        // change show all info.
        public function change_showall ($id){
            $servicepackages = Servicepackages::findorFail($id);
            if ($servicepackages->showall=="Yes"){
                $servicepackages->showall    =    "No";
            }else{
                $servicepackages->showall    =    "Yes";
            }
            $servicepackages->save();
            echo $servicepackages->showall;
        }

        // change Featured Package info.
        public function change_featured ($id){
            $servicepackages = Servicepackages::findorFail($id);
            if ($servicepackages->featured_package==1){
                $servicepackages->featured_package    =    0;
            }else{
                $servicepackages->featured_package    =    1;
            }
            $servicepackages->save();
            echo $servicepackages->featured_package;
        }

        

}