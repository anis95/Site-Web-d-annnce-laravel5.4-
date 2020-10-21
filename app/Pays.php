<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = [
        'name'
    ];
    public function regions(){

    	return $this->hasMany('App\Region');
    }
}
