<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
        'user_id', 'content','annonce_id'
    ];
    public function annonces(){

    	return $this->belongsTo('App/Annonce');
    }
    public function user(){

    	return $this->belongsTo('App\User', 'user_id');
    }
}
