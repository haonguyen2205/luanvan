<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\users;

class AdminController extends Controller
{
    public function authlogin()
    {
        $admin_id=Session::get('user_id');
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
        $this->authlogin();
        return view('Admin.dashboard');
    }

    function thongketaikhoan()
    {

        $tb=users::where('role',0)->Get();
        $count=0;

        foreach($tb as $so)
        {
            $count=$count+1;
        }
        
        return view('Amin.dashboard')->with('countuser',$count);
    }


}
