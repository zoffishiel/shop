<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // protected $table = "utilisateurs";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'email', 'password', 'tel', 'ville', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function collections()
    {
      return $this->hasMany('App\Collections', 'vendeur');
    }

    public function commandes()
    {
      return $this->hasMany('App\Commandes', 'vendeur');
    }

    public function clients()
    {
      return $this->hasMany('App\Clients', 'vendeur');
    }
}
