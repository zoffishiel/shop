<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    protected $primaryKey = 'serie';
    
    protected $fillable = [
      'serie',
      'status',
      'produit',
      'vendeur',
      'date',
      'qte',
      'service',
      'adresse',
      'ville',
      'tel',
      'nom_client',
      'commentaire'
    ];
    public $timestamps = false;
}
