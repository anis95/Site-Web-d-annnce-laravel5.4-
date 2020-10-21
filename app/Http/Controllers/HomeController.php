<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Message;
use App\Comment;
use App\Annonce;
use App\Newsletter;
use Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

     public function sendmessage(Request $request)
    {
        Message::create($request->all());
        //Session::make('message', "Message envoyée");
          Session::flash('flash_message', 'Messages envoyé avec succées!');
        return back() ;
    }

     public function postcomment(Request $request, $id)
    {
        $annonce =Annonce::findOrFail($id);
        Comment::create($request->all());
        //Session::make('message', "Message envoyée");
        Session::flash('flash_com', 'Commentaires Ajouter!');
      
        return redirect("aboutannonce/".$annonce->id."#comment");    
    }


    public function destroy($id)

{
    //dans page comment de l'admin
    $comment = Comment:: findorfail($id) ;
    $comment->delete();
    
   

    return back();
}
public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:newsletters,email'
        ]);
        if (!$validator->errors()->count()) {
            Session::flash('flash_mes', 'You are subscribed in our newsletters');
            Newsletter::create($request->all());
        }
        else
            Session::flash('alert_mes', $validator->errors()->first());
        return back();
    }
}


