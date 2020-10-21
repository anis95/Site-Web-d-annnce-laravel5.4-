<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use DB;


class SearchController extends Controller
{
    public function search(Request $request){
    	$annonces = Annonce::all();
    	$var=$request->input('search');
    	$res=Annonce::where('short_desc','LIKE' ,"%$var%")->get();
    	$resnbre=$res->count();
    	return view('result',compact('res','resnbre','annonces'));
    }



}

