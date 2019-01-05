<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
      'titre',
      'description',
      'image',
      'video'
    ];
    public $timestamps = false;
}
