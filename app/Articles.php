<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
      'titre',
      'body',
      'image',
      'date',
      'publier',
    ];
    public $timestamps = false;
}
