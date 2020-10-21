<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Annonce extends Model
{
     protected $fillable = [
        'title', 'short_desc' ,'description' ,'date_debut' ,'date_fin','category_id','region_id' , 'user_id', 'num_tel', 'latitude', 'longitude','lieu','prix'
    ];
  public function regions(){

  	return $this->belongsTo('App\Region');
  }

  public function user(){

    return $this->belongsTo('App\User', 'user_id');
  }
   public function categories(){

  	return $this->belongsTo('App\Category','category_id');
  }
  public function comments(){

    	return $this->hasMany('App\Comment');
    }
    // public function images(){

    //   return $this->hasMany('App\Image');
    // }
    
    public function images(){

      return $this->belongsToMany('App\Image', 'annonce_images');
    }
}

