<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use auth;
use App\Http\Controllers\Validator;
use App\Annonce;
use App\Image;
class resultaformulaire extends Controller
{
     public function ajouterannonce(request $request){
              $this->validate($request, [
                  'title' => 'required|min:5|max:40',
                 'short_desc' =>'required|min:5|max:50',
                 'description' =>'required|min:5|max:1000',
                 'date_debut' =>'required|',
                 'prix' =>'required',
                 'category_id' =>'required',
                 'region_id' =>'required',
                 'num_tel' =>'required',           
                 'lieu' =>'required',                      
                ]);
    
   $annonce = Annonce::create($request->all());

    
   $images = explode(',', $request->input('images'));
    foreach ($images as $image){
        if (Image::find($image)){
            $annonce->images()->attach($image);
        }
    }     
  return redirect('/');
           
}


}