<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
      'cid',
      'titre',
      'description',
      'image',
      'video',
      'prix_general',
      'prix_vente',
      'qte'
    ];
    public $timestamps = false;

    public function images(){
      return $this->hasMany('App\Images', 'pid');
    }
}
