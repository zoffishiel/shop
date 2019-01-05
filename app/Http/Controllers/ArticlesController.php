<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request
use App\Articles;

class ArticlesController extends Controller
{
    public function index()
    {
      $articles = Articles::All();
      return response()->json($articles, 200);
    }

    // Get Article
    public function getArticle($id)
    {
      $article = Articles::find($id);
      return response()->json($article, 200);
    }

    // Add Article
    public function addArticle(Request $request)
    {
      $res = Articles::create($request->all());
      return response()->json($res, 200);
    }

    // Update Article
    public function updateArticle(Request $request)
    {
      $article = Articles::find($request->input("id"));
      if(is_null($article)){
        return 0;
      }else{
        $article->update($request->all());
        return 1;
      }
    }

    // Delete Article
    public function dropArticle($id)
    {
      $article = Articles::find($id);
      $res =  $article->delete();
      return $res;
    }
}
