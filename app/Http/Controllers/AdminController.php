<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \URL;
use \Sentinel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class AdminController extends Controller
{
    public function index()
    {
        $user = \Sentinel::getUser();
        
        if (Sentinel::hasAccess('admin'))
        {
        return view('admin.index');
        }
    }
    
    
    
   
    
}
