<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //public function authlogin()
    {
        $admin_id=Session::get('users_id');
        if($admin_id)
        {
            Redirect::to('Admin.dashboard');
        }
        else
        {
            Redirect::to('login')->send();
        }
    }


    function index()
    {
        // $this->authlogin();
        return view('Admin.dashboard');
    }

    
}
