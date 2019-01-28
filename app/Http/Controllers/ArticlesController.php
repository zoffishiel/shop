<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
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
      $rules = [
        "titre" => ["required", "string", "max:255"],
        "image" => ["required", "mimetypes:image/png,image/jpeg"],
        "body" => ["required", "string"],
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        return response()->json($validator->errors(), 200);
      }else{
        $image = $request->file("image");
        $path = $image->store("img", ["disk" => "images"]);
        $article = new Articles();
        $article->titre = $request->input("titre");
        $article->image = "/".$path;
        $article->body = $request->input("body");
        $article->publier = $request->input("publier");
        $article->date = date("d-M-Y");
        $res = $article->save();
        return response()->json($res, 200);
      }
    }

    // Update Article
    public function updateArticle(Request $request)
    {
      $article = Articles::find($request->input("id"));
      if(is_null($article)){
        return response("Article non trouver");
      }else{
        $rules = [
          "titre" => ["string", "max:255"],
          "body" => ["string"],
          "image" => ["mimetypes:image/jpeg,image/png"],
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
          return response()->json($validator->errors(), 200);
        }else{
          $res = $article->update($request->except("id"));
          return $res ? response("L'article est modifier", 200) : response("Erreur de modification", 200);
        }
      }
    }

    // Delete Article
    public function dropArticle(Request $request)
    {
      $article = Articles::find($request->input("ids"));

    }
}
