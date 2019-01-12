<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
      'nom'
    ];

    public $timestamps = false;

    public function products(){
      return $this->hasMany('App\Products', 'cid');
    }
}
