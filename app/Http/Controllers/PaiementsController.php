<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Paiements;

class PaiementsController extends Controller
{
    public function index()
    {
      if(Auth::user()->role == 'admin'){
        $paiements = Paiements::All();
        return response()->json($paiements, 200);
      }else{
        return response("Acces non autoriser", 401);
      }
    }

    public function demande()
    {
      $user = [
        "utilisateur" => Auth::user()->id,
        "montant" => Auth::user()->actuel,
        "date" => date("d-M-Y");
      ];
      $res = Paiements::create($user);
      return $res ? 1 : 0;
    }

    public function accepter($demande)
    {
      if(Auth::user()->role == 'admin'){
        $paiement = Paiements::find($demande);
        $res = $paiement->update(["accepter" => "oui"]);
        return $res ? 1 : 0;
      }else{
        return response("Acces non autoriser", 401);
      }
    }

    public function refuser($demande)
    {
      if(Auth::user()->role == 'admin'){
        $paiement = Paiements::find($demande);
        $res = $paiement->update(["accepter" => "non"]);
        return $res ? 1 : 0;
      }else{
        return response("Acces non autoriser", 401);
      }
    }
}
