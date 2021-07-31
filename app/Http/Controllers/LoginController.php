<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\users;

class LoginController extends Controller
{
    function login()
    {
       return view('login');
       //return Redirect::to();
    }

    function checkLogin(request $request)
    {
        $email=$request->email; 
        $password= $request->password;
        $Result = users::where('email',$email)->Where('password',$password)->first(); //trả về bản ghi đầu tiên
        if($Result)
        {
            if($Result->role==1 && $Result->users_status==0)
            {
                Session::put('name_admin',$Result->name); 
                Session::put('user_id ',$Result->users_id);
                Session::put('role',$Result->role);
                session::put('users_image',$Result->users_image);
                return Redirect::to('/admin');
            }
            else if($Result->users_status==0)
            {
                Session::put('name',$Result->name); 
                Session::put('users_id',$Result->users_id);
                Session::put('role',$Result->role);
                
                return Redirect::to('/');
            }
        }
        else
        {
            Session::put('message','sai mật khẩu hoặc tài khoản đăng nhập');
            return Redirect::to('/login');
        }
    }

    function logoutAction()
    {
        Session::put('name',null); 
        Session::put('users_id',null);
        session()->flush();
        return view('layout.home');
    }

}

