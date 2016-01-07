<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \Sentinel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('created_at')->get();
        
        if (Sentinel::hasAccess('admin'))
        {
        return view('admin.userlist', compact('users'));
        }
    }
    
     public function show($id)
    {
        if (Sentinel::hasAccess('admin'))
        {
        $user = Sentinel::findUserById($id);
        return view('admin.usershow', compact('user'));
        }
    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userCredentials = [
            'email' => strtolower($request->get('email')),
            'password' => $request->get('password'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
        ];
        
        $user = Sentinel::register($userCredentials, true);
        
        if ( $user )
        {
            return redirect('/login');
        }
        else
        {
            return view('/register')->withErrors("La création du nouveau utilisateur a échoué");;
        }
    }
    
    public function destroy($id)
	{
	    $user = Sentinel::findUserById($id);
	     if (Sentinel::hasAccess('admin'))
        {
    		
    			$user->delete();
    			
    	
    		
        }
	}

}
