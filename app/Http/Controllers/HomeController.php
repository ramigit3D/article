<?php

namespace App\Http\Controllers;

use \URL;
use \Sentinel;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
     public function index()
    {
        $choosenLang = \Session::get('locale');
        $articles = Article::where('lang', '=', $choosenLang)->get();
	    return view('index', compact('articles', $choosenLang));
           
    }
    
    
  
}
