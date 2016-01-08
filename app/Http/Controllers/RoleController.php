<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Role;
use \Sentinel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest('created_at')->get();
        
        if (Sentinel::hasAccess('admin'))
        {
        return view('admin.rolelist', compact('roles'));
        }
        else
        {
            return redirect('/');
        }
    }
    
    public function show($id)
    {
        if (Sentinel::hasAccess('admin'))
        {
        $role = Sentinel::findRoleById($id);
        return view('admin.roleshow', compact('role'));
        }
        else
        {
            return redirect('/');
        }
    }
}
