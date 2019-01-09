<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\User;


class ProfileController extends Controller
{

    public function index()
    {
        return view('dashboard.profile');
    }

    // GET User Data
    public function getusr(){
      $id = 1;
      $user = User::find($id);

      return response()->json($user, 200);
    }

    public function UserProfile(){
      $id =  Auth::user()->id;
      $user = User::find($id);
      // return response()->json($id, 200);
     return View::make("dashboard.profile", compact("user"));

    }
    public function AddSocial(){
      return 0;
    }
    //select nom,email,tel,role,banque,rib,num_cpt,site,facebook,instagram from users;
}
