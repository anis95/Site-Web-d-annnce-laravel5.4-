<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use auth;
use App\Annonce;
use DB;
use App\Image;


class EssaiDeposer extends Controller
{
    public function deposer2($id){
    	//$user = Auth::User();
    //$condition = Annonce::where('user_id','=',"$user->id")->get();
       
         



    	if(Auth::check()){
        
        	$annonce =Annonce::findOrFail($id);

     	return view('deposerAnnonce')->with(['annonce' => $annonce]);
    }
    else
    {
    	return back();
    }
}


public function update(Request $request,$id){
	
              $this->validate($request, [
                  'title' => 'required|min:5|max:40',
                 'short_desc' =>'required|min:5|max:50',
                 'description' =>'required|min:5|max:1000',
                 'date_debut' =>'required',
                 'prix' =>'required',
                 'category_id' =>'required',
                 'region_id' =>'required',
                 'num_tel' =>'required',           
                 'lieu' =>'required',                      
                ]);
$annonce= Annonce:: findorfail($id) ; 

$annonce->update($request->all()); 

  $images = explode(',', $request->input('images'));
    foreach ($images as $image){
        if (Image::find($image)){
            $annonce->images()->attach($image);
        }
    }     
        

return view('AboutAnnonce')->with(['annonce' => $annonce]);



}




}
