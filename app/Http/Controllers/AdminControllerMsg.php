<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Comment;
use  App\Annonce;
use  App\User;
use Illuminate\Support\Facades\Session;
class AdminControllerMsg extends Controller
{
    public function message(){
    $msg =Message::all();
    
      return view('admin.MsgAdmin' ,compact('msg'));
}   
   
public function destroy($id)

{
	$msg = Message:: findorfail($id) ;
    $msg->delete();
    
   

    return back();
}

  public function sendReponse(Request $request)
    {
        Message::create($request->all());
        //Session::make('message', "Message envoyée");
          Session::flash('flash_reponse', 'Messages envoyé avec succées!');
        return back();
    }


  public function comment(){
    $comment = Comment::all();
      return view('admin.Comment' ,compact('comment'));
}   

   

}
