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

class FavoriteController extends Controller
{

   public function toggle(Request $request)
    {
        $id = $request->input('id'); // Item ID
        $favorites = json_decode($request->cookie('favorites', '[]'), true);

        $compares = json_decode($request->cookie('compares', '[]'), true);

        if (!is_array($favorites)) {
            $favorites = [];
        }

        if (!is_array($compares)) {
            $compares = [];
        }

        if (in_array($id, $favorites)) {
            // Remove

            $compares  = array_diff($compares, [$id]);
            $favorites = array_diff($favorites, [$id]);
            $status = 'removed';
        } else {
            // Add
            $favorites[] = $id;
            $favorites = array_values(array_unique($favorites)); // Clean up
            $status = 'added';
        }

        $total_saved = count($favorites);
        // Save updated favorites in a cookie for 30 days
        Cookie::queue('favorites', json_encode($favorites), 60 * 24 * 30);
        Cookie::queue('compares' , json_encode($compares), 60 * 24 * 30);

        return response()->json([
            'status'      => $status,
            'favorites'   => $favorites,
            'total_saved' => $total_saved
        ]);
    }


}
