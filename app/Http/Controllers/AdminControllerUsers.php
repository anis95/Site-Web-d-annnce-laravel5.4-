<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Annonce;

class AdminControllerUsers extends Controller
{
 public function SelectUser(){
$user =User::all();

        return view('admin.AllUsers' ,compact('user'));
}   

public function ViewUser(){

$user = User::all();
$res = Annonce::where('user_id','=',"$user->id")->get();  
$resnbre = Annonce::where('user_id','=',"$user->id")->count(); 
$nom = $user->name;
 return view('MesAnnonces',compact('res','resnbre','nom')); 



}
  public function destroy($id)

{
	$user = User:: findorfail($id) ;
    $user->delete();
    
   

    return back();
}

}
