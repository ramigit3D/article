<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use \Sentinel;
use \Redirect;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class ArticlesController extends Controller
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
		/**
	 * Show the page to create a new article
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = Tag::lists('name' , 'id');
		return view('admin.articles.create', compact('tags'));
	}
	/**
	 * Save a new article
	 *
	 * @param CreateArticleRequest $request
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$this->createArticle($request);
		//flash()->success('Your article has been created!');
		\Session::flash('flash_message', 'Your article has been created ! ');
		return  Redirect::to('articles');
	}
	
	/**
	 * Edit an existing article
	 *
	 * @param  integer $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		$tags = Tag::lists('name' , 'id');
		return view('admin.articles.edit', compact('article' , 'tags'));
	}
	/**
	 * update an existing article
	 *
	 * @param  integer $id
	 * @param  ArticleRequest $request
	 * @return Response
	 */
	public function update($id, ArticleRequest $request)
	{
		$articleCredentials = [
            'title' => strtolower($request->get('title')),
            'lang' => $request->get('lang'),
            'body' => $request->get('body'),
            'published_at' => $request->get('published_at'),
            
        ];
        $article = Article::findOrFail($id);
		$article->update($articleCredentials);
		$tags = (array) $request->input('tag_list'); 
		
		if (count($tags))
		{
			$this->syncTags($article, $tags);
		}
		else 
		{
			$this->syncTags($article, []);
		}
		\Session::flash('flash_message', 'Your article has been updated ! ');
		return redirect('articles');
	}
	
	/**
	 * Delete an existing article
	 *
	 * @param  integer $id
	 * @return Response
	 */
	
    public function destroy($id) 
    {
        $article = Article::findOrFail($id);
        $article->delete();
    }
    
	/**
	 * Sync up the list of tags in the database
	 *
	 * @param  Article $article
	 * @param  array   $tags
	 */
	private function syncTags(Article $article, array $tags)
	{
	
		$article->tags()->sync($tags);
	}
	/**
	 * Save a new article
	 * @param  ArticleRequest $request
	 * @return mixed
	 */
	
	
    private function createArticle(ArticleRequest $request)
    {
        $user=Sentinel::getUser();
         $articleCredentials = [
            'title' => strtolower($request->get('title')),
            'user_id' =>$user->id,
            'lang' => $request->get('lang'),
            'body' => $request->get('body'),
            'published_at' => $request->get('published_at'),
            
        ];
        
        
        $article = Article::create($articleCredentials);
        $tags = (array) $request->input('tag_list'); 
        
        if (count($tags))
        {
            $this->syncTags($article, $tags);
        }
        return $article;
    }

}
