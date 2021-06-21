<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class CartController extends Controller
{
    //
    function cart($id)
    {
        $room=DB::table('room')->where('room_id',$id)->first();
        $user=null;
        if(Session::has('users_id')){
            $user=DB::table('users')->where('users_id',Session::get('users_id'))->first();
        }
        return view('layout.cart',compact('room','user',$user,$room));
    }
    function postCart(Request $request)
    {
        $oder=DB::table('order')->insertGetId([
            'users_id'=>$request->user_id,
            'author'=>null,
            'status'=>0,
            'deposit'=>0,
            'created_at'=>Carbon::now(),
        ]);
        $order_detail=DB::table('order_details')->insert([
            'order_id'=>$oder,
            'room_id'=>$request->room_id,
            'room_price'=>$request->price,
            'room_qty'=>$request->quantity,
            'adults'=>$request->adults,
            'children'=>$request->children,
            'dayat'=>$request->dayat,
            'dayout'=>$request->dayout,
            'total'=>$request->price*$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return redirect('/');
        //Pop up thông báo đặt phòng thành công
    }
}
