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

use App\Models\Destinations;

class DestinationsController extends Controller
{
    // This method will list
    public function index()
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "20_v") == true) {

            $page_name     = "Manage Destinations";
            $subpage_name  = "Manage Destinations";

            $destinations = Destinations::orderBy('created_at', 'desc')->get();

            return view('administrative.destinations.list', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                "destinations"  => $destinations
            ]);
        } else {

            $page_name     = "Manage Destinations";
            $subpage_name  = "Manage Destinations";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "20_a") == true) {

            $page_name     = "Manage Destinations";
            $subpage_name  = "Add Data";

            return view('administrative.destinations.create', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        } else {

            $page_name     = "Manage Destinations";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "20_a") == true) {
            $rules = [
                'destinations_name'         => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.destinations.create")->withInput()->withErrors($validator);
            }

            $destinations = new Destinations();
            $destinations->destinations_name            = $request->destinations_name;
            $destinations->destinations_details         = $request->destinations_details;

            if ($request->destinations_url != "") {
                $destinations->destinations_url     = $request->destinations_url;
            } else {
                $destinations->destinations_url     = SEF_URLS($request->destinations_name);
            }

            $destinations->destinations_title           = $request->destinations_title;
            $destinations->destinations_descp           = $request->destinations_descp;
            $destinations->destinations_keyword         = $request->destinations_keyword;
            $destinations->destinations_sort            = $request->destinations_sort;
            $destinations->destinations_status          = $request->destinations_status;

            $destinations->save();

            if ($request->destinations_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'destinations_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $destinations_image = $request->file('destinations_image');

                $destinations_imageName = time() . '.' . $destinations_image->getClientOriginalExtension();

                // Resize the image
                if ($destinations_image->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $destinations_image = $manager->read($destinations_image)->scale(width: 268, height: 220); // Resize to ...
                    $destinations_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $destinations_image->save(public_path('uploads/destinations/' . $destinations_imageName));
                } else {
                    $resizedImage = $manager->read($destinations_image)->scale(width: 268, height: 220);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/destinations/' . $destinations_imageName));
                }

                $destinations->destinations_image = $destinations_imageName;
                $destinations->save();
            }

            if ($request->destinations_image2 != "") {

                // Validate the incoming image file
                $request->validate([
                    'destinations_image2' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $destinations_image2 = $request->file('destinations_image2');

                $destinations_imageName2 = time() . '.' . $destinations_image2->getClientOriginalExtension();

                // Resize the image
                if ($destinations_image2->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $destinations_image2 = $manager->read($destinations_image2)->scale(width: 1920, height: 414); // Resize to ...
                    $destinations_image2->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $destinations_image2->save(public_path('uploads/destinations/' . $destinations_imageName2));
                } else {
                    $resizedImage = $manager->read($destinations_image2)->scale(width: 1920, height: 414);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/destinations/' . $destinations_imageName2));
                }

                $destinations->destinations_image2 = $destinations_imageName2;
                $destinations->save();
            }


            return redirect()->route("administrative.destinations.index")->with("success", "Data Added Successfully.");
        } else {

            $page_name     = "Manage Destinations";
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
        if (userpermission_status(session()->get('adminusergroups_id'), "20_e") == true) {
            $page_name     = "Manage Destinations";
            $subpage_name  = "Edit Data";

            $destinations = Destinations::findorFail($id);
            return view('administrative.destinations.edit', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                'destinations'  => $destinations
            ]);
        } else {

            $page_name     = "Manage Destinations";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "20_e") == true) {

            $destinations = Destinations::findOrFail($id);

            $rules = [
                'destinations_name'         => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.services.edit", $destinations->destinations_id)->withInput()->withErrors($validator);
            }

            $destinations->destinations_name        = $request->destinations_name;
            $destinations->destinations_details     = $request->destinations_details;

            if ($request->destinations_url != "") {
                $destinations->destinations_url     = $request->destinations_url;
            } else {
                $destinations->destinations_url     = SEF_URLS($request->destinations_name);
            }

            $destinations->destinations_title           = $request->destinations_title;
            $destinations->destinations_descp           = $request->destinations_descp;
            $destinations->destinations_keyword         = $request->destinations_keyword;
            $destinations->destinations_sort            = $request->destinations_sort;
            $destinations->destinations_status          = $request->destinations_status;

            $destinations->save();


            if ($request->destinations_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'destinations_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $destinations_image = $request->file('destinations_image');

                $destinations_imageName = time() . '.' . $destinations_image->getClientOriginalExtension();

                // Resize the image
                if ($destinations_image->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $destinations_image = $manager->read($destinations_image)->scale(width: 268, height: 220); // Resize to ...
                    $destinations_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $destinations_image->save(public_path('uploads/destinations/' . $destinations_imageName));
                } else {
                    $resizedImage = $manager->read($destinations_image)->scale(width: 268, height: 220);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/destinations/' . $destinations_imageName));
                }

                $destinations->destinations_image = $destinations_imageName;
                $destinations->save();
            }

            if ($request->destinations_image2 != "") {

                // Validate the incoming image file
                $request->validate([
                    'destinations_image2' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $destinations_image2 = $request->file('destinations_image2');

                $destinations_imageName2 = time() . '.' . $destinations_image2->getClientOriginalExtension();

                // Resize the image
                if ($destinations_image2->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $destinations_image2 = $manager->read($destinations_image2)->scale(width: 1920, height: 414); // Resize to ...
                    $destinations_image2->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $destinations_image2->save(public_path('uploads/destinations/' . $destinations_imageName2));
                } else {
                    $resizedImage = $manager->read($destinations_image2)->scale(width: 1920, height: 414);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/destinations/' . $destinations_imageName2));
                }

                $destinations->destinations_image2 = $destinations_imageName2;
                $destinations->save();
            }

            return redirect()->route("administrative.destinations.index")->with("success", "Data Updated Successfully.");

        } else {

            $page_name     = "Manage Destinations";
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

        if (userpermission_status(session()->get('adminusergroups_id'),"20_d")==true){
                
                $destinations = Destinations::findOrFail($id);
                if ($destinations->destinations_image!=""){
                    $filePath = public_path('uploads/destinations/'.$destinations->destinations_image); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }

                if ($destinations->destinations_image2!=""){
                    $filePath = public_path('uploads/destinations/'.$destinations->destinations_image2); // Path to the file
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the file
                    }
                }

                $destinations->delete();
                
                return redirect()->route("administrative.destinations.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Destinations";
            $subpage_name  = "Delete Data";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
