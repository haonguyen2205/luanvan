<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Mail;

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
            if($Result->role==1 && $Result->users_status==0) // tài khoản nhân viên và không bị khóa
            {
                Session::put('name_admin',$Result->name); 
                Session::put('admin_id',$Result->users_id);   
                Session::put('postion',$Result->position_id); 
                Session::put('role',$Result->role);
                session::put('users_image',$Result->users_image);
                return Redirect::to('/admin');
            }
            else if($Result->users_status==0 && $Result->role==0) // tài khoản khách hàng không bị khóa
            {
                Session::put('name',$Result->name); 
                Session::put('users_id',$Result->users_id);
                Session::put('role',$Result->role);
                return Redirect::to('/');
            }
            else{
                Session::put('message','tài khoản đang khóa không thể đăng nhập');
                return Redirect::to('/login');
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
        Session::put('admin_id',null);
        session()->flush();
        return view('layout.home');
    }


    public function forget_password(request $request)
    {
        return view('layout.forgetpass.forget_password');
    }

    public function mail_foget_password(request $request)
    {
        $data=$request->all();
        $now =Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $title="lấy lại mật khẩu tài khoản khách sạn kalenda".''.$now;
        $user=users::where('email',$data['email'])->get();
        foreach ($user as $key=>$value) {
            $cus_id=$value->users_id;
        }

        if($user)
        {
            $count_cus=$user->count();
            if($count_cus==0) // tài khoản
            {
                return redirect()->back()->with('error',"email chưa được đăng kí để khôi phục mật khẩu");

            }
            else{

                $token=Str::random(6);
                $customer=users::find($cus_id); 

                $customer->token='';    
                $customer->token=$token;
                $customer->save();

                //send mail to customer
                $to_email=$data['email'];
                $link_reset_pass=url('/update-new-pass?email='.$to_email.'&token='.$token);
                $data=array("name"=>$title,"body"=>$link_reset_pass,"email"=>$data['email']);
                
                Mail::Send('layout.forgetpass.forget_pass_notify',['data'=>$data],function($message) use($title,$data)
                {
                    $message->to($data['email'])->subject($title); // send mail vs chu de subject
                    $message->from($data['email'],$title); //send form mail

                });
                return redirect()->back()->with('message',"gửi mail thành công,vui lòng vào mail để reset password");
            }
        }

    }

    public function update_new_pass(request $request)
    {

        return view('layout.forgetpass.update_new_pass');
    }
    public function update_password(request $request)
    {
        $data=$request->all();
        $token= Str::random(6); // vô hiệu hóa link trong mail;
        $customer =users::where('email',$data['email'])->where('token','=',$data['token'])->Get();
        $count =$customer->count();

        if($count>0)
        {
            foreach ($customer as $key=>$value)
            {
                $cus_id=$value->users_id;
            }
            $reset=users::find($cus_id);
            $reset->password=$data['password'];
            $reset->token=$token;
            $reset->Save();
            return redirect('login')->with('success',"mật khẩu đã cập nhật ");
        
        }
        else{
            return redirect('forget-password')->with('error',"vui lòng nhập lại mail,link đã quá hạn");
        }


    }
}

