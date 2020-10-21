<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
class AdminControllerCategorie extends Controller
{
	public function SelectCategorie(){

      $category = Category::all();
      return view('admin.GererCatagorie',compact('category'));


	}

	public function store(request $request){
        
		$category = Category::create($request->all());

      Session::flash('flash_success', 'catégorie ajouter avec succées!');
        return back() ;

	}

	public function destroy($id){

		 $category = Category:: findorfail($id) ;
         $category->delete();
         return back(); 

	}

	public function update(Request $request,$id){

           $category= Category:: findorfail($id); 

			$category->update($request->all()); 

			return back()->with(['category' =>  $category]);
	}

}
