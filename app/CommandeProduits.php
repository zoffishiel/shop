<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandeProduits extends Model
{
    protected $fillable = [
      'commande',
      'produit',
      'prix',
      'qte',
    ];

    public $timestamps = false;
}
