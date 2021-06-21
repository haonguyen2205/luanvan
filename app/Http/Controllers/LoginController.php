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
        $role=1;
        $email=$request->email; 
        $password= $request->password;
        $Result = users::where('email',$email)->Where('password',$password)->first(); //trả về bản ghi đầu tiên
        if($Result)
        {
            if($Result->role==1)
            {
                Session::put('name',$Result->name); 
                Session::put('users_id',$Result->users_id);
                return Redirect::to('/admin');
            }
            else{
                Session::put('name',$Result->name); 
                Session::put('users_id',$Result->users_id);
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
        return view('/admin');
    }
    function logout(){
        Session::flush();
        return redirect()->back();
    }
}

