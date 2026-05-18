<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Services;
use App\Models\Servicepackages;

class CompareController extends Controller
{

   public function toggle(Request $request)
    {
        $id = $request->input('id'); // Item ID
        $compares = json_decode($request->cookie('compares', '[]'), true);

        if (!is_array($compares)) {
            $compares = [];
        }

        if (in_array($id, $compares)) {
            // Remove
            $compares = array_diff($compares, [$id]);
            $status = 'removed';
        } else {
            // Add
            $compares[] = $id;
            $compares = array_values(array_unique($compares)); // Clean up
            $status = 'added';
        }

        // Save updated compares in a cookie for 30 days
        Cookie::queue('compares', json_encode($compares), 60 * 24 * 30);

        return response()->json([
            'status' => $status,
            'compares' => $compares,
        ]);
    }


}
