<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = "tracking";
    protected $fillable = [
      'commande',
      'status'
    ];
    public $timestamps = false;
}
