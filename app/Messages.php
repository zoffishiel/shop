<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
      'adresse',
      'ville',
      'commentaire',
      'sujet',
      'date'
    ];
    public $timestamps = false;
}
