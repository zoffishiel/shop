<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
      'pid',
      'path'
    ];
    public $timestamps = false;
}
