<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ Newsletter;
use App\ Annonce;
use Illuminate\Support\Facades\Mail;
class ControllerSubscribe extends Controller
{
    public function EnvoyerMessage()
	{
    $annonce= Annonce::take('2')->get();

    return view('admin.EnvoyeSubscribe',compact('annonce'));
    }

     public function SelectSubscribe()
	{
    $newsletter= Newsletter::all();

    return view('admin.AdminSubscribe',compact('newsletter'));
    }

    
 public function destroy($id)
{
	$newsletter= Newsletter:: findorfail($id) ;
    $newsletter->delete();
    
   

    return back();
}

}
