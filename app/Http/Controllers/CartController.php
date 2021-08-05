<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    function datphong(Request $request){

       $user=null;
       if(Session::has('users_id')){
           $user=DB::table('users')->where('users_id',Session::get('users_id'))->first();
       }
       $viewData=[
        'room_id'=>$request->id,
        'room_name'=>$request->room_name,
        'room_price' => $request->price,
        'room_image' =>$request->image,
        'dayat' =>$request->dayat,
        'dayout' =>$request->dayout,
        'user' => $user
    ];


       return view('layout.cart',$viewData);
    }
    function postCart(Request $request)
    {
        Session::put('datphong',1);
        
      
        $at= new Carbon($request->dayat);

       $out = new Carbon($request->dayout);



        $oder=DB::table('order')->insertGetId([
            'users_id'=>$request->user_id,
            'username'=>Session::get('name'),
            'status'=>1,
            'deposit'=>($request->price * $request->songay)*0.4,
            'hoten'=>$request->hoten,
            'cmnd'=>$request->cmnd,
            'adults'=>$request->adults,
            'children'=>$request->children,
            'dayat'=>$at->format('Y-m-d'),
            'dayout'=>$out->format('Y-m-d'),
            'room_id'=>$request->room_id,
            'total'=>$request->price*$request->songay,
            'order_status_id'=>1,
            'created_at'=>Carbon::now(),
        ]);

        $order_detail=DB::table('order_details')->insert([
            'order_id'=>$oder,
            'room_id'=>$request->room_id,
            'room_qty'=>1,
            'created_at'=>Carbon::now(),
        ]);
       
        return redirect('/');
        //Pop up thông báo đặt phòng thành công
    }
}
