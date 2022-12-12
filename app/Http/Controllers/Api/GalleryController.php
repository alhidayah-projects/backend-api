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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
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
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete gallery'
            ], 403);
        }

        $gallery = Gallery::find($id);

        // if empty data
        if($gallery == null){
            return response ([
                'message' => 'gallery not found',
                'data' => $gallery
            ], 200);
        }
        // delete image in public/storage/gallery
        \Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return response ([
            'message' => 'gallery deleted successfully',
            'data' => $gallery
        ], 200);
    }

    /** delete all gallery */
    public function deleteAllGallery()
    {
        $gallery = Gallery::all();
        // only admin can create new gallery
        if (Auth::user()->role != 'admin') {
            return response ([
                'message' => 'you are not admin, you can not delete all gallery',
                'data' => $gallery
            ], 403);
        }
        // if empty data
        if($gallery->isEmpty()){
            return response ([
                'message' => 'gallery not found',
                'data' => $gallery
            ], 200);
        }

        // delete image in public/storage/gallery
        foreach($gallery as $a){
            \Storage::disk('public')->delete($a->image);
        }
        $gallery->each->delete();

        return response ([
            'message' => 'all gallery deleted successfully',
            'data' => $gallery
        ], 200);
    }

    /** update gallery */
    public function updateGallery(Request $request, $id)
    {
        // only admin can create new gallery
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not update gallery',
                'data' => $gallery
            ], 403);
        }
        $gallery = Gallery::find($id);

        // Validate form
        $this->validate($request, [
            'title' => 'required'
        ]);

        // check if image is uploaded
        if($request->hasFile('image')){
            // image should be stored in storage/app/public
            $image = $request->file('image')->store('gallery', 'public');

            // delete old image
            \Storage::disk('public')->delete($gallery->image);

            // update post with new image
            $gallery->update([
                'title' => $request->title,
                'image' => $image
            ]);
        }else{
            // update post without image
            $gallery->update([
                'title' => $request->title
            ]);
        }

        // redirect with success message
        return response()->json([
            'message' => 'gallery updated successfully',
            'data' => $gallery
        ], 200);
    }
}
