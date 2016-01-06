<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Activations\EloquentActivation;
use Activation;
use Mail;
class AuthenController extends BaseController
{
    /**
    * Show the form for logging the user in.
    *
    * @return \Illuminate\View\View
    */
    public function login()
    {
        return View::make('auth.login');
    }
    /**
    * Handle posting of the form for logging the user in.
    *
    * @return \Illuminate\Http\RedirectResponse
    */
    public function processLogin(Request $request)
    {
        try
        {
            $email = $request->get('email');
            $password = $request->get('password');
            $remember = empty($request->get('remember')) ? false : true;
            $rules = [
                'email'    => 'required|email',
                'password' => 'required',
            ];
            $input = Input::all();
            $validator = Validator::make($input, $rules);
            
            if ($validator->fails())
            {
                return Redirect::back()
                ->withInput()
                ->withErrors($validator);
            }
            
           
            
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
	 * Show the form for the user registration.
	 *
	 * @return \Illuminate\View\View
	 */
	public function register()
	{
		return View::make('auth.register');
	}
	
	/**
	 * Handle posting of the form for the user registration.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function processRegistration()
	{
		$input = Input::all();
		$rules = [
			'email'            => 'required|email|unique:users',
			'password'         => 'required',
			'password_confirm' => 'required|same:password',
		];
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{
			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}
		if ($user = Sentinel::register($input))
		{
			$activation = Activation::create($user);
			$code = $activation->code;
			$sent = Mail::send('auth.emails.activate', compact('user', 'code'), function($m) use ($user)
			{
				$m->to($user->email)->subject('Activate Your Account');
			});
			if ($sent === 0)
			{
				return Redirect::to('register')
					->withErrors('Failed to send activation email.');
			}
			return Redirect::to('login')
				->withSuccess('Your accout was successfully created. You might login now.')
				->with('userId', $user->getUserId());
		}
		return Redirect::to('register')
			->withInput()
			->withErrors('Failed to register.');
	}


}
