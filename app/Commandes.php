<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    protected $primaryKey = 'serie';

    protected $fillable = [
      'serie',
      'status',
      'vendeur',
      'date',
      'prix',
      'qte',
      'service',
      'adresse',
      'ville',
      'tel',
      'nom_client',
      'commentaire'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function produits()
    {
      $this->hasMany("App\CommandeProduits", 'commande');
    }
}
