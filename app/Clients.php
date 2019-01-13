<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
      'vendeur',
      'nom',
      'ville',
      'adresse',
      'tel',
    ];

    public $timestamps = false;
}
