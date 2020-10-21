<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use auth;
use App\Annonce;
use DB;

class MaprofilController extends Controller
{
   public function showprofil()
    {
$user = Auth::User();
if ($user)
{
   
$annonces = Annonce::all();   
$res=Annonce::where('user_id','=',"$user->id")->get();  
$resnbre=Annonce::where('user_id','=',"$user->id")->count(); 
$nom=$user->name;    
     return view('MesAnnonces',compact('res','resnbre','nom','annonces'));
    }
//$annonce =Annonce::findOrFail($id);

}


}
