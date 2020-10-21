<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//homeRoutes
Route::group(['middleware' => 'web'], function() {
Route::get('/','HomePage@home');






Auth::routes();

Route::get('/home', 'HomeController@index');
//Route search
Route::get('/result',function(){
	return view('result');
});
Route::post('/search','SearchController@search');

//Route de formulaire 
Route::get('/deposer',["middleware"=>"auth" ,'uses' => function(){
	return view('deposerAnnonce');
}]);
Route::post('/affannnonce','resultaformulaire@ajouterannonce');

//route page location
Route::get('/location','HomePage@location');
//route page sous location

Route::get('/souslocation','HomePage@souslocation');
 
 //Route collocation
Route::get('/Collocation','HomePage@collocation');
//Route échange
Route::get('/echange','HomePage@echange');
// route Read More
Route::get('/aboutannonce/{id}', 'AnnoncesController@show');

//Enovoyé un message

Route::get('/SendMessage', ["middleware"=>"auth" ,'uses' =>'HomeController@sendmessage']);
//afficher mes annonces
Route::get('/MesAnnonces','MaprofilController@showprofil');
Route::get('/Maprofil/{id}','ProfilUser@viewprofil');

   

//modification d'un annonce

Route::get('/essaiDeposer/{id}', 'EssaiDeposer@deposer2');
Route::patch('/modifier/{id}', 'EssaiDeposer@update');

//ajouter un commantaire

Route::get('/PostComment/{id}',["middleware"=>"auth" ,'uses' => 'HomeController@postcomment']);

//les catégorie qui ne sont pas disponible


//Route Delete
Route::resource('AnnonceSupprimer', 'ItemsController');

//Route page Page immobilier
Route::get('/PageImmobilier','HomePage@immobilier');
// route news letter
Route::get('/subscribes',function(){
	return view('newsletter');
});

// page introuvable Restaurant
Route::get('/Restaurant',function(){
	 return abort(503);});

Route::get('/Education',function(){
	 return abort(503);});

Route::get('/LieudeCultes',function(){
	 return abort(503);});

Route::get('/ServiceAdministratif',function(){
	 return abort(503);});

Route::resource('/images', 'ImagesController', ['only' => [
    'index', 'show', 'store' ]]);


Route::post('/images/delete', 'ImagesController@imageDel');



Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('/Message','ProfilUser@Reponse');

Route::resource('SupprimerReponse', 'ProfilUser');

});




Route::post('/subscribe', ['as' => 'subscribe', 'uses' => 'HomeController@subscribe']);








Route::group(['middleware' => 'Admin'], function() {
Route::get('/admin',function(){
 return view('/admin.indexAdmin');
});
//route pour les annonces admin
Route::get('/LesAnnonces', 'AdminController@SelectAnnonce');
Route::get('/viewannonce/{id}','AdminController@view');
Route::resource('Supprimer', 'AdminController');
//route pour utilisateurs admin
Route::get('/Allutilisateurs','AdminControllerUsers@SelectUser');
Route::resource('SupprimerUser', 'AdminControllerUsers');
Route::get('/profiluser','AdminControllerUsers@ViewUser');
//route pour les msg 
Route::get('/MessageUtilisateur','AdminControllerMsg@message');
Route::resource('SupprimerMsg', 'AdminControllerMsg');
//route pour les commentaires
Route::get('/CommentUtilisateur','AdminControllerMsg@comment');
Route::resource('SupprimerComment', 'HomeController');

// page vierge subscribe
Route::get('/EnvoyeMessageSubscribe','ControllerSubscribe@EnvoyerMessage');

// gerer les catégorie 
//affichage
Route::get('/gerercategorie','AdminControllerCategorie@SelectCategorie');
//ajouter catégorie
Route::get('/CategorieAjouter','AdminControllerCategorie@store');
//supprimmer category
Route::resource('SupprimerCategory', 'AdminControllerCategorie');
//modifier categorie
Route::patch('/ModifierCategorie/{id}', 'AdminControllerCategorie@update');

//supprimer subscribers
Route::get('/AllSubscribers','ControllerSubscribe@SelectSubscribe');
Route::resource('SupprimerSubscriber','ControllerSubscribe');

//Répondre au utilisateur
Route::get('/ReponseEnvoye','AdminControllerMsg@sendReponse');

});