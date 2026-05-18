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

use App\Models\Hotelinfos;
use App\Models\Hotelimgs;

class HotelinfosController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"19_v")==true){
        
                $page_name     = "Manage Hotels";
                $subpage_name  = "Manage Hotels";
                
                $hotelinfos = Hotelinfos::orderBy('created_at','desc')->get();

                return view('administrative.hotelinfos.list',[
                    'page_name'         => $page_name,
                    'subpage_name'      => $subpage_name,
                    "hotelinfos"        => $hotelinfos 
                ]); 
        
        }else{

            $page_name     = "Manage Hotels";
            $subpage_name  = "Manage Hotels";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"19_a")==true){

            $page_name     = "Manage Hotels";
            $subpage_name  = "Add Data";

            return view('administrative.hotelinfos.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Hotels";
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

        if (userpermission_status(session()->get('adminusergroups_id'),"19_a")==true){
            $rules = [
                'hotelinfos_name'           => 'required',
                'hotelinfos_city'           => 'required',
                'hotelinfos_startype'       => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.hotelinfos.create")->withInput()->withErrors($validator);
            }

            $hotelinfos     = new Hotelinfos();

            $hotelinfos->hotelinfos_name           = $request->hotelinfos_name;
            $hotelinfos->hotelinfos_city           = $request->hotelinfos_city;
            $hotelinfos->hotelinfos_startype       = $request->hotelinfos_startype;

            $hotelinfos->hotelinfos_details        = $request->hotelinfos_details;
            $hotelinfos->hotelinfos_sort           = $request->hotelinfos_sort;
            $hotelinfos->hotelinfos_status         = $request->hotelinfos_status;

            $hotelinfos->save();

            if ($request->hotelinfos_image != ""){

                // Validate the incoming image file
                $request->validate([
                    'hotelinfos_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);
            
                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());
            
                // Get uploaded image
                $hotelinfos_image = $request->file('hotelinfos_image');
                
                $hotelinfos_imageName = time() . '-hotel-.' . $hotelinfos_image->getClientOriginalExtension();

                // Resize the image
                if ($hotelinfos_image->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $hotelinfos_image = $manager->read($hotelinfos_image)->scale(width: 500, height: 254); // Resize to ...
                    $hotelinfos_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $hotelinfos_image->save(public_path('uploads/hotels/'.$hotelinfos_imageName));

                }else{
                    $resizedImage = $manager->read($hotelinfos_image)->scale(width: 500, height: 254);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/hotels/'.$hotelinfos_imageName));
                }   
                

                $hotelinfos->hotelinfos_image = $hotelinfos_imageName;
                $hotelinfos->save();
    
            }

            return redirect()->route("administrative.hotelinfos.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Hotels";
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
        if (userpermission_status(session()->get('adminusergroups_id'),"19_e")==true){
                $page_name     = "Manage Hotels";
                $subpage_name  = "Add Data";

                    $hotelinfos = Hotelinfos::findorFail($id);
                    return view('administrative.hotelinfos.edit',[
                        'page_name'            => $page_name,
                        'subpage_name'         => $subpage_name,
                        'hotelinfos'           => $hotelinfos
                    ]);
        }else{

            $page_name     = "Manage Hotels";
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

        if (userpermission_status(session()->get('adminusergroups_id'),"19_e")==true){

                $hotelinfos = Hotelinfos::findOrFail($id);

                $rules = [
                    'hotelinfos_name'           => 'required',
                    'hotelinfos_city'           => 'required',
                    'hotelinfos_startype'       => 'required',
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.hotelinfos.edit",$hotelinfos->hotelinfos_id)->withInput()->withErrors($validator);
                }

   
            $hotelinfos->hotelinfos_name           = $request->hotelinfos_name;
            $hotelinfos->hotelinfos_city           = $request->hotelinfos_city;
            $hotelinfos->hotelinfos_startype       = $request->hotelinfos_startype;

            $hotelinfos->hotelinfos_details        = $request->hotelinfos_details;
            $hotelinfos->hotelinfos_sort           = $request->hotelinfos_sort;
            $hotelinfos->hotelinfos_status         = $request->hotelinfos_status;
            
            $hotelinfos->save();

            if ($request->hotelinfos_image != ""){

                // Validate the incoming image file
                $request->validate([
                    'hotelinfos_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);
        
                // Initialize ImageManager with GD/Imagick Driver
                $manager = new ImageManager(new Driver());
        
                // Get uploaded image
                $hotelinfos_image = $request->file('hotelinfos_image');
        
                $hotelinfos_imageName = time() . '-hotel-.' . $hotelinfos_image->getClientOriginalExtension();
        
                // Resize the image
                if ($hotelinfos_image->getClientOriginalExtension() == "webp"){
                    // Read and compress the WebP image
                    $hotelinfos_image = $manager->read($hotelinfos_image)->scale(width: 500, height: 254); // Resize to ...
                    $hotelinfos_image->toWebp(quality: 70); // Convert to WebP with 70% quality
        
                    // Saveclsthe resized image
                    $hotelinfos_image->save(public_path('uploads/hotels/'.$hotelinfos_imageName));
        
                }else{
                    $resizedImage = $manager->read($hotelinfos_image)->scale(width: 500, height: 254);
                    
                    // Save the resized image
                    $resizedImage->save(public_path('uploads/hotels/'.$hotelinfos_imageName));
                }   
        
        
                $hotelinfos->hotelinfos_image = $hotelinfos_imageName;
                $hotelinfos->save();
        
            }
                
            return redirect()->route("administrative.hotelinfos.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Hotels";
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

        if (userpermission_status(session()->get('adminusergroups_id'),"19_d")==true){
                
                $hotelinfos = Hotelinfos::findOrFail($id);
                if ($hotelinfos->hotelinfos_image!=""){
                    $filePath = public_path('uploads/hotels/'.$hotelinfos->hotelinfos_image); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }


                $hotelimgs = Hotelimgs::where('hotelinfos_id',$hotelinfos->hotelinfos_id)->orderBy('created_at','desc')->get();
                foreach ($hotelimgs as $hotelimg){
                    if ($hotelimg->hotelimgs_image!=""){
                        $filePath = public_path('uploads/hotels/gallery/'.$hotelimg->hotelimgs_image); // Path to the file
                        if (file_exists($filePath)) {
                            unlink($filePath); // Delete the file
                        }
                    }
                }
                

                $hotelimgs = Hotelimgs::where('hotelinfos_id',$hotelinfos->hotelinfos_id);
                $hotelimgs->delete();
                
                $hotelinfos->delete();
                
                return redirect()->route("administrative.hotelinfos.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Hotels";
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
            if (userpermission_status(session()->get('adminusergroups_id'),"19_e")==true){

                $page_name     = "Manage Hotels";
                $subpage_name  = "Manage Hotels Gallery";
                
                $hotelinfos     = Hotelinfos::findorFail($id);

                $hotelimgs = Hotelimgs::where('hotelinfos_id',$id)->orderBy('created_at','desc')->get();

                return view('administrative.hotelinfos.listgallery',[
                    'page_name'                 => $page_name,
                    'subpage_name'              => $subpage_name,
                    "hotelinfos"                => $hotelinfos,
                    "hotelimgs"                 => $hotelimgs,
                    "hotelinfos_id"             => $id
                ]);

            }else{
    
                $page_name     = "Manage Hotels";
                $subpage_name  = "Manage Hotels Gallery";
    
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

            if (userpermission_status(session()->get('adminusergroups_id'),"19_a")==true){

                $page_name     = "Manage Hotels";
                $subpage_name  = "Add Hotels Gallery";

                $hotelinfos     = Hotelinfos::findorFail($id);

                return view('administrative.hotelinfos.createimagesgallery',[
                    'page_name'         => $page_name,
                    'subpage_name'      => $subpage_name,
                    "hotelinfos"        => $hotelinfos,
                ]); 
            }else{

                $page_name     = "Manage Hotels";
                $subpage_name  = "Add Hotels Gallery";

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

                if (userpermission_status(session()->get('adminusergroups_id'),"19_a")==true){
                    $rules = [
                        'hotelimgs_caption'         => 'required',
                        'hotelimgs_status'          => 'required',
                        'hotelimgs_sort'            => 'required',
                    ];
                    $validator = Validator::make($request->all(),$rules);
                
                    if ($validator->fails()){
                        return redirect()->back()->withInput()->withErrors($validator);
                        //"administrative.hotelinfos.createimagesgallery/".$request->servicepackages_id
                    }

                    $hotelimgs = new Hotelimgs();

                    $hotelimgs->hotelinfos_id          = $request->hotelinfos_id; 
                    $hotelimgs->hotelimgs_caption      = $request->hotelimgs_caption;
                    $hotelimgs->hotelimgs_sort         = $request->hotelimgs_sort;
                    $hotelimgs->hotelimgs_status       = $request->hotelimgs_status;
                    $hotelimgs->save();

                    if ($request->hotelimgs_image != ""){

                        // Validate the incoming image file
                        $request->validate([
                            'hotelimgs_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                        ]);
                    
                        // Initialize ImageManager with GD/Imagick Driver
                        $manager = new ImageManager(new Driver());
                    
                        // Get uploaded image
                        $hotelimgs_image = $request->file('hotelimgs_image');
                        
                        $hotelimgs_imageName = time() . '-gallery-.' . $hotelimgs_image->getClientOriginalExtension();
        
                        // Resize the image
                        if ($hotelimgs_image->getClientOriginalExtension() == "webp"){
                            // Read and compress the WebP image
                            $hotelimgs_image = $manager->read($hotelimgs_image)->scale(width: 760, height: 563); // Resize to ...
                            $hotelimgs_image->toWebp(quality: 70); // Convert to WebP with 70% quality
        
                            // Saveclsthe resized image
                            $hotelimgs_image->save(public_path('uploads/hotels/gallery/'.$hotelimgs_imageName));
        
                        }else{
                            $resizedImage = $manager->read($hotelimgs_image)->scale(width: 760, height: 563);
                            
                            // Save the resized image
                            $resizedImage->save(public_path('uploads/hotels/gallery/'.$hotelimgs_imageName));
                        }   
                        
        
                        $hotelimgs->hotelimgs_image = $hotelimgs_imageName;
                        $hotelimgs->save();
            
                    }
                    
                    //return redirect()->route("administrative.hotelinfos.imagesgallery")->with("success","Data Added Successfully.");
                    return redirect(url("/administrative/hotelinfos/imagesgallery/".$request->hotelinfos_id))->with("success","Data Added Successfully.");
                    
                
                }else{

                    $page_name     = "Manage Hotels";
                    $subpage_name  = "Add Hotels Gallery";

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
                if (userpermission_status(session()->get('adminusergroups_id'),"19_e")==true){
                        $page_name     = "Manage Hotels";
                        $subpage_name  = "Edit Hotels Gallery";

                            $hotelimgs = Hotelimgs::findorFail($id);
                            return view('administrative.hotelinfos.editimagesgallery',[
                                'page_name'             => $page_name,
                                'subpage_name'          => $subpage_name,
                                'hotelimgs'             => $hotelimgs
                            ]);
                }else{

                    $page_name     = "Manage Hotels";
                    $subpage_name  = "Edit Hotels Gallery";

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

            if (userpermission_status(session()->get('adminusergroups_id'),"19_e")==true){

                    $hotelimgs = Hotelimgs::findOrFail($id);

                    $rules = [
                        'hotelimgs_caption'         => 'required',
                        'hotelimgs_status'          => 'required',
                        'hotelimgs_sort'            => 'required',
                    ];

                    $validator = Validator::make($request->all(),$rules);
                
                    if ($validator->fails()){
                        return redirect()->route("administrative.hotelinfos.editimagesgallery",$hotelimgs->hotelimgs_id)->withInput()->withErrors($validator);
                    }
            
                $hotelimgs->hotelinfos_id          = $request->hotelinfos_id; 
                $hotelimgs->hotelimgs_caption      = $request->hotelimgs_caption;
                $hotelimgs->hotelimgs_sort         = $request->hotelimgs_sort;
                $hotelimgs->hotelimgs_status       = $request->hotelimgs_status;
                $hotelimgs->save();
                
                if ($request->hotelimgs_image != ""){

                    // Validate the incoming image file
                    $request->validate([
                        'hotelimgs_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                    ]);
                
                    // Initialize ImageManager with GD/Imagick Driver
                    $manager = new ImageManager(new Driver());
                
                    // Get uploaded image
                    $hotelimgs_image = $request->file('hotelimgs_image');
                    
                    $hotelimgs_imageName = time() . '-gallery-.' . $hotelimgs_image->getClientOriginalExtension();
    
                    // Resize the image
                    if ($hotelimgs_image->getClientOriginalExtension() == "webp"){
                        // Read and compress the WebP image
                        $hotelimgs_image = $manager->read($hotelimgs_image)->scale(width: 760, height: 563); // Resize to ...
                        $hotelimgs_image->toWebp(quality: 70); // Convert to WebP with 70% quality
    
                        // Saveclsthe resized image
                        $hotelimgs_image->save(public_path('uploads/hotels/gallery/'.$hotelimgs_imageName));
    
                    }else{
                        $resizedImage = $manager->read($hotelimgs_image)->scale(width: 760, height: 563);
                        
                        // Save the resized image
                        $resizedImage->save(public_path('uploads/hotels/gallery/'.$hotelimgs_imageName));
                    }   
                    
    
                    $hotelimgs->hotelimgs_image = $hotelimgs_imageName;
                    $hotelimgs->save();
        
                }
                
                        
                //return redirect()->route("administrative.hotelinfos.index")->with("success","Data Updated Successfully.");
                return redirect(url("/administrative/hotelinfos/imagesgallery/".$request->hotelinfos_id))->with("success","Data Updated Successfully.");
                    
            }else{

                $page_name     = "Manage Hotels";
                $subpage_name  = "Edit Hotels Gallery";

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

                if (userpermission_status(session()->get('adminusergroups_id'),"19_d")==true){
                        
                        $hotelimgs = Hotelimgs::findOrFail($id);
                        if ($hotelimgs->hotelimgs_image!=""){
                            $filePath = public_path('uploads/hotels/gallery/'.$hotelimgs->hotelimgs_image); // Path to the file
                            if (file_exists($filePath)) {
                                unlink($filePath); // Delete the file
                            }
                        }
                        $hotelimgs->delete();
                        
                        //return redirect()->route("administrative.hotelinfos.index")->with("success","Data Deleted Successfully.");
                        return redirect()->route("administrative.hotelinfos.imagesgallery",$hotelimgs->hotelinfos_id)->with("success","Data Deleted Successfully.");
                }else{

                    $page_name     = "Manage Hotels";
                    $subpage_name  = "Delete Hotels Gallery";

                    return view('administrative.permissions',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name
                    ]); 
                }
        }

}