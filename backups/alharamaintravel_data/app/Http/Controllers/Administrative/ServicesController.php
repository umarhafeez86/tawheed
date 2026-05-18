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
use App\Models\Services;
use App\Models\Servicesdetails;

class ServicesController extends Controller
{
    // This method will list
    public function index()
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "6_v") == true) {

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services";

            $services = Services::orderBy('created_at', 'desc')->get();

            return view('administrative.services.list', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                "services"      => $services
            ]);
        } else {

            $page_name     = "Manage Services";
            $subpage_name  = "Manage Services";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "6_a") == true) {

            $page_name     = "Manage Services";
            $subpage_name  = "Add Data";

            return view('administrative.services.create', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        } else {

            $page_name     = "Manage Services";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "6_a") == true) {
            $rules = [
                'services_name'         => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.services.create")->withInput()->withErrors($validator);
            }

            $services = new Services();
            $services->services_parent          = $request->services_parent;
            $services->services_name            = $request->services_name;
            $services->services_details         = $request->services_details;
            if ($request->services_url != "") {
                $services->services_url         = $request->services_url;
            } else {
                $services->services_url         = SEF_URLS($request->services_name);
            }

            $services->services_title           = $request->services_title;
            $services->services_descp           = $request->services_descp;
            $services->services_keyword         = $request->services_keyword;
            $services->services_sort            = $request->services_sort;
            $services->services_status          = $request->services_status;
            $services->faqs_id                  = $request->faqs_id;
            $services->save();
            $services_id                        = $services->services_id;

            if ($request->services_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'services_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $services_image = $request->file('services_image');

                $services_imageName = $services->services_url. '.' . $services_image->getClientOriginalExtension();

                // Resize the image
                if ($services_image->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $services_image = $manager->read($services_image)->scale(width: 1920, height: 414); // Resize to ...
                    $services_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $services_image->save(public_path('uploads/services/header-' . $services_imageName));
                } else {
                    $resizedImage = $manager->read($services_image)->scale(width: 1920, height: 414);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/services/header-' . $services_imageName));
                }

                $services->services_image = "header-".$services_imageName;
                $services->save();
            }

            if ($request->services_image2 != "") {

                // Validate the incoming image file
                $request->validate([
                    'services_image2' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $services_image2 = $request->file('services_image2');

                $services_imageName2 = $services->services_url . '.' . $services_image2->getClientOriginalExtension();

                // Resize the image
                if ($services_image2->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $services_image2 = $manager->read($services_image2)->scale(width: 315, height: 277); // Resize to ...
                    $services_image2->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $services_image2->save(public_path('uploads/services/thumbail-' . $services_imageName2));
                } else {
                    $resizedImage = $manager->read($services_image2)->scale(width: 315, height: 277);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/services/thumbail-' . $services_imageName2));
                }

                $services->services_image2 = "thumbail-".$services_imageName2;
                $services->save();
            }

            return redirect()->route("administrative.services.index")->with("success", "Data Added Successfully.");

        } else {

            $page_name     = "Manage Services";
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
        if (userpermission_status(session()->get('adminusergroups_id'), "6_e") == true) {
            $page_name     = "Manage Services";
            $subpage_name  = "Edit Data";

            $services = Services::findorFail($id);
            return view('administrative.services.edit', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                'services'      => $services
            ]);
        } else {

            $page_name     = "Manage Services";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "6_e") == true) {

            $services = Services::findOrFail($id);

            $rules = [
                'services_name'         => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.services.edit", $services->services_id)->withInput()->withErrors($validator);
            }

            $services->services_parent      = $request->services_parent;
            $services->services_name        = $request->services_name;
            $services->services_details     = $request->services_details;

            if ($request->services_url != "") {
                $services->services_url         = $request->services_url;
            } else {
                $services->services_url         = SEF_URLS($request->services_name);
            }

            $services->services_title           = $request->services_title;
            $services->services_descp           = $request->services_descp;
            $services->services_keyword         = $request->services_keyword;
            $services->services_sort            = $request->services_sort;
            $services->services_status          = $request->services_status;
            $services->faqs_id                  = $request->faqs_id;
            $services->save();


            if ($request->services_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'services_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $services_image = $request->file('services_image');

                $services_imageName = $services->services_url . '.' . $services_image->getClientOriginalExtension();

                // Resize the image
                if ($services_image->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $services_image = $manager->read($services_image)->scale(width: 1920, height: 414); // Resize to ...
                    $services_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $services_image->save(public_path('uploads/services/header-' . $services_imageName));
                } else {
                    $resizedImage = $manager->read($services_image)->scale(width: 1920, height: 414);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/services/header-' . $services_imageName));
                }

                $services->services_image = "header-".$services_imageName;
                $services->save();
            }

            if ($request->services_image2 != "") {

                // Validate the incoming image file
                $request->validate([
                    'services_image2' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $services_image2 = $request->file('services_image2');

                $services_imageName2 = $services->services_url. '.' . $services_image2->getClientOriginalExtension();

                // Resize the image
                if ($services_image2->getClientOriginalExtension() == "webp") {
                    // Read and compress the WebP image
                    $services_image2 = $manager->read($services_image2)->scale(width: 315, height: 277); // Resize to ...
                    $services_image2->toWebp(quality: 70); // Convert to WebP with 70% quality

                    // Saveclsthe resized image
                    $services_image2->save(public_path('uploads/services/thumbnail-' . $services_imageName2));
                } else {
                    $resizedImage = $manager->read($services_image2)->scale(width: 315, height: 277);

                    // Save the resized image
                    $resizedImage->save(public_path('uploads/services/thumbnail-' . $services_imageName2));
                }

                $services->services_image2 = "thumbnail-".$services_imageName2;
                $services->save();
            }

            return redirect()->route("administrative.services.index")->with("success", "Data Updated Successfully.");
        } else {

            $page_name     = "Manage Services";
            $subpage_name  = "Edit Data";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "6_d") == true) {

            $services = Services::findOrFail($id);

            $servicesdetails = Servicesdetails::where('services_id', $services->services_id);
            $servicesdetails->delete();

            $services->delete();

            return redirect()->route("administrative.services.index")->with("success", "Data Deleted Successfully.");
        } else {

            $page_name     = "Manage Services";
            $subpage_name  = "Delete Data";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }

    // change Show in Related info.
    public function change_related($id)
    {
        $services = Services::findorFail($id);
        if ($services->show_in_related == 1) {
            $services->show_in_related    =    0;
        } else {
            $services->show_in_related    =    1;
        }
        $services->save();
        echo $services->show_in_related;
    }
}
