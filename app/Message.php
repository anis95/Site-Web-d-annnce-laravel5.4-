<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages" ;
    protected $fillable =['user_id' ,'content' ,'subject','IdUserReponse' ];
     public function user(){

    	return $this->belongsTo('App\User','user_id');
    }
}
