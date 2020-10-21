<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use App\Category;
use App\User;
class AdminController extends Controller
{
	public function SelectAnnonce(){
$annonce = Annonce::all();

        return view('admin.AllAnnonces' ,compact('annonce'));
}

public function view($id){
$annonce =Annonce::findOrFail($id);

     	return view('AboutAnnonce')->with(['annonce' => $annonce]);
}

   public function destroy($id)
{
	$annonce= Annonce:: findorfail($id) ;
    $annonce->delete();
    
   

    return back();
}



}

