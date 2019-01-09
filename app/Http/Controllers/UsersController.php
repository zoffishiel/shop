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
      $users = User::All();
      return response()->json($users, 200);
    }

    public function getCollections()
    {
      return response()->json(Auth::user()->collections());
    }

    public function dropUser($id)
    {
      $user = User::find($id)->delete();
      return $user ? 1 : 0;
    }

}
