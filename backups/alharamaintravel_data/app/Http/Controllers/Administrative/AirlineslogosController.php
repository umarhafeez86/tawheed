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

use App\Models\Airlineslogos;

class AirlineslogosController extends Controller
{
    // This method will list
    public function index()
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "22_v") == true) {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Manage Airlines Logos";

            $airlineslogos   = Airlineslogos::orderBy('created_at', 'desc')->get();

            return view('administrative.airlineslogos.list', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                "airlineslogos"   => $airlineslogos
            ]);
        } else {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Manage Airlines Logos";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }

    // This method will create
    public function create()
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "22_a") == true) {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Add Data";

            return view('administrative.airlineslogos.create', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        } else {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Add Data";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }


    // This method will store
    public function store(Request $request)
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "22_a") == true) {
            $rules = [
                'airlineslogos_name'         => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.airlineslogos.create")->withInput()->withErrors($validator);
            }

            $airlineslogos = new Airlineslogos();
            $airlineslogos->airlineslogos_name            = $request->airlineslogos_name;
            $airlineslogos->airlineslogos_link            = $request->airlineslogos_link;

            $airlineslogos->airlineslogos_sort            = $request->airlineslogos_sort;
            $airlineslogos->airlineslogos_status          = $request->airlineslogos_status;

            $airlineslogos->save();

            if ($request->airlineslogos_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'airlineslogos_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $airlineslogos_image = $request->file('airlineslogos_image');

                $image = $manager->read($airlineslogos_image->getPathname());

                // Target dimensions
                $targetWidth = 263;
                $targetHeight = 142;

                // Check if image is larger than target size
                if ($image->width() >= $targetWidth && $image->height() >= $targetHeight) {

                    $airlineslogos_imageName = time() . '.' . $airlineslogos_image->getClientOriginalExtension();

                    // Resize the image
                    if ($airlineslogos_image->getClientOriginalExtension() == "webp") {
                        // Read and compress the WebP image
                        $airlineslogos_image = $manager->read($airlineslogos_image)->scale(width: 263, height: 142); // Resize to ...
                        $airlineslogos_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $airlineslogos_image->save(public_path('uploads/airlineslogos/' . $airlineslogos_imageName));
                    } else {
                        $resizedImage = $manager->read($airlineslogos_image)->scale(width: 263, height: 142);

                        // Save the resized image
                        $resizedImage->save(public_path('uploads/airlineslogos/' . $airlineslogos_imageName));
                    }

                    $airlineslogos->airlineslogos_image = $airlineslogos_imageName;
                    $airlineslogos->save();
                } else {

                    $airlineslogos_image       = $request->airlineslogos_image;
                    $ext                     = $airlineslogos_image->getClientOriginalExtension();
                    $airlineslogos_imageName   = time() . '.' . $ext;

                    $airlineslogos_image->move(public_path('uploads/airlineslogos/'), $airlineslogos_imageName);

                    $airlineslogos->airlineslogos_image = $airlineslogos_imageName;
                    $airlineslogos->save();
                }
            }

            return redirect()->route("administrative.airlineslogos.index")->with("success", "Data Added Successfully.");
        } else {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Add Data";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }


    // This method will edit
    public function edit($id)
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        //echo $id;
        if (userpermission_status(session()->get('adminusergroups_id'), "22_e") == true) {
            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Edit Data";

            $airlineslogos   = Airlineslogos::findorFail($id);
            return view('administrative.airlineslogos.edit', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                'airlineslogos'   => $airlineslogos
            ]);
        } else {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Edit Data";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }

    // This method will update
    public function update($id, Request $request)
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "22_e") == true) {

            $airlineslogos = Airlineslogos::findOrFail($id);

            $rules = [
                'airlineslogos_name'         => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.services.edit", $airlineslogos->airlineslogos_id)->withInput()->withErrors($validator);
            }

            $airlineslogos->airlineslogos_name            = $request->airlineslogos_name;
            $airlineslogos->airlineslogos_link            = $request->airlineslogos_link;

            $airlineslogos->airlineslogos_sort            = $request->airlineslogos_sort;
            $airlineslogos->airlineslogos_status          = $request->airlineslogos_status;

            $airlineslogos->save();

            if ($request->airlineslogos_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'airlineslogos_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $airlineslogos_image = $request->file('airlineslogos_image');

                $image = $manager->read($airlineslogos_image->getPathname());

                // Target dimensions
                $targetWidth = 263;
                $targetHeight = 142;

                // Check if image is larger than target size
                if ($image->width() >= $targetWidth && $image->height() >= $targetHeight) {

                    $airlineslogos_imageName = time() . '.' . $airlineslogos_image->getClientOriginalExtension();

                    // Resize the image
                    if ($airlineslogos_image->getClientOriginalExtension() == "webp") {
                        // Read and compress the WebP image
                        $airlineslogos_image = $manager->read($airlineslogos_image)->scale(width: 263, height: 142); // Resize to ...
                        $airlineslogos_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $airlineslogos_image->save(public_path('uploads/airlineslogos/' . $airlineslogos_imageName));
                    } else {
                        $resizedImage = $manager->read($airlineslogos_image)->scale(width: 263, height: 142);

                        // Save the resized image
                        $resizedImage->save(public_path('uploads/airlineslogos/' . $airlineslogos_imageName));
                    }

                    $airlineslogos->airlineslogos_image = $airlineslogos_imageName;
                    $airlineslogos->save();
                } else {

                    $airlineslogos_image       = $request->airlineslogos_image;
                    $ext                     = $airlineslogos_image->getClientOriginalExtension();
                    $airlineslogos_imageName   = time() . '.' . $ext;

                    $airlineslogos_image->move(public_path('uploads/airlineslogos/'), $airlineslogos_imageName);

                    $airlineslogos->airlineslogos_image = $airlineslogos_imageName;
                    $airlineslogos->save();
                }
            }

            return redirect()->route("administrative.airlineslogos.index")->with("success", "Data Updated Successfully.");

        } else {

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Edit Data";

            return view('administrative.permissions', [
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

        if (userpermission_status(session()->get('adminusergroups_id'),"22_d")==true){
                
                $airlineslogos = Airlineslogos::findOrFail($id);

                if ($airlineslogos->airlineslogos_image!=""){
                    $filePath = public_path('uploads/airlineslogos/'.$airlineslogos->airlineslogos_image); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }

                $airlineslogos->delete();
                
                return redirect()->route("administrative.airlineslogos.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Airlines Logos";
            $subpage_name  = "Delete Data";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
