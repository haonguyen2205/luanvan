<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



use App\Models\users;


class StaffController extends Controller
{
    //
    public function addpage_staff()
    {
        return view('Admin.staff.add');
    }
    public function add_staff(request $request)
    {

        $users = new users();
        $data=$request->all();
        
        $users->name      = $request->input('name');
        $users->email     = $request->input('email');
        $users->password  = $request->input('password');
        $users->phone     = $request->input('phone');
        $users->address   = $request->input('address');
        $users->role      = 1;
//đẩy hết dữ liệu từ field vào biến users
        // var_dump($data); exit;
        // $check_email[]=users::select('email')->Where('role',1)->orderBy('users_id','desc')->get();

        // var_dump($check_email); exit;   

        if($data['password'] != $data['repassword'])
        {
            Session::put('msg','sai mật khẩu nhập lại');
            return Redirect::to('/add_page_Staff');
           
        }
        else
        {
            $users->save();
            Session::put('msg','Thêm tài khoản thành công');
            return Redirect::to('/list_staff');
        }
        
    }

    public function list_staff() 
    {
        $staff=users::where('role',1)->get();
        $manager = view('Admin.staff.list')->with('liststaff', $staff);
        return view('admin_layout')->with('Admin.staff.list', $manager);

    }

    public function delete_staff($id) 
    {
        //ý tưởng:  kiểm tra nguofi đang đăng nhập có đủ quyền để xóa tk hay không
        //mặc định quyền có đủ để xóa các tk nv khác có role =3;s

        // $staff=users::find($id);
        // $staff->delete();
        // Session::put('msg','xóa tài khoản thành công');
        //     return Redirect::to('/list_staff');
    }
}
