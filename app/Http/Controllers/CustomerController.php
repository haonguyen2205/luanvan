<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



use App\Models\users;

class CustomerController extends Controller
{
    //
    // public function show_page_profile()
    // {
    //     return view('profile.profile');
    // }


    public function list_cus() 
    {
        $staff=users::where('role',0)->get();
        $manager = view('Admin.customer.list')->with('listCus', $staff);
        return view('admin_layout')->with('Admin.customer.list', $manager);

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
    public function search()
    {
        
    }
}
