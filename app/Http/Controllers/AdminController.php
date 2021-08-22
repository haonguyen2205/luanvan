<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use App\Models\users;
use App\Models\orders;

class AdminController extends Controller
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

    function index()
    {
        // $this->AuthLogin();

        $lastDayofMonth = Carbon::now()->endOfMonth()->toDateString();
        $firstdatofmonth=Carbon::now()->firstOfMonth()->toDateString();

        $order= DB::table('order')->Get();
        $staff= DB::table('users')->where('role',1)->get();

        $customer= DB::table('users')->where('role',0)->get();

        $tongtien=0;
        $countuser=0;
        $count_cus=0;
        $count_order=0;
        foreach($order as $od)
        {
            if($od->status==4)
            {
                $tongtien=$tongtien +$od->total;
            }
            else
            {
                $count_order+=1;
            }
        } 
        foreach($staff as $st)
        {
            $countuser=$countuser +1;
        }

        foreach($customer as $cus)
        {
            $count_cus +=1;
        }

        /// tong so người ở trong này hiện tại
        $mytime = date("Y-m-d");

        $order=DB::table('order')->where('status',3)->Where('dayat','>=',$firstdatofmonth)->where('dayout','<=',$lastDayofMonth)->get();
        $songuoi=0;
        foreach($order as $o)
        {  
            if($mytime >= $o->dayat && $mytime <= $o->dayout)
            {
                $songuoi =$songuoi+ $o->adults +$o->children;
            }

        }

        return view('Admin.dashboard',compact('tongtien','countuser','count_cus','count_order','songuoi'));
    }

    public function songuoitrongngay(){
        
    }



}
