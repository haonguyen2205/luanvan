<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\users;
use App\Models\orders;

class AdminController extends Controller
{
    public function authlogin()
    {
        $admin_id=Session::get('users_id');
        if(session::has('users_id'))
        {
            Redirect::to('Admin.dashboard');
        }
        else
        {
            Redirect::to('login');
        }
    }

    function index()
    {
        // $this->authlogin();

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

        return view('Admin.dashboard',compact('tongtien','countuser','count_cus','count_order'));
    }



}
