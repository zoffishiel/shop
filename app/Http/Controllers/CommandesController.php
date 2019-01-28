<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Collections as CollectionResource;
use App\Http\Resources\Commandes as CommandesResource;
use App\Commandes;
use App\CommandeProduits;
use View;

class CommandesController extends Controller
{
    public function CommandesView()
    {
      $clients = \App\Clients::where("vendeur", Auth::user()->id)->get();
      $collections = CollectionResource::collection(\App\Collections::where('vendeur', Auth::user()->id)->get());
      $produits = \App\Products::All();
      return View::make('dashboard.ajouter_commande', compact('clients', 'collections', 'produits'));

    }
    public function index()
    {
      if(!Auth::check()){
        return response("Unauthorized Access", 401);
      }

      if(Auth::user()->role == "admin")
      {
        $commandes = CommandesResource::collection(Commandes::All());
        return $commandes;

      }elseif(Auth::user()->role == "vendeur"){
        return response()->json(Auth::user()->commandes()->get(), 200);

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
        'vendeur' => ['required'],
        'prix' => 'required',
        'service' => 'string',
        'adresse' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:100'],
        'tel' => ['required', 'string', 'max:13'],
        'nom_client' => ['required', 'string', 'max:100'],
        'commentaire' => 'string',
      ];
      $request["vendeur"] = Auth::user()->id;
      $validator = Validator::make($request->except("products"), $rules);
      if($validator->fails()){
        return response()->json($validator->errors(), 200);
      }else{
        $commande = Commandes::create($request->except("products"));
        foreach($request->input("products") as $product){
          $cp = new CommandeProduits();
          $cp->produit = $product["id"];
          $cp->commande = $request->input("serie");
          $cp->prix = $product["prix_vente"];
          $cp->qte = $product["qte"];
          $cp->save();
        }
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
        $track = \App\Tracking::create(["commande" => $id, "status" => $status]);
        return 1;
      }
    }
}
