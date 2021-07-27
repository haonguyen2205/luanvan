<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\users;
use Symfony\Component\VarDumper\VarDumper;

class RegisterController extends Controller
{
    //
    public function showRegister()
    {
        return view('layout.register');
    }

    public function register(Request $request)
    {
        $users = new users();
        $data=$request->all();
        
        $users->name = $request->input('name');
        $users->email     = $request->input('email');
        $users->password = $request->input('password');
        $users->phone     = $request->input('phone');
        $users->address = $request->input('address');
        $users->role =0;
        $users->users_stauts=0;

        $checkmail= users::all();
        
        foreach($checkmail as $user)
        {
            if($request->input('email')==$user->email)
            {
                Session::put('msg','địa chỉ mail đã được sử dụng');
                return Redirect::to('/showregister');
            }
            elseif($data['password'] == $data['repassword'])
            {
            $users->save();
            Session::put('msg','Thêm tài khoản thành công');
            return Redirect::to('/');
            }
            else
            {
                Session::put('msg','sai mật khẩu nhập lại');
                return Redirect::to('/showregister');
            }
        }
        
        
    }
}
