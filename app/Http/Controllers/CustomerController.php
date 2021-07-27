<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



use App\Models\users;

class CustomerController extends Controller
{
    public function show_page_profile()
    {
        return view('profile.layout');
    }
    public function show_page_profileDetail()
    {
        $id=session::has('users_id');
        $data_cus=users::where('users_id',$id)->get();
        return view('profile.profile_form')->with('datacus', $data_cus);
    }
    public function show_page_profilePass()
    {
        // $id=session::has('users_id');
        // $cur_pass=users::select('password')->where('users_id',$id)->get();
        // // echo $cur_pass;
        return view('profile.profile_pass');
    }

    public function change_password(request $request)
    {
        $id=session::has('users_id');
        $cus=users::find($id);

       if($cus->password != $request->input('cur_password') || $request->input('password') !=  $request->input('repassword') && $cus->role==0)
        {
            Session::put('msg','mật khẩu hiện tại hoặc mật khẩu nhập lại không chính xác');
            return Redirect::to('/profile-pass');
        }
        else if($cus->role=='0')
        {    
            $cus->password = $request->input('repassword');
            $cus->save();
            Session::put('msg','cập nhật mật khẩu thành công');
            return Redirect::to('/profile-pass');  
        }

    }

    public function change_info(request $request)
    {
        $id=session::has('users_id');
        $cus=users::find($id);

        $cus->name=$request->input('name');
        $cus->phone=$request->input('phone');
        $cus->address=$request->input('address');
        $cus->save();
        Session::put('msg','cập nhật thông tin thành công');
        return Redirect::to('/profile-form');

    }


    //CUS of manager
    public function list_cus(request $request)
    {
        $key=$request->input('search_cus');
        if($key != null)
        {
            $staff1=users::where('role',0)->where('name', 'like', '%'.$key.'%')->orwhere('email', 'like', '%'.$key.'%')
            ->where('users_status',0)->where('role',0)->get(); 
            $manager = view('Admin.customer.list')->with('listCus', $staff1);
            return view('admin_layout')->with('Admin.customer.list', $manager);
        }
        else
        {
            $staff=users::where('role',0)->where('users_status',0)->paginate(5);
            $manager = view('Admin.customer.list')->with('listCus', $staff);
            return view('admin_layout')->with('Admin.customer.list', $manager);
        }

    }

    public function list_cus_block(request $request)
    {
        $key=$request->input('search_cus');
        if($key != null)
        {
            $staff1=users::where('role',0)->where('name', 'like', '%'.$key.'%')->where('users_status',1)->get(); 
            $manager = view('Admin.customer.list')->with('listCus', $staff1);
            return view('admin_layout')->with('Admin.customer.list', $manager);
        }
        else
        {
            $staff=users::where('role',0)->where('users_status',1)->get();
            $manager = view('Admin.customer.list')->with('listCus', $staff);
            return view('admin_layout')->with('Admin.customer.list_block', $manager);
        }
    }

    public function delete_cus($id) 
    {
        
        $user=users::find($id);
        if($user->users_status==0)
        {
            $user->users_status=1;
            $user->save();
            Session::put('msg','cập nhật thông tin thành công');
            return Redirect::to('/list-users-block');
        }
        else if($user->users_status==1)
        {
            $user->users_status=0;
            $user->save();
            Session::put('msg','cập nhật thông tin thành công');
            return Redirect::to('/list-users');
        }
        
    }

    //phần của tao hiện page, coi rồi đổi từ từ m dien ak xa het
    
    
}
