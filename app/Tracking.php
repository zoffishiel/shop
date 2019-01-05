<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = [
      'commande',
      'status'
    ];
    public $timestamps = false;
}
