<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    protected $fillable = [
      'utilisateur',
      'montant',
      'date',
      'accepter'
    ];

    public $timestamps = false;
}
