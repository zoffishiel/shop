<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $fillable = [
      'vendeur',
      'produit'
    ];
    public $timestamps = false;
}
