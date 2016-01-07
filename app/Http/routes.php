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
    //Sentinel::disableCheckpoints();
    
    
   /**
     * Route related to static pages
     */
    Route::get('/', 'HomeController@index');
    
    Route::get('/account', 'PagesController@account');
    
    Route::get('/admin/index', 'AdminController@index');
    
    Route::resource('user', 'UserController');
    
    Route::resource('role', 'RoleController');
    
    Route::get('/account/edit', 'PagesController@accountEdit');
    
    Route::get('/account/password', 'PagesController@accountPassword');
    /**
     * Session related routes
     */
     
    Route::get('/login', 'SessionController@create');
    
    Route::post('/login', 'SessionController@store');
    
    Route::get('/logout', 'SessionController@destroy');
    
    /**
     * User related routes
     */
    
    Route::get('/register', 'UserController@create');
    
    Route::post('/register', 'UserController@store');
    
    

});
