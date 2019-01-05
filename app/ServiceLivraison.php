<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceLivraison extends Model
{
    protected $table = 'service_livraison';
    protected $fillable = [
      'nom',
      'prix_livraison',
      'prix_retour'
    ];
    public $timestamps = false;
}
