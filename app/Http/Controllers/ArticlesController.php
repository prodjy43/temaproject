<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function create(Request $request, $article){
    	$isInArray = false;
    	if ($request->session()->get('articles') !== null) {
    		for ($i = 0; $i < count($request->session()->get('articles')); $i++) {
    			if ($article == $request->session()->get('articles')[$i]->id) {
    				$request->session()->get('articles')[$i]->numberOfArticle = $request->session()->get('articles')[$i]->numberOfArticle + $request->input('numberOfArticle');
    				$isInArray = true;
    			}
    		}
    	}
    	if (!$isInArray) {
    		$aD = DB::table('articles')->where('id', $article)->first();
    		$aD->numberOfArticle = $request->input('numberOfArticle');
    		$request->session()->push('articles', $aD);
    	}

    	return redirect('/');
    }

    public function remove(Request $request, $article){
    	for ($i = 0; $i < count($request->session()->get('articles')); $i++) {
    		if ($article == $request->session()->get('articles')[$i]->id) {
				if (($request->session()->get('articles')[$i]->numberOfArticle = $request->session()->get('articles')[$i]->numberOfArticle - 1) == 0) {
					$request->session()->forget('articles.'.$i);
				}
			}
    	}
    	return redirect('/');
    }

    public function add(Request $request, $article){
    	for ($i = 0; $i < count($request->session()->get('articles')); $i++) {
    		if ($article == $request->session()->get('articles')[$i]->id) {
				$request->session()->get('articles')[$i]->numberOfArticle = $request->session()->get('articles')[$i]->numberOfArticle + 1;
			}
    	}
    	return redirect('/');
    }
}
