<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gallery;

class LandingController extends Controller
{
    // get 4 data article and 8 data gallery
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        // url image gallery
        $galleries = Gallery::orderBy('created_at', 'desc')->take(8)->get('image');

        return response()->json([
            'articles' => $articles,
            'galleries' => $galleries
        ], 200);
    }
}
