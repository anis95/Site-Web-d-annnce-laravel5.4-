<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use App\Image;
use Illuminate\Support\Facades\Redirect;

class ItemsController extends Controller
{
 public function destroy($id)
{
	$annonce= Annonce:: findorfail($id) ;
    $annonce->delete();
    
   

    return redirect('/');
}


}
