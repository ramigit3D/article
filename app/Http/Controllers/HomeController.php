<?php

namespace App\Http\Controllers;

use \URL;
use \Sentinel;
use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
     public function index()
    {
        $choosenLang = \Session::get('locale');
        $tags = Tag::where('lang', '=', $choosenLang)->get();
        $articles = Article::where('lang', '=', $choosenLang)->paginate(2);
	    return view('index', compact('articles', 'tags'));
           
    }
    
    
    public function showarticle($id)
    {
        $choosenLang = \Session::get('locale');
        $tags = Tag::where('lang', '=', $choosenLang)->get();
        $article = Article::findOrFail($id);
        return view('showarticle', compact('article', 'tags'));
        
    }
    
     public function articlesbytag($id)
    {
        $choosenLang = \Session::get('locale');
        $tags = Tag::where('lang', '=', $choosenLang)->get();
        $tag= Tag::findOrFail($id);
        $articles = $tag->articles()->paginate(2);
	    return view('index', compact('articles', 'tags'));
           
    }
    
    
  
}
