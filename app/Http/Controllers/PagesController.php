<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
    public function index(Request $request){
    	$price = 0;
    	$articles = $request->session()->get('articles');
    	if ($articles != null) {
    		$price = $this->price($articles);
    	}else{
    		$articles = array();
    	}
    	return view('pages.index', ['articles' => $articles, 'price' => $price]);
    }

    public function product($article){

    	if (($a = DB::table('articles')->where('id', $article)->first()) !== null) {
    		return view('pages.produit', ['article' => $a, 'id'  => $article]);
    	}else{
    		return redirect('/');
    	}	
    }

    private function price($liste){

    	$price = 0;
    	foreach ($liste as $l) {
    		$price = $price + ($l->price * $l->numberOfArticle);
    	}
    	return $price;
    }
}
