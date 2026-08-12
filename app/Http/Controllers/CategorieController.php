<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
{

    public function create()
    {
    	$categorias = Categorie::all();
		return view('serve.categorie.create', compact('categorias'));
    }

    public function store(Request $request)
    {
    	$categorie = new Categorie();
    	$categorie->tipo =$request->input('tipo');
    	$categorie->save();
    	return redirect('/cat/create');
    }
    public function destroy(Categorie $categorie )
    {	
    	$categorie->delete();
    	return redirect('/cat/create');
    }
}
