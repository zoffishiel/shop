<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\Collections as CollectionResource;
use App\User;
use View;

class UsersController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }
    public function index()
    {
      if(Auth::user()->role == "admin"){
        $users = User::All();
        return response()->json($users, 200);
      }else{
        return response("Unauthorized Access", 401);
      }
    }

    public function getUser($id)
    {
      if(Auth::user()->role == "admin"){
        $user = User::find($id);
        return response()->json($user, 200);
      }else{
        return response("Unauthorized Access", 401);
      }

    }

    public function getCollections()
    {
      $collection = CollectionResource::collection(Auth::user()->collections()->get());
      
      return View::make('dashboard.collections', compact("collection"));
    }

    public function addCollection($id)
    {
      $collection = new \App\Collections();
      $collection->vendeur = Auth::user()->id;
      $collection->produit = $id;
      $res = $collection->save();

      return $res ? 1 : 0;
    }

    public function dropUser(Request $request)
    {
      if(Auth::user()->role == "admin"){
        $user = User::whereIn('id', $request->input('ids'))->delete();
        return $user ? 1 : 0;
      }else{
        return response("Unauthorized Access", 401);
      }
    }

    public function updateInfos(Request $request)
    {
      $user = User::find(Auth::user()->id);
      $res = $user->update($request->all());
      if($res){
        return redirect("/dashboard/profile");
      }else{
        return response("Error Updating infos", 200);
      }
    }

}
