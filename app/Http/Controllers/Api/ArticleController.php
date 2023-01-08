<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**Created Article */
    public function createArticle(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'author_id' => 'required'
        ]);

        $article=Article::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'desc' => $request->desc,
            // image should be stored in storage/app/public
            'image' => $request->file('image')->store('article', 'public'),
            //'slug' => \Str::slug($request->title)
        ]);

        return response()->json([
            'message' => 'article created successfully',
            'data' => $article
        ], 201);

    }

    public function getAllArticle(){
      
        // join table
        $article = Article::join('users', 'users.id', '=', 'articles.author_id')
        ->select('articles.*', 'users.name as author')
        ->paginate(10);


        // if not found data
        if($article->isEmpty()){
            return response([
                'message' => 'article not found',
                'data' => $article
            ], 200);
        }

        return response()->json([
            'message' => 'article retrieved successfully',
            'data' => $article
        ] , 200);

    }

    /**Get Article By Id */
    public function getArticleById($id)
    {
        $article = Article::join('users', 'users.id', '=', 'articles.author_id')
        ->select('articles.*', 'users.name as author')
        ->where('articles.id', $id)
        ->first();

        // if empty data
        if($article == null){
            return response([
                'message' => 'article not found',
                'data' => $article
            ], 200);
        }

        return response()->json([
            'message' => 'article retrieved successfully',
            'data' => $article
        ], 200);
        
    }

    /**Update Article */
    public function updateArticle(Request $request, $id){

         // only admin can create new article
         if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not update article',
                'data' => $article
            ], 403);
        }
        $article = Article::find($id);

        // Validate form
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // check if image is uploaded
        if($request->hasFile('image')){
            // image should be stored in storage/app/public
            $image = $request->file('image')->store('article', 'public');

            // delete old image
            \Storage::disk('public')->delete($article->image);

            // update post with new image
            $article->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $image
            ]);
        }else{
            // update post without image
            $article->update([
                'title' => $request->title,
                'desc' => $request->desc
            ]);
        }

        // redirect with success message
        return response()->json([
            'message' => 'article updated successfully',
            'data' => $article
        ], 200);

    }

    
    /**Delete Article By Id**/
    public function deleteArticle($id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete article'
            ], 403);
        }

        $article = Article::find($id);

        // if empty data
        if($article == null){
            return response ([
                'message' => 'article not found',
                'data' => $article
            ], 200);
        }
        // delete image in public/storage/article
        \Storage::disk('public')->delete($article->image);
        $article->delete();

        return response ([
            'message' => 'article deleted successfully',
            'data' => $article
        ], 200);
    }

    /**Delete All Article */
    public function deleteAllArticle(){

        $article = Article::all();
        // only admin can create new article
        if (Auth::user()->role != 'admin') {
            return response ([
                'message' => 'you are not admin, you can not delete all article',
                'data' => $article
            ], 403);
        }
        // if empty data
        if($article->isEmpty()){
            return response ([
                'message' => 'article not found',
                'data' => $article
            ], 200);
        }

        // delete image in public/storage/article
        foreach($article as $a){
            \Storage::disk('public')->delete($a->image);
        }
        $article->each->delete();

        return response ([
            'message' => 'all article deleted successfully',
            'data' => $article
        ], 200);
    }
}
