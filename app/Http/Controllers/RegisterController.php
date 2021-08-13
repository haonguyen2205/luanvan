<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mail;

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
        $users->users_status=1;
        // status = 1 nghĩa là tk không đx cấp phép đnhap
        $checkmail= users::all();
        
        foreach($checkmail as $user)
        {
            if($request->input('email')==$user->email)
            {
                Session::put('email_uni','địa chỉ mail đã được sử dụng');
                return Redirect::to('/showregister');
            }
            else if($data['password'] == $data['repassword'])
            {
                $to_name="KHÁCH SẠN KALENDA";
                $to_email=$request->input('email');
                
                    $str="abcdefghiklmnopqrstuvwxyz0123456789";
                    $str=str_shuffle($str);
                    $users->token=$token=substr($str,0,6);
                    
                    $users->save();
                $data= array("name"=>$request->input('name'),"body"=>"thư yêu cầu xác thực tài khoản ",'token'=>$token,'user_id'=>$users->users_id,);
                Mail::send('Admin.customer.verifycus',$data,function($message)use ($to_name,$to_email)
                {
                    $message->to($to_email)->subject('xác thực tài khoản');
                    $message->from($to_email,$to_name);
                });
                
                $id= $users->users_id;
                $email= $users->email;
                return view('layout.verifycode',compact('id','email',));
                
            }else
            {
                Session::put('pass_uni','sai mật khẩu nhập lại');
                return Redirect::to('/showregister');
            }
        }        
        
    }

    public function verify_token(request $request)
    {
        $id=$request->input('id');
        $user=users::where('users_id',$id)->first();
        $tokens =$request->input('token');
        

        if($user->token == $tokens )
        {
            $user->users_status=0;
            $user->save();
            session::put('verify-email',"xác nhận email thành công bạn bạn có thể đăng nhập");
            return view('login');session::put('mes',"xác nhận email thành công");
        }
        else
        {
            session::put('mes',"xác nhận email thành công");
        }
    }

    public function resend_token(request $request,$id)
    {
        $users=users::find($id);

        $str="abcdefghiklmnopqrstuvwxyz0123456789";
        $str=str_shuffle($str);
        $users->token=$token=substr($str,0,6);
    }

    public function verify_account(request $request,$token)
    {
        $id=$request->input('id');
        $user=users::where('users_id',$id)->first();


        if($user->token == $token)
        {
            $user->status=0;
            $user->save();
            session::put('verify-email',"xác nhận email thành công bạn bạn có thể đăng nhập");
            return redirect::to('/login');
        }
        else{
            session::put('verify-email',"không kích hoạt thành công");
            return redirect::to('/');
        }
    }
}
