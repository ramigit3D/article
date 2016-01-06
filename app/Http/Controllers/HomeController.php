<?php

namespace App\Http\Controllers;

use \URL;
use \Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
     public function index()
    {
        $user = \Sentinel::getUser();
       
        if (1)
	{
	    return view('index');
           
        
        }
        else 
        {
             return view('account.edit');
            
        }
        
        
    }
}
