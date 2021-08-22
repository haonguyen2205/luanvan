<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
use DB;
use App\Models\order;

use App\Models\users;

class CustomerController extends Controller
{
    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            Redirect::to('admin');
        }
        else
        {
            Redirect::to('login')->send();
        }
    }

    public function show_page_profile()
    {
        $this->AuthLogin();
        return view('profile.layout');
    }
    public function show_page_profileDetail()
    {
        
        if(session::has('users_id'))
        $id=session::get('users_id');
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
        $id=session::get('users_id');
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
        else{
            Session::put('msg','lỗi tài khoản');
            return Redirect::to('/profile-form');
        }

    }

    // update cus
    public function change_info(request $request)
    {
        $data=$request->all();

        $id=session::Get('users_id');
        $cus=users::find($id);

        
        $cus->name=$request->input('name');
        $cus->phone=$request->input('phone');
        $cus->address=$request->input('address');


        $cus->save();
        Session::put('msg','cập nhật thông tin thành công');
        return Redirect::to('/profile-form');

    }

    public function list_order(){
        $id= session::get('users_id');

        $list= DB::table('order')->where('users_id',$id)->get();
        //  echo $list; exit;
        if($list==null){
            session::put('mes',"bạn không có đơn đặt nào");
            return redirect::to('/profile-form');
        }
        else{
            return view('profile.list_order')->with('listorder',$list);
        }
        
    }

    public function delete_order_cus($id)
    {

        $order=order::find($id);

        $time= Carbon::now('Asia/Ho_Chi_Minh');

        $sogio= (strtotime($time) - strtotime($order->created_at))/3600;
        
        if($sogio <=24)
        {
            $order->status=0;//trạng thái 0 là trạng thái hủy đơn
            $order->save();
            return redirect::To('/profile/list-order');
        }
        else{
            $order->status=0;
            $order->save();
            session::put('mes_quagiohuy',"số tiền cọc sẽ không được hoàn trả do quá 24h cho phép");
            return redirect::To('/profile/list-order');
        }
        

        
    }


    //CUS of manager
    public function list_cus(request $request)
    {
        $this->AuthLogin();
        $key=$request->input('search_cus');
        if($key != null)
        {
            $staff1=users::where('role',0)->where('name', 'like', '%'.$key.'%')->orwhere('email', 'like', '%'.$key.'%')
            ->where('users_status',0)->where('role',0)->paginate(5); 
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
        $this->AuthLogin();
        $key=$request->input('search_cus');
        if($key != null)
        {
            $staff1=users::where('role',0)->where('name', 'like', '%'.$key.'%')->where('users_status',1)->paginate(5); 
            $manager = view('Admin.customer.list')->with('listCus', $staff1);
            return view('admin_layout')->with('Admin.customer.list', $manager);
        }
        else
        {
            $staff=users::where('role',0)->where('users_status',1)->paginate(5);
            $manager = view('Admin.customer.list')->with('listCus', $staff);
            return view('admin_layout')->with('Admin.customer.list_block', $manager);
        }
    }

    public function delete_cus($id) 
    {
        
        $user=users::find($id);
        // trạng thái tk =0 tức hđ bình thường ..1 là ngược lại
        if($user->users_status==0)
        {
            $user->users_status=1;
            $user->save();
            Session::put('dlt-success','đã khóa tài khoản');
            return Redirect::to('/list-users-block');
        }
        else if($user->users_status==1)
        {
            $user->users_status=0;
            $user->save();
            Session::put('dlt-success','đã kích hoạt lại tài khoản');
            return Redirect::to('/list-users');
        }
        
    }

    //phần của tao hiện page, coi rồi đổi từ từ m dien ak xa het
    
    
}
