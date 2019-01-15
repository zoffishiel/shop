<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Commandes;
use View;

class CommandesController extends Controller
{
    public function CommandesView()
    {
      $clients = \App\Clients::where("vendeur", Auth::user()->id)->get();
      $collection = \App\Collections::where('vendeur', Auth::user()->id)->get();
      $produits = \App\Products::All();
      return View::make('dashboard.ajouter_commande', compact('clients', 'collection', 'produits'));

    }
    public function index()
    {
      if(!Auth::check()){
        return response("Unauthorized Access", 401);
      }

      if(Auth::user()->role == "admin")
      {
        $commandes = Commandes::All();
        return response()->json($commandes, 200);

      }elseif(Auth::user()->role == "vendeur"){
        return response()->json(Auth::user()->commandes());

      }elseif(Auth::user()->role == "livreur"){
        $commandes = Commandes::where("ville", Auth::user()->ville);
        return response()->json($commandes, 200);

      }else{
        return response("Unauthorized Access", 401);
      }
    }

    public function getCommande($id)
    {
      $commande = Commandes::find($id);
      return response()->json($commande, 200);
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

    // public function dropCommande(Request $request)
    // {
    //   $commande = Commandes::find($request->all());
    //   if(is_null($commande)){
    //     return 0;
    //   }else{
    //     $commande->delete();
    //     return 1;
    //   }
    // }

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
