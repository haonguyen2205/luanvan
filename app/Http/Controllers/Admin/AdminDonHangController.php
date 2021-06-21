<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminDonHangController extends Controller
{
    function index(){
        $order=DB::table('order')->get();
        
        $list=array();
        foreach($order as $key){
            $temp=DB::table('order_details')->where('order_id',11)->first();
            $user=DB::table('users')->where('users_id',$key->users_id)->first();
            $room=DB::table('room')->where('room_id',$temp->room_id)->first();
            $list[]=[
                'id'=>$key->order_id,
                'name'=>$user->name,
                'phong'=>$room->room_name,
                'soluong'=>$temp->room_qty,
                'tongtien'=>$temp->room_price*$temp->room_qty,
                'ngaynhan'=>$temp->dayat,
                'ngaytra'=>$temp->dayout,
                'tinhtrang'=>$key->status
            ];
        }
       
        return view('Admin.order.list')->with('list',$list);
        
    }
}
