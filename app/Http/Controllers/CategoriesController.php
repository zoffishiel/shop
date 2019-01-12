<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Categories;
use App\Http\Resources\Categories as CategoriesResource;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::All();
        return CategoriesResource::collection($categories);
    }

    // Get Category
    public function getCategory($id)
    {
      $products = Categories::find($id)->products();
      return response()->json($products, 200);
    }

    // Add Category
    public function addCategory(Request $request)
    {
      $rules = [
        "nom" => ["required", "string", "max:100"],
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        return 0;
      }else{
        $res = Categories::create($request->all());
        return 1;
      }

    }

    // Update Category
    public function updateCategory(Request $request)
    {
      $category = Categories::find($request->input('id'));
      if(is_null($category)){
        return response("Catégorie Introuvable");
      }else{
        $category->update($request->all());
        return response("Catégorie est modifié");
      }
    }

    // Delete Category
    public function dropCategory(Request $request)
    {
      $category = Categories::whereIn('id', $request->input('ids'))->delete();
      return $category ? 1 : 0;

    }
}
