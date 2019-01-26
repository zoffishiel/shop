<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Products;
use App\Images;
use Validator;
use View;

class ProductsController extends Controller
{
    public function index()
    {
      if(Auth::user()->role == "admin"){
        $products = Products::All();
        return response()->json($products, 200);
      }else{
        $products = Products::paginate();
        return $products;
        return response("Acces non autoriser", 401);
      }
    }

    public function paginate()
    {
      if(Auth::user()->role == "admin"){
        return view('dashboard.produits');
      }else{
        $products = Products::paginate();
        return View::make('dashboard.produits', compact('products'));
      }
    }

    public function addPage()
    {
      $categories = \App\Categories::All();
      return View::make('dashboard.addproduits', compact('categories'));
    }

    public function getProduct($id)
    {
      $product = Products::find($id);
      return View::make("dashboard.details_produit", compact("product"));

    }

    public function addProduct(Request $request){
      $rules = [
        'cid' => ['required', 'numeric'],
        'titre' => ['required', 'string', 'max:200'],
        'description' => ['string'],
        'main_image' => ['required', 'mimetypes:image/jpeg,image/png,image/jpg'],
        'video' => ['string', 'max:255'],
        'prix_general' => ['required', 'numeric', 'between:0,10000.0'],
        'prix_vente' => ['required', 'numeric', 'between:0,10000.0'],
        'qte' => ['required', 'numeric', 'min:1'],
      ];

      $validator = Validator::make($request->except("images"), $rules);
      if($validator->fails()){
        return response()->json($validator->errors(), 200);
      }else{
        $path = $request->file('main_image')->store('img', ['disk' => 'images']);
        $request['image'] = $path;
        $product = Products::create($request->except(['images', 'main_image']));
        if($product){
          if(!empty($request->file('images'))){
            $paths = [];
            foreach ($request->file('images') as $image) {
              Images::create(['pid' => $product['id'], 'path' => $image->store('img', ['disk' => 'images'])]);
            }
          }
          return redirect('/dashboard/produits');
        }else{
          return 0;
        }
      }

    }

    public function dropProduct(Request $request){
      $product = Products::whereIn('id', $request->input('ids'))->delete();
      return $product ? 1 : 0;
    }

    public function tempImage(Request $request){
      $file = $request->file('image');
      $image = $file->store('tmp', ['disk' => 'temp']);
      return $image;
    }
}
