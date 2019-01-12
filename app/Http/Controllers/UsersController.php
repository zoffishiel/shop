<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

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
      return response()->json(Auth::user()->collections());
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
        return response("Infos Updated", 200);
      }else{
        return response("Error Updating infos", 200);
      }
    }

}
