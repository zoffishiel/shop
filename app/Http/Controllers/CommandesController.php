<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
      $rules = [
        'serie' => ['bail', 'required', 'string', 'max:10', 'unique:commandes'],
        'produit' => ['required'],
        'vendeur' => ['required'],
        'date' => ['date'],
        'prix' => 'required',
        'qte' => 'required',
        'service' => 'string',
        'adresse' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:100'],
        'tel' => ['required', 'string', 'max:13'],
        'nom_client' => ['required', 'string', 'max:100'],
        'commantaire' => 'string',
      ];

      $string = strtoupper(str_random(10));
      $request['serie'] = $string;
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        return response()->json($validator->errors(), 200);
      }else{
        $commande = Commandes::create($request->all());
        return $commande ? 1 : 0;
      }
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

    public function updateStatus($id, $status)
    {
      $commande = Commandes::find($id);
      if(is_null($commande)){
        return 0;
      }else{
        $commande->statut = $status;
        $commande->save();
        return 1;
      }
    }
}
