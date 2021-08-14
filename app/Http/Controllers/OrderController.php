<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\type; 
use App\Models\room;
use App\Models\image;
use App\Models\order_detail;
use App\Models\order;


class OrderController extends Controller
{
    //
    function add_order_page(request $request,$id)
    {

        $start= session::get('startime');
        $endt= session::get('endtime');
        $cuoituan=0;
        $room=room::where('room_id',$id)->get();
        $img=DB::table('image')->take(10)->Get();
        // echo $room[0]->room_price; exit;
        $tongtien=0;
        for($start ;$start <=$endt;$start++) {
            $t=date("w",strtotime($start)); // w là week 
           if($t==0 || $t==6)
           {
               $tongtien=$tongtien + ($room[0]->room_price * 120)/100;
                $cuoituan+=1;
           }
           else{
                $tongtien=$tongtien + $room[0]->room_price;
           }
        }
        $start= session::get('startime');
        

        return view("admin.order.add_order",compact('img','start','endt','room','cuoituan','tongtien'));
    }

//-------------
    function order_by_admin()
    {
        return view("admin.order.list");
    }

    function add_order_by_admin(request $request,$id)
    {
        $order=new order();
        $order_detail=new order_detail();
        $mydate=date("Y-m-d H:i:s");
        

        $tongnguoi=$request->input('adults')+$request->input('children');

        $room=room::where('room_id',$id)->join('category_room','category_room.type_id','=','room.type_id')->Get();

        
        // thêm vào đơn hàng
        $order->users_id=session::Get('admin_id');
        $order->username=$request->input('name');
        $order->status=1;
        $order->deposit= $request->input('deposit');
        $order->adults=$request->input('adults');
        $order->children=$request->input('children');
        $order->dayat=$request->input('start');
        $order->dayout=$request->input('end');
        $order->CMND=$request->input('CMND');
        $order->total=$request->input('total');

        $order->save();

        ///thêm chi tiết đơn
        $order_detail->order_id=$order->order_id;
        $order_detail->room_id=$id;
        $order_detail->room_qty=1;
        $order_detail->save();
        
        session::put('startime',null);
        session::put('endtime',null);
        session::put('mes_datphong',"đặt phòng thành công");
        return redirect::to('/list-room');
        
    }
    
}
