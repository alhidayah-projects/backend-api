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
    /**Count Donate Data */
    public function countDonasi(Request $request){

        $donate = DB::table('donates')->count();

        // if not found
        if ($donate == null) {
            return response([
                'message' => 'Donate not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Donate retrieved successfully',
            'data' => $donate
        ], 200);
    }

    /**Count Total All Donate */
    public function countTotalDonate(Request $request){

        $donate = DB::table('donates')->sum('nominal');

               // if not found
               if ($donate == null) {
                return response([
                    'message' => 'Donate not found'
                ], 200);
            }
            return response()->json([
                'message' => 'Total Donates',
                'data' =>  'IDR.'. $donate 
            ], 200);
    }

    /**Count Article Data */
    public function countArticle(Request $request){

        $article = DB::table('articles')->count();
        
         // if not found
         if ($article == null) {
            return response([
                'message' => 'Article not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Article count successfully',
            'data' => $article
        ], 200);
    }

    /**Count Anak Data  */
    public function countAnak(Request $request){
        $anak = DB::table('anak')->count();

         // if not found
         if ($anak == null) {
            return response([
                'message' => 'Anak not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Anak count successfully',
            'data' => $anak
        ], 200);
    }

    /**Count Anak By Anak Yatim*/
    public function countAnakYatim(){

        $anak = DB::table('anak')->where('status','Yatim')->count();

           // if not found
           if ($anak == null) {
            return response([
                'message' => 'Anak not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Anak yatim count successfully',
            'data' => $anak
        ], 200);
    }

      /**Count Anak By Anak Piatu*/
      public function countAnakPiatu(){

        $anak = DB::table('anak')->where('status','Piatu')->count();

           // if not found
           if ($anak == null) {
            return response([
                'message' => 'Anak not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Anak piatu count successfully',
            'data' => $anak
        ], 200);
    }

      /**Count Anak By Anak Yatim Piatu*/
      public function countAnakYp(){

        $anak = DB::table('anak')->where('status','YP')->count();

           // if not found
           if ($anak == null) {
            return response([
                'message' => 'Anak not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Anak yatim piatu count by status successfully',
            'data' => $anak
        ], 200);
    }

    /**Count Anak By Anak Tidak Mampu*/
    public function countAnakTm(){

        $anak = DB::table('anak')->where('status','TM')->count();

           // if not found
           if ($anak == null) {
            return response([
                'message' => 'Anak not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Anak tidak mampu count by status successfully',
            'data' => $anak
        ], 200);
    }

    /**Gallery Count */
    public function countGallery(){
        $gallery = DB::table('galleries')->count();

        // if not found
        if($gallery == null){
            return response([
                'message' => 'Gallery not founds'
            ], 200);
        }
        return response()->json([
                'message' => 'Gallery count successfully',
                'data'    => $gallery
        ], 200);
    }

}
