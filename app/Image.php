<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'originalname','type','annonce_id'
    ];
    public function users(){

    	return $this->belongsTo('App\User');
    }
    public function annonce(){

      return $this->belongsTo('App/Annonce');
    }
}
