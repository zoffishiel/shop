<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Commandes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'serie' => $this->serie,
          'vendeur' => \App\User::find($this->vendeur)->get(["nom"])->first()->nom,
          'date' => $this->date,
          'prix' => $this->prix,
          'service' => \App\ServiceLivraison::find($this->service)->get(["nom"])->first()->nom,
          'adresse' => $this->adresse,
          'ville' => $this->ville,
          'tel' => $this->tel,
          'statut' => $this->statut,
          'nom_client' => $this->nom_client,
          'commantaire' => $this->commantaire,
        ];
    }
}
