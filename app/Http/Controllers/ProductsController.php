<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
      $products = Products::All();
      return response()->json($products, 200);
    }

    public function getProduct($id)
    {
      $product = Products::find($id);
      if(is_null($product)){
        return 0;
      }else{
        return response()->json($product, 200);
      }
    }

    public function addProduct(Request $request){
      $product = Products::create($request->all());
      return $product ? 1 : 0;
    }

    public function dropProduct($id){
      $product = Products::find($id);
      if(is_null($product)){
        return 0;
      }else{
        $product->delete();
        return 1;
      }
    }
}
