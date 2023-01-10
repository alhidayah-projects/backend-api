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

        // if not found
        if ($donate == null) {
            return response([
                'message' => 'Donate not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Donate retrieved successfully',
            'data' => [
                "article" => $article,
                "anak"    => [
                    'total_anak'=> $anak,
                    'anak_yatim'=> $anakyatim,
                    'anak_piatu'=> $anakpiatu,
                    'anak_yp'   => $anakyp,
                    'anak_tm'   => $anaktm
                ],
                "gallery" => $gallery,
                "donasi" => [
                    'donate'=> $donate,
                    'total' => $totaldonate,
                ]
            ]
        ], 200);
    }
}
