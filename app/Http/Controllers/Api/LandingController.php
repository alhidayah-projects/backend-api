<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Yayasan;
use App\Models\Donate;

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

    /**get motto, visi, misi, in yayasan */
    public function getVisiMisi()
    {
        $visi_misi = Yayasan::select('moto', 'visi', 'misi')->first();

        return response()->json([
            'message' => 'success get data',
            'visi_misi' => $visi_misi
        ], 200);

        return response([
            'message' => 'failed get data'
        ], 200);
    }


    /**search donate by donasi_id*/
    public function getDonate($donasi_id)
    {
        $donate = Donate::select('id', 'nama', 'status', 'nominal', 'created_at')
            ->where('donasi_id', $donasi_id)
            ->get();

        // if not found
        if ($donate->isEmpty()) {
            return response()->json([
                'message' => 'donasi_id not found'
            ], 404);
        }

        return response()->json([
            'message' => 'success get data',
            'donate' => $donate
        ], 200);
    }

    /**get alamat, telepon, instagram, email in yayasan */
    public function getContact()
    {
        $contact = Yayasan::select('alamat', 'no_telp', 'instagram', 'email')->first();

        return response()->json([
            'message' => 'success get data',
            'contact' => $contact
        ], 200);

        return response([
            'message' => 'failed get data'
        ], 200);
    }

    /**filter article by title*/
    public function searchArticle(Request $request)
    {
        $articles = Article::where('title', 'like', '%' . $request->title . '%')
            ->paginate(10); 

        // if not found
        if ($articles->isEmpty()) {
            return response()->json([
                'message' => 'title not found'
            ], 404);
        }

        return response()->json([
            'message' => 'success get data',
            'articles' => $articles
        ], 200);
    }
    
    /**filter gallery by title*/
    public function searchGallery(Request $request)
    {
        $galleries = Gallery::where('title', 'like', '%' . $request->title . '%')
            ->paginate(10); 

        // if not found
        if ($galleries->isEmpty()) {
            return response()->json([
                'message' => 'title not found'
            ], 404);
        }

        return response()->json([
            'message' => 'success get data',
            'galleries' => $galleries
        ], 200);
    }
}