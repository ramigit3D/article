<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
   
    
    /**
     * Route related to static pages
     */
    Route::get('/', 'HomeController@index');
    
    Route::get('/language/{locale}', ['as' => 'language', function ($locale) {
       
        \Session::put('locale', $locale);
         
		return redirect("/");
    }]);
    /**
     * Account related routes
     */
    Route::get('/account', 'PagesController@account');
    
    Route::get('/account/edit', 'PagesController@accountEdit');
    
    Route::get('/account/password', 'PagesController@accountPassword');
    
    
    Route::get('/admin/index', 'AdminController@index');
    
    /**
     * User related routes
     */
    Route::resource('user', 'UsersController');
    
    /**
     * Role related routes
     */
    Route::resource('role', 'RolesController');
    
    /**
     * Articles related routes
     */
    Route::resource('articles', 'ArticlesController');
    
   
    
    /**
     * Session related routes
     */
     
    Route::get('/login', 'SessionsController@create');
    
    Route::post('/login', 'SessionsController@store');
    
    Route::get('/logout', 'SessionsController@destroy');
    
    /**
     * User related routes
     */
    
    Route::get('/register', 'UsersController@create');
    
    Route::post('/register', 'UsersController@store');
    
    

});
