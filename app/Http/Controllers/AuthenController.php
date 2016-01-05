<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Support\Facades\View;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class AuthenController extends Controller
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
    public function processLogin()
    {
        try
        {
            $input = Input::all();
            $rules = [
                'email'    => 'required|email',
                'password' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            
            if ($validator->fails())
            {
                return Redirect::back()
                ->withInput()
                ->withErrors($validator);
            }
            
            $remember = (bool) Input::get('remember', false);
            
            if (Sentinel::authenticate(Input::all(), $remember))
            {
                return Redirect::intended('account');
            }
            $errors = 'Invalid login or password.';
            }
            catch (NotActivatedException $e)
            {
                $errors = 'Account is not activated!';
                return Redirect::to('reactivate')->with('user', $e->getUser());
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
// 	public function processRegistration()
// 	{
// 		$input = Input::all();
// 		$rules = [
// 			'email'            => 'required|email|unique:users',
// 			'password'         => 'required',
// 			'password_confirm' => 'required|same:password',
// 		];
// 		$validator = Validator::make($input, $rules);
// 		if ($validator->fails())
// 		{
// 			return Redirect::back()
// 				->withInput()
// 				->withErrors($validator);
// 		}
// 		if ($user = Sentinel::register($input))
// 		{
// 			$activation = Activation::create($user);
// 			$code = $activation->code;
// 			$sent = Mail::send('sentinel.emails.activate', compact('user', 'code'), function($m) use ($user)
// 			{
// 				$m->to($user->email)->subject('Activate Your Account');
// 			});
// 			if ($sent === 0)
// 			{
// 				return Redirect::to('register')
// 					->withErrors('Failed to send activation email.');
// 			}
// 			return Redirect::to('login')
// 				->withSuccess('Your accout was successfully created. You might login now.')
// 				->with('userId', $user->getUserId());
// 		}
// 		return Redirect::to('register');
// // 			->withInput()
// // 			->withErrors('Failed to register.');
// 	}


}
