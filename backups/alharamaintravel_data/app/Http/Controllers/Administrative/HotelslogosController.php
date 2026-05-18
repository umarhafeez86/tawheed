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

use App\Models\Hotelslogos;

class HotelslogosController extends Controller
{
    // This method will list
    public function index()
    {

        if (session()->has("admin_name")) {
        } else {
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'), "21_v") == true) {

            $page_name     = "Manage Hotels Logos";
            $subpage_name  = "Manage Hotels Logos";

            $hotelslogos   = Hotelslogos::orderBy('created_at', 'desc')->get();

            return view('administrative.hotelslogos.list', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                "hotelslogos"   => $hotelslogos
            ]);
        } else {

            $page_name     = "Manage Hotels Logos";
            $subpage_name  = "Manage Hotels Logos";

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

        if (userpermission_status(session()->get('adminusergroups_id'), "21_a") == true) {

            $page_name     = "Manage Hotels Logos";
            $subpage_name  = "Add Data";

            return view('administrative.hotelslogos.create', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        } else {

            $page_name     = "Manage Hotels Logos";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "21_a") == true) {
            $rules = [
                'hotelslogos_name'         => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.hotelslogos.create")->withInput()->withErrors($validator);
            }

            $hotelslogos = new Hotelslogos();
            $hotelslogos->hotelslogos_name            = $request->hotelslogos_name;
            $hotelslogos->hotelslogos_link            = $request->hotelslogos_link;

            $hotelslogos->hotelslogos_sort            = $request->hotelslogos_sort;
            $hotelslogos->hotelslogos_status          = $request->hotelslogos_status;

            $hotelslogos->save();

            if ($request->hotelslogos_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'hotelslogos_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $hotelslogos_image = $request->file('hotelslogos_image');

                $image = $manager->read($hotelslogos_image->getPathname());

                // Target dimensions
                $targetWidth = 263;
                $targetHeight = 142;

                // Check if image is larger than target size
                if ($image->width() >= $targetWidth && $image->height() >= $targetHeight) {

                    $hotelslogos_imageName = time() . '.' . $hotelslogos_image->getClientOriginalExtension();

                    // Resize the image
                    if ($hotelslogos_image->getClientOriginalExtension() == "webp") {
                        // Read and compress the WebP image
                        $hotelslogos_image = $manager->read($hotelslogos_image)->scale(width: 263, height: 142); // Resize to ...
                        $hotelslogos_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $hotelslogos_image->save(public_path('uploads/hotelslogos/' . $hotelslogos_imageName));
                    } else {
                        $resizedImage = $manager->read($hotelslogos_image)->scale(width: 263, height: 142);

                        // Save the resized image
                        $resizedImage->save(public_path('uploads/hotelslogos/' . $hotelslogos_imageName));
                    }

                    $hotelslogos->hotelslogos_image = $hotelslogos_imageName;
                    $hotelslogos->save();
                } else {

                    $hotelslogos_image       = $request->hotelslogos_image;
                    $ext                     = $hotelslogos_image->getClientOriginalExtension();
                    $hotelslogos_imageName   = time() . '.' . $ext;

                    $hotelslogos_image->move(public_path('uploads/hotelslogos/'), $hotelslogos_imageName);

                    $hotelslogos->hotelslogos_image = $hotelslogos_imageName;
                    $hotelslogos->save();
                }
            }

            return redirect()->route("administrative.hotelslogos.index")->with("success", "Data Added Successfully.");
        } else {

            $page_name     = "Manage Hotels Logos";
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
        if (userpermission_status(session()->get('adminusergroups_id'), "21_e") == true) {
            $page_name     = "Manage Hotels Logos";
            $subpage_name  = "Edit Data";

            $hotelslogos   = Hotelslogos::findorFail($id);
            return view('administrative.hotelslogos.edit', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name,
                'hotelslogos'   => $hotelslogos
            ]);
        } else {

            $page_name     = "Manage Hotels Logos";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "21_e") == true) {

            $hotelslogos = Hotelslogos::findOrFail($id);

            $rules = [
                'hotelslogos_name'         => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route("administrative.services.edit", $hotelslogos->hotelslogos_id)->withInput()->withErrors($validator);
            }

            $hotelslogos->hotelslogos_name            = $request->hotelslogos_name;
            $hotelslogos->hotelslogos_link            = $request->hotelslogos_link;

            $hotelslogos->hotelslogos_sort            = $request->hotelslogos_sort;
            $hotelslogos->hotelslogos_status          = $request->hotelslogos_status;

            $hotelslogos->save();

            if ($request->hotelslogos_image != "") {

                // Validate the incoming image file
                $request->validate([
                    'hotelslogos_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                ]);

                // Initialize ImageManager with GD Driver
                $manager = new ImageManager(new Driver());

                // Get uploaded image
                $hotelslogos_image = $request->file('hotelslogos_image');

                $image = $manager->read($hotelslogos_image->getPathname());

                // Target dimensions
                $targetWidth = 263;
                $targetHeight = 142;

                // Check if image is larger than target size
                if ($image->width() >= $targetWidth && $image->height() >= $targetHeight) {

                    $hotelslogos_imageName = time() . '.' . $hotelslogos_image->getClientOriginalExtension();

                    // Resize the image
                    if ($hotelslogos_image->getClientOriginalExtension() == "webp") {
                        // Read and compress the WebP image
                        $hotelslogos_image = $manager->read($hotelslogos_image)->scale(width: 263, height: 142); // Resize to ...
                        $hotelslogos_image->toWebp(quality: 70); // Convert to WebP with 70% quality

                        // Saveclsthe resized image
                        $hotelslogos_image->save(public_path('uploads/hotelslogos/' . $hotelslogos_imageName));
                    } else {
                        $resizedImage = $manager->read($hotelslogos_image)->scale(width: 263, height: 142);

                        // Save the resized image
                        $resizedImage->save(public_path('uploads/hotelslogos/' . $hotelslogos_imageName));
                    }

                    $hotelslogos->hotelslogos_image = $hotelslogos_imageName;
                    $hotelslogos->save();
                } else {

                    $hotelslogos_image       = $request->hotelslogos_image;
                    $ext                     = $hotelslogos_image->getClientOriginalExtension();
                    $hotelslogos_imageName   = time() . '.' . $ext;

                    $hotelslogos_image->move(public_path('uploads/hotelslogos/'), $hotelslogos_imageName);

                    $hotelslogos->hotelslogos_image = $hotelslogos_imageName;
                    $hotelslogos->save();
                }
            }

            return redirect()->route("administrative.hotelslogos.index")->with("success", "Data Updated Successfully.");
        } else {

            $page_name     = "Manage Hotels Logos";
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

        if (userpermission_status(session()->get('adminusergroups_id'), "21_d") == true) {

            $hotelslogos = Hotelslogos::findOrFail($id);

            if ($hotelslogos->hotelslogos_image != "") {
                $filePath = public_path('uploads/hotelslogos/' . $hotelslogos->hotelslogos_image); // Path to the file
                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file
                }
            }

            $hotelslogos->delete();

            return redirect()->route("administrative.hotelslogos.index")->with("success", "Data Deleted Successfully.");
        } else {

            $page_name     = "Manage Hotels Logos";
            $subpage_name  = "Delete Data";

            return view('administrative.permissions', [
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]);
        }
    }
}
