<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commandes;

class CommandesController extends Controller
{
    public function index()
    {
      $commandes = Commandes::All();
      return response()->json($commandes, 200);
    }

    public function addCommande(Request $request)
    {
      $string = strtoupper(str_random(3)) . random_int(1000000,9999999);
      // return $string;
      return response()->json($string, 200);
    }

    public function dropCommande($id)
    {
      $commande = Commandes::find($id);
      if(is_null($commande)){
        return 0;
      }else{
        $commande->delete();
        return 1;
      }
    }
}
