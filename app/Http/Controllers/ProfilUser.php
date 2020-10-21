<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Annonce;
use App\Message;
class ProfilUser extends Controller
{
      public function viewprofil($id)
    {
    	$user =User::findOrFail($id);
    	$annonces=Annonce::where('user_id','=',"$user->id")->get();

     	return view('MaProfil',compact('user','annonces'));
    }

     public function Reponse(){
    $message =Message::whereIduserreponse(auth()->user()->id)->get();
    
      return view('/Message' ,compact('message'));
}   

public function destroy($id)

{
	$msg = Message:: findorfail($id) ;
    $msg->delete();
    
   

    return back();
}

}
