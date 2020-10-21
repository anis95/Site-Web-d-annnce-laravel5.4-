<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function comments(){

        return $this->hasMany('App\Comment');
    }
    public function images(){

        return $this->belongsTo('App\Image');
    }
   
    public function messages(){

        return $this->belongsToMany('App\Message');
    }
    public function annonces(){

    return $this->hasMany('App\Annonce');
  }
}
