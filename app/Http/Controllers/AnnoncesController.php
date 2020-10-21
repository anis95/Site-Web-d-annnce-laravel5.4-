<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
class AnnoncesController extends Controller
{
    public function show($id)
    {
    	$annonce =Annonce::findOrFail($id);

     	return view('AboutAnnonce')->with(['annonce' => $annonce]);
    }
}
