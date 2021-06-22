<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response;
use App\Models\role;
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
         $check_email=users::all();

        // var_dump($check_email); exit;   
        foreach($check_email as $user)
        {
            if($request->input('email')==$user->email)
            {
                Session::put('msg','địa chỉ mail đã được sử dụng');
                return Redirect::to('/showregister');
                }
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
    }
// cập nhật thông tin TK
    public function showPageEdit($id)
    {
        $edit = users::where('users_id', $id)->get();
        $manager = view('Admin.staff.edit')->with('editStaff', $edit);
        return view('admin_layout')->with('Admin.staff.edit', $manager);
    }

    public function update_staff(request $request,$id)
    {
        $users = users::find($id);
        $data=$request->all();
        
        $users->name      = $request->input('name');
        //$users->email     = $request->input('email');
        //users->password  = $request->input('password');
        $users->phone     = $request->input('phone');
        $users->address   = $request->input('address');
        

        $this->validate($request,[
            'name'=>'bail|required|min:10|max:100',
            'phone'=>'bail|required|min:10|max:15',
            'address'=>'bail|required|min:10|max:100',
            
        ],[
            'name.required'=>'Tên  không được để trống',
            'name.max'=>'Tên không được dài quá 100 kí tự',
            'name.min'=>'Tên  không được ngắn hơn quá 10 kí tự',
            'phone.required'=>'số điện thoại không được để trống',
            'phone.max'=>'số điện thoại không được dài quá 15 kí tự',
            'phone.min'=>'số điện thoại  không được ngắn hơn quá 10 kí tự',
            'addres.required'=>'địa chỉ không được để trống',
            'phone.max'=>'địa chỉ không được dài quá 15 kí tự',
            'phone.min'=>'số điện thoại  không được ngắn hơn quá 10 kí tự',
        ]);
            $users->save();
            Session::put('msg','cập nhật khoản thành công');
            return Redirect::to('/list_staff');
    }
    //danh sách nhân viên
    public function list_staff() 
    {
        $staff=users::where('role',1)->get();
        $manager = view('Admin.staff.list')->with('liststaff', $staff);
        return view('admin_layout')->with('Admin.staff.list', $manager);

    }
    // xóa một nhân viên
    public function delete_staff($id) 
    {
        //ý tưởng:  kiểm tra nguofi đang đăng nhập có đủ quyền để xóa tk hay không
        //mặc định quyền có đủ để xóa các tk nv khác có role =3;
        $id_user= session::has('users_id');
        $check_role=users::select('role')->where('users_id',$id_user)->get();
 
        if($check_role == '3') 
        {
            $staff=users::find($id);
            $staff->delete();
            Session::put('msg','xóa tài khoản thành công');
            return Redirect::to('/list_staff');
        }
        else
        {
            Session::put('msg',' tài khoản không đủ cấp bặc để xóa tài khoản');
            return Redirect::to('/list_staff');
        }
    }
}
