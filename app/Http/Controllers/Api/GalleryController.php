<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;

class GalleryController extends Controller
{
    // create gallery 
    public function createGallery(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // only admin can create new gallery
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa membuat gallery'
            ], 403);
        }

        $gallery = Gallery::create([
            'title' => $request->title,
            // image upload
            'image' => $request->file('image')->store('gallery', 'public'),
        ]);
        // if failed
        if (!$gallery) {
            return response([
                'message' => 'gagal membuat gallery'
            ], 409);
        }

        return response()->json([
            'message' => 'gallery created successfully',
            'data' => $gallery
        ], 201);
    }
}
