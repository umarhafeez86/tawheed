<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;  // Import the GD driver
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Settings;
use App\Models\Wladmins;
use App\Models\Banners;

class BannersController extends Controller
{
    // This method will list
    public function index()
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "13_v") == true) {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

            $banners = Banners::orderBy('created_at', 'desc')->get();

            return view('administrative.banners.list', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                "banners"       => $banners
            ]);
        } else {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "13_a") == true) {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

            return view('administrative.banners.create', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        } else {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "13_a") == true) {
            $rules = [
                'banners_name'         => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.banners.create")->withInput()->withErrors($validator);
            }

            $banners = new Banners();
            $banners->banners_name            = $request->banners_name;
            $banners->banners_details         = $request->banners_details;

            $banners->banners_link            = $request->banners_link;
            $banners->banners_sort            = $request->banners_sort;
            $banners->banners_status          = $request->banners_status;

            $banners->banners_text1           = $request->banners_text1;
            $banners->banners_text2           = $request->banners_text2;
            $banners->banners_text3           = $request->banners_text3;
            $banners->banners_price           = $request->banners_price;

            $banners->banners_for             = $request->banners_for;
            
            $banners->banners_image_box_type  = $request->banners_image_box_type;

            if ($request->banners_image_box_type == 0) {
                $targetWidth  = 459;
                $targetHeight = 250;
            } elseif ($request->banners_image_box_type == 1) {
                $targetWidth  = 864;
                $targetHeight = 340;
            } elseif ($request->banners_image_box_type == 2) {
                $targetWidth  = 414;
                $targetHeight = 340;
            } elseif ($request->banners_image_box_type == 3) {
                $targetWidth  = 470;
                $targetHeight = 350;
            }


            $banners->save();

            /*if ($request->banners_image != ""){

                $banners_image   = $request->banners_image;
                $ext                  = $banners_image->getClientOriginalExtension();
                $banners_imageName   = time().'.'.$ext;
        
                $banners_image->move(public_path('uploads/banners/'),$banners_imageName);
                
                $banners->banners_image = $banners_imageName;
                $banners->save();
        
            }*/

            if ($request->banners_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'banners_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $banners_image = $request->file('banners_image');

                $image = $manager->read($banners_image->getPathname());

                // Check if image is larger than target size
                if ($image->width() >= $targetWidth && $image->height() >= $targetHeight) {


                    $banners_imageName = time() . '.' . $banners_image->getClientOriginalExtension();

                    // Resize the image
                    if ($banners_image->getClientOriginalExtension() == "webp") {
                        // Read and compress the WebP image
                        $servicepackages_image = $manager->read($banners_image)->scale(width: $targetWidth, height: $targetHeight); // Resize to ...
                        $servicepackages_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $servicepackages_image->save(public_path('uploads/banners/' . $banners_imageName));
                    } else {
                        $resizedImage = $manager->read($banners_image)->scale(width: $targetWidth, height: $targetHeight);

                        // Save the resized image
                        $resizedImage->save(public_path('uploads/banners/' . $banners_imageName));
                    }

                    $banners->banners_image = $banners_imageName;
                    $banners->save();
                } else {

                    $banners_image     = $request->banners_image;
                    $ext               = $banners_image->getClientOriginalExtension();
                    $banners_imageName = time() . '.' . $ext;

                    $banners_image->move(public_path('uploads/banners/'), $banners_imageName);

                    $banners->banners_image = $banners_imageName;
                    $banners->save();
                }
            }



            return redirect()->route("administrative.banners.index")->with("success", "Data Added Successfully.");
        } else {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

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
        if (userpermission_status(session()->get('adminusergroups_id'), "13_e") == true) {
            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

            $banners = Banners::findorFail($id);
            return view('administrative.banners.edit', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                'banners'       => $banners
            ]);
        } else {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "13_e") == true) {

            $banners = Banners::findOrFail($id);

            $rules = [
                'banners_name'         => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.banners.edit", $banners->banners_id)->withInput()->withErrors($validator);
            }

            $banners->banners_name            = $request->banners_name;
            $banners->banners_details         = $request->banners_details;

            $banners->banners_link            = $request->banners_link;
            $banners->banners_sort            = $request->banners_sort;
            $banners->banners_status          = $request->banners_status;

            $banners->banners_text1           = $request->banners_text1;
            $banners->banners_text2           = $request->banners_text2;
            $banners->banners_text3           = $request->banners_text3;
            $banners->banners_price           = $request->banners_price;

            $banners->banners_for             = $request->banners_for;

            $banners->banners_image_box_type  = $request->banners_image_box_type;

            if ($request->banners_image_box_type == 0) {
                $targetWidth  = 459;
                $targetHeight = 250;
            } elseif ($request->banners_image_box_type == 1) {
                $targetWidth  = 864;
                $targetHeight = 340;
            } elseif ($request->banners_image_box_type == 2) {
                $targetWidth  = 414;
                $targetHeight = 340;
            } elseif ($request->banners_image_box_type == 3) {
                $targetWidth  = 470;
                $targetHeight = 350;
            }


            $banners->save();

            if ($request->banners_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'banners_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $banners_image = $request->file('banners_image');

                $image = $manager->read($banners_image->getPathname());

                // Check if image is larger than target size
                if ($image->width() >= $targetWidth && $image->height() >= $targetHeight) {


                    $banners_imageName = time() . '.' . $banners_image->getClientOriginalExtension();

                    // Resize the image
                    if ($banners_image->getClientOriginalExtension() == "webp") {
                        // Read and compress the WebP image
                        $servicepackages_image = $manager->read($banners_image)->scale(width: $targetWidth, height: $targetHeight); // Resize to ...
                        $servicepackages_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $servicepackages_image->save(public_path('uploads/banners/' . $banners_imageName));
                    } else {
                        $resizedImage = $manager->read($banners_image)->scale(width: $targetWidth, height: $targetHeight);

                        // Save the resized image
                        $resizedImage->save(public_path('uploads/banners/' . $banners_imageName));
                    }

                    $banners->banners_image = $banners_imageName;
                    $banners->save();
                } else {

                    $banners_image     = $request->banners_image;
                    $ext               = $banners_image->getClientOriginalExtension();
                    $banners_imageName = time() . '.' . $ext;

                    $banners_image->move(public_path('uploads/banners/'), $banners_imageName);

                    $banners->banners_image = $banners_imageName;
                    $banners->save();
                }
            }



            return redirect()->route("administrative.banners.index")->with("success", "Data Updated Successfully.");
        } else {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }

    // This method will destroy
    public function destroy($id)
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "13_d") == true) {

            $banners = Banners::findOrFail($id);
            if ($banners->banners_image != "") {
                $filePath = public_path('uploads/banners/' . $banners->banners_image); // Path to the file
                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file
                }
            }

            $banners->delete();

            return redirect()->route("administrative.banners.index")->with("success", "Data Deleted Successfully.");
        } else {

            $page_name     = "Manage Banners";
            $subpage_name  = "Manage Banners";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }
}
