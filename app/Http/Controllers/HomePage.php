<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
class HomePage extends Controller
{
   
public function home(){

	$annonces = Annonce::all();
	return view('index', compact("annonces"));
}

public function immobilier(){

	$annonces = Annonce::all();
	return view('Immobilier', compact("annonces"));
}

public function location(){
$annonces = Annonce::whereCategoryId('1')->get();;
	return view('/locationpage', compact("annonces"));

}

public function collocation(){
$annonces = Annonce::whereCategoryId('3')->get();
	return view('/collocation', compact("annonces"));

}

public function souslocation(){
$annonces = Annonce::whereCategoryId('2')->get();
	return view('/sous-location', compact("annonces"));

}

public function echange(){
$annonces = Annonce::whereCategoryId('4')->get();
	return view('/echange', compact("annonces"));

}

public function delete($id) {
//$image= Image:: findorfail($id) ;

$annonce= Annonce:: findorfail($id) ; 

//$image->delete();
$annonce->delete();

return view('index');
}
 }

