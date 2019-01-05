<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::All();
        return response()->json($categories, 200);
    }

    // Get Category
    public function getCategory($id)
    {
      $category = Categories::find($id);
      return response()->json($category, 200);
    }

    // Add Category
    public function addCategory(Request $request)
    {
      $res = Categories::create($request->all());
      return response()->json($res, 200);
    }

    // Update Category
    public function updateCategory(Request $request)
    {
      $category = Categories::find($request->input('id'));
      if(is_null($category)){
        return 0;
      }else{
        $category->update($request->all());
        return 1;
      }
    }

    // Delete Category
    public function dropCategory($id)
    {
      $category = Categories::find($id);
      if(is_null($category)){
        return 0;
      }else{
        $category->delete();
        return 1;
      }
    }
}
