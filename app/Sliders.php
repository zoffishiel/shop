<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $fillable = [
      'image',
      'titre',
      'description',
      'lien'
    ];
    public $timestamps = false;
}
