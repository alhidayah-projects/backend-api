<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Yayasan;

class LandingController extends Controller
{
    /**get 4 data article and 8 data gallery*/
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        $galleries = Gallery::orderBy('created_at', 'desc')->take(8)->get('image');

        return response()->json([
            'message' => 'success get data',
            'articles' => $articles,
            'galleries' => $galleries
        ], 200);

        return response([
            'message' => 'failed get data'
        ], 200);
    }

    /**get no_telp in yayasan */
    public function getNoTelp()
    {
        $no_telp = Yayasan::select('no_telp')->first();

        return response()->json([
            'message' => 'success get data',
            'no_telp' => $no_telp
        ], 200);

        return response([
            'message' => 'failed get data'
        ], 200);
    }

    /**get akte_notaris, sk_kota, sk_provinsi, npwp, profil_yayasan in yayasan */
    public function getAbout()
    {
        $about = Yayasan::select('akte_notaris', 'kemenkumham', 'sk_kota', 'sk_provinsi', 'npwp', 'profil_yayasan')->first();

        return response()->json([
            'message' => 'success get data',
            'about' => $about
        ], 200);

        return response([
            'message' => 'failed get data'
        ], 200);
    }

}