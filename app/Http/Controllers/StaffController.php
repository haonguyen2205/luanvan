<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response;
use App\Models\role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Mail;
use Carbon\Carbon;

use App\Models\users;
use App\Models\timekeep;

class StaffController extends Controller
{
    //
    public function addpage_staff()
    {
        $pos = DB::table('postion')->get();

        return view('Admin.staff.add')->with('chucvu',$pos);
    }
    public function add_staff(request $request)
    {
        $users = new users();
        $data=$request->all();
        
        $users->name      = $request->input('name');
        $users->email     = $request->input('email');
        $users->phone     = $request->input('phone');
        $users->address   = $request->input('address');
        $users->position_id   = $request->input('chucvu');
        $users->users_status=0;
            $str="abcdefghiklmnopqrstuvwxyz0123456789";
            $str=str_shuffle($str);
            $str=substr($str,0,8);
        $users->password = $str;
        $users->role      = 1;
        // $users->users_image = $data['image'];

        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $get_name_image = $image->getClientOriginalName(); // lấy tên của img
            $name_image     = current(explode('.',$get_name_image));
            $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();// đuổi mở rộng của ảnh
            $image->move('public/upload/staff',$new_image);
            $users->users_image     = $new_image    ;
        }

        $check_email=users::all(); 
        foreach($check_email as $user)
        {
            if($request->input('email')==$user->email)
            {
                Session::put('msg','địa chỉ mail đã được sử dụng');
                return Redirect::to('/page_add_staff');
            }
            else
            {
                $to_name="KHÁCH SẠN KALENDA";
                $to_email=$request->input('email');
                $data= array("name"=>$request->input('name'),"body"=>"thư yêu cầu xác thực tài khoản ","password"=>$str);
                Mail::send('Admin.staff.verify',$data,function($message)use ($to_name,$to_email)
                {
                    $message->to($to_email)->subject('xác thực tài khoản');
                    $message->from($to_email,$to_name);
                });
                $users->save();
                Session::put('msg','đang  chờ xác thực mail');
                return Redirect::to('/page_add_staff');
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
        $users->phone     = $request->input('phone');
        $users->address   = $request->input('address');
        // $users->users_image=$data['image'];

        // echo $users; exit;
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
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $get_name_image = $image->getClientOriginalName(); // lấy tên của img
            $name_image     = current(explode('.',$get_name_image));
            $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();// đuổi mở rộng của ảnh
            $image->move('public/upload/staff',$new_image);
            $users->users_image     = $new_image;
            $users->save();
        }else
        {
            session::put('mes',"không phải file hình");
            return view('Admin.staff.edit');
        }
            
        return Redirect::to('/list_staff');
        
    }
    //danh sách nhân viên
    public function list_staff(request $request) 
    {
        $key=$request->input('search_staff');
        if($key != null)
        {
            $staff1=users::where('role',1)->where('users_status',0)->where('name', 'like', '%'.$key.'%')
                ->orwhere('email', 'like', '%'.$key.'%')->where('role',1)->where('users_status',0)->paginate(5); 
            $manager = view('Admin.staff.list')->with('liststaff', $staff1);
            return view('admin_layout')->with('Admin.staff.list', $manager);
        }
        else
        {
            $staff=users::join('postion','postion.postion_id','=', 'users.position_id')->
            where('role',1)->Where('users_status',0)->paginate(5);
            $manager = view('Admin.staff.list')->with('liststaff', $staff);
            return view('admin_layout')->with('Admin.staff.list', $manager);
        }
    }

    public function list_staff_block(request $request)
    {
        $key=$request->input('search_staff');
        if($key != null)
        {
            $staff1=users::where('role',1)->where('users_status',1)->where('name', 'like', '%'.$key.'%')->where('email', 'like', '%'.$key.'%')->get(); 
            $manager = view('Admin.staff.list_block_users')->with('liststaff', $staff1);
            return view('admin_layout')->with('Admin.staff.list_block_users', $manager);
        }
        else
        {
            $staff=users::where('role',1)->Where('users_status',1)->get();
            $manager = view('Admin.staff.list_block_users')->with('liststaff', $staff);
            return view('admin_layout')->with('Admin.staff.list_block_users', $manager);    
        }
        

    }
    // xóa một nhân viên
    public function delete_staff($id) 
    {
        $id_user= session::has('users_id');
        // $check_role=users::select('role')->where('users_id',$id_user)->get();
        $user=users::find($id);
        
        // if($check_role == '3') 
        // {
            if($user->users_status==0)
            {
                $user->users_status=1;
                $user->save();
                return Redirect::to('/list_staff/list-staff-block');
            }
            else if($user->users_status==1)
            {
                $user->users_status=0;
                $user->save();
                return Redirect::to('/list_staff');
            }
        // }

    }
    // public function process_verrify($token)
    // {
        
    // }

    //diem danh nhaan vient
    public function diemdanh()
    {
        $time = new timekeep();
        $time->users_id=session::get('user_id');   
        $time->time_in =Carbon::now();
        $time->save();
        $id =$time->timekeep_id;
        session::put('timekeep_id',$id);
        session::put('mes_diemdanh',"diem thanh thanh cong");
        return redirect::to('/admin');
    }
    public function diemdanhra()
    {
        $id = session::get('timekeep_id');
        $data =timekeep::where('timekeep_id',$id)->first(); //sài first or find lấy singel get là lấy many .. haizz
        $users=$data->users_id;
        if($users == session::Get('users_id'))
        {
            $t_o=$data->time_out =Carbon::now();
            //  
            // $data->sogio=$t_o - $data->time_in;
            $data->save();
            session::put('mes_diemdanhra',"diem thanh thanh cong");
            session::put('mes_diemdanh',null);
            return redirect::to('/admin');
        }
        else
        {
            session::put('mes_fails',"chưa dang nhâp tai khoan hoặc sai tài khoản đăng nhập");
            return redirect::to('/admin');
        } 
     
    }

}
