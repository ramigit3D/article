<?php

namespace App\Http\Controllers;

use \URL;
use \Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $email = $request->get('email');
            $password = $request->get('password');
            $remember = empty($request->get('remember')) ? false : true;
            
            $user = Sentinel::authenticate(array(
                'email'    => $email,
                'password' => $password,
            ), $remember);
            
            if ($user === false)
            {
                //user not authenticated
                return view('auth.login')->withErrors("Mauvaise combinaison de nom d'utilisateur/email et mot de passe");
            }
            else
            {
                //user is authenticated
                return redirect()->intended('/');
            }
        }
        catch (NotActivatedException $e)
        {
            $errors = 'Account is not activated!';
            return Redirect::to('reactivate')
                ->with('user', $e->getUser()) 
                ->withErrors ('Account is not activated!');
        }
        catch (ThrottlingException $e)
        {
            $delay = $e->getDelay();
            $errors = "Your account is blocked for {$delay} second(s).";
        }
        
        return Redirect::back()
        ->withInput()
        ->withErrors($errors);
    
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Sentinel::logout(null, true);
        return redirect('/');
    }
}
