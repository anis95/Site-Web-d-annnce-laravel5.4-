<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name', 'pays_id'
    ];

    public function pays()
    {
    	return $this->belongsTo('App\Pays');
    }
    public function annonces(){

    	return $this->hasMany('App\Annonce');
    }
}
