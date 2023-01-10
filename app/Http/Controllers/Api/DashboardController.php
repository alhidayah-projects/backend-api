<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\Article;
use App\Models\Gallery;
use DB;

class DashboardController extends Controller
{
    /**Count All Data */
    public function countData(Request $request){

        $donate = DB::table('donates')->count();
        $totaldonate = DB::table('donates')->sum('nominal');
        $article = DB::table('articles')->count();
        $anak = DB::table('anak')->count();
        $anakyatim = DB::table('anak')->where('status','Yatim')->count();
        $anakpiatu = DB::table('anak')->where('status','Piatu')->count();
        $anakyp = DB::table('anak')->where('status','YP')->count();
        $anaktm = DB::table('anak')->where('status','TM')->count();
        $gallery = DB::table('galleries')->count();
        $pengurus = DB::table('pengurus')->count();
        $contact = DB::table('contacts')->count();
        $contact = DB::table('contacts')->where('is_read','yes')->count();
        $contact = DB::table('contacts')->where('is_read','no')->count();


        return response()->json([
            'message' => 'Donate retrieved successfully',
            'data' => [
                "article" => $article,
                "gallery" => $gallery,
                'pengurus' => $pengurus,
                "anak"    => [
                    'total_anak'=> $anak,
                    'anak_yatim'=> $anakyatim,
                    'anak_piatu'=> $anakpiatu,
                    'anak_yp'   => $anakyp,
                    'anak_tm'   => $anaktm
                ],
                "donasi" => [
                    'donate'=> $donate,
                    'total' => $totaldonate,
                ],
                "contact" => [
                    'total' => $contact,
                    'read'  => $contact,
                    'unread'=> $contact,
                ],
            ]
        ], 200);
    }
}
