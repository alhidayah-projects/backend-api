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
                'message' => 'you are not admin, you can not create new gallery'
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
                'message' => 'failed create gallery'
            ], 409);
        }

        return response()->json([
            'message' => 'gallery created successfully',
            'data' => $gallery
        ], 201);
    }

    // get all gallery
    public function getAllGallery()
    {
        $gallery = Gallery::all();
        $gallery = Gallery::paginate(10);
        // if failed
        if (!$gallery) {
            return response([
                'message' => 'failed get all gallery'
            ], 200);
        }

        return response()->json([
            'message' => 'success get all gallery',
            'data' => $gallery
        ], 200);
    }

    // get gallery by id
    public function getGalleryById($id)
    {
        $gallery = Gallery::find($id);
        // if failed
        if (!$gallery) {
            return response([
                'message' => 'failed get gallery by id'
            ], 200);
        }

        return response()->json([
            'message' => 'success get gallery by id',
            'data' => $gallery
        ], 200);
    }

    // delete gallery by id
    public function deleteGalleryById($id)
    {
        $gallery = Gallery::find($id);
        // if failed
        if (!$gallery) {
            return response([
                'message' => 'gallery not found'
            ], 200);
        }

        // only admin can delete gallery
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete gallery'
            ], 403);
        }

        // delete image
        Storage::disk('public')->delete($gallery->image);
        // delete gallery
        $gallery->delete();

        return response()->json([
            'message' => 'success delete gallery',
            'data' => $gallery
        ], 200);
    }

    /** delete all gallery */
    public function deleteAllGallery()
    {
        // only admin can create new gallery
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete all gallery'
            ], 403);
        }

        $gallery = Gallery::all();

        // if data Gallery not found
        if (count($gallery) == 0) {
            return response()->json([
                'message' => 'data Gallery not found'
            ], 200);
        }

        Gallery::truncate();

        return response()->json([
            'message' => 'success delete all data Gallery',
            'data' => $gallery
        ], 200);
    }

    /** update gallery */
    public function updateGallery(Request $request, $id)
    {
        // only admin can create new gallery
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not update article',
                'data' => $gallery
            ], 403);
        }
        $gallery = Gallery::find($id);

        // if empty data
        if($gallery == null){
            return response([
                'message' => 'gallery not found',
                'data' => $gallery
            ], 200);
        }

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery->update($request->all());
        return response()->json([
            'message' => 'gallery updated successfully',
            'data' => $gallery
        ], 200);
    }
}
