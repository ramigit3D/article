<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
	 * Show all articles
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$articles = Article::latest('published_at')->published()->get();
		return view('admin.articles.index', compact('articles'));
	}
	/**
	 * Show a single article
	 *
	 * @param Article $article
	 * @return  Response
	 */
	public function show($id)
	{
	    $article = Article::findOrFail($id);
		return view('admin.articles.show', compact('article'));
	}

}
