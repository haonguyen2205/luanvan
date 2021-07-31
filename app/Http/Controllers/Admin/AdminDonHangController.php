<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\order;

class AdminDonHangController extends Controller
{
    function index(){
        
        $order=DB::table('order')->where('status','<>',-1)->get();
        
        $list=array();
        foreach($order as $key){

            $temp=DB::table('order_details')->where('order_id',$key->order_id)->first();

              $user=DB::table('users')->where('users_id',$key->users_id)->first();


              $room=DB::table('room')->where('room_id',$temp->room_id)->first();
            
              $list[]=[
                'id'=>$key->order_id,
                'name'=>$user->name,
                'phong'=>$room->room_name,
                'deposit'=>$key->deposit,
                'tongtien'=>$key->total,
                'ngaynhan'=>$key->dayat,
                'ngaytra'=>$key->dayout,
                'tinhtrang'=>$key->status,
               
            ];
        }
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData)->with('list',$list);

    }
    function update($id){
        $status=DB::table('order')->where('order_id',$id)->first();
       DB::table('order')->where('order_id',$id)->update([
           'status'=>++$status->status
       ]);
       return redirect()->back();
    }
    function chitiet($id){
        $order=DB::table('order')->where('order_id',$id)->first();
        $user=DB::table('users')->where('users_id',$order->users_id)->first();
        $detail=DB::table('order_details')->where('order_id',$id)->first();
        $room=DB::table('room')->where('room_id',$detail->room_id)->first();
        $service=DB::table('service')->get();
        return view('Admin.order.chitiet',compact('order','detail','service','user','room',$service,$user,$room,$order,$detail));
    }
    function dichvu(Request $request)
    {
        dd($request->all());
        $ser=DB::table('service_detail')->insert([
            'order_id'=>$request->id,

        ]);
    }
    function thanhtoan($id){
        $order= DB::table('order')->where('order_id',$id)->first();
        $orderdetail = DB::table('order_details')->where('order_id',$order->order_id)->first();
        $user=DB::table('users')->where('users_id',$order->users_id)->first();
        $so = strtotime($order->dayout) - strtotime($order->dayat);
        $songay = $so/86400 ;
        $room= DB::table('room')->where('room_id',$orderdetail->room_id)->first();
        $ser=DB::table('service')->get();
       $u=DB::table('service_detail')->where('order_id',$order->order_id)->get();
        $tiendichvu =0;
        foreach($ser as $s){
            foreach($u as $k){
                if($k->service_id == $s->service_id){
            $tiendichvu = $tiendichvu + $k->quantity*$s->service_price;}
        }}
        $i=DB::table('service_detail')->where('order_id',$order->order_id)->get();
  
            $viewData=[
            'hoadon' =>$id,
            'tenkhachhang'=>$user->name,
            'phong' => $room->room_name,
            'price' => $room->room_price,
            'dayat' => $order->dayat,
            'dayout' =>$order->dayout,
            'songay' => $songay,
            'tiencoc' =>$order->deposit,
            'tongtien' =>$order->total ,
            'tiendichvu' =>$tiendichvu,
            'service'=>$ser,
            'dichvu'=>$i,
            'status'=>$order->status
        ];
        return view('Admin.order.thanhtoan',$viewData);
    }
    function capnhat(Request $request){
      
        $order= DB::table('order')->where('order_id',$request->id)->first();
        $orderdetail = DB::table('order_details')->where('order_id',$order->order_id)->first();
        $user=DB::table('users')->where('users_id',$order->users_id)->first();
        $so = strtotime($order->dayout) - strtotime($order->dayat);
        $songay = $so/86400 + 1;
        $room= DB::table('room')->where('room_id',$orderdetail->room_id)->first();
        $ser=DB::table('service')->get();
        $tiendichvu =0;
        $id=DB::table('service_detail')->where('order_id',$order->order_id)->first();
        
        foreach($ser as $s){
            $a=$s->name;
            $tiendichvu = $tiendichvu+ $request->$a*$s->service_price;
            if($id==null){
                DB::table('service_detail')->insert([
                    'order_id'=>$request->id,
                    'service_id'=>$s->service_id,
                    'quantity'=>$request->$a
                ]);
            }
            else if($id){
                DB::table('service_detail')->where([
                   ['order_id','=',$order->order_id],
                   ['service_id','=',$s->service_id]
                ])->update([
                    'service_id'=>$s->service_id,
                    'quantity'=>$request->$a
                ]);
            }
        }
       
        $i=DB::table('service_detail')->where('order_id',$order->order_id)->get();
        $viewData=[
            'hoadon' =>$request->id,
            'tenkhachhang'=>$user->name,
            'phong' => $room->room_name,
            'price' => $room->room_price,
            'dayat' => $order->dayat,
            'dayout' =>$order->dayout,
            'songay' => $songay,
            'tiencoc' =>$order->deposit,
            'service' =>$ser,
            'tiendichvu'=>$tiendichvu,
            'tongtien' =>$order->total , 
            'dichvu'=>$i,
            'status'=>$order->status
        ];
       
        return view('Admin.order.thanhtoan',$viewData);

    }
    function xoa($id){
        DB::table('order')->where('order_id',$id)->update([
            'status'=>-1
        ]);
        return redirect('admin/manage-order');
    }
    function checkout(Request $request){
   
       DB::table('order')->where('order_id',$request->id)->update([
           'total' => $request->total,
           'status' => 4
       ]);
       return Redirect('admin/manage-order');
    }
    function back()
    {
        return Redirect::to('admin/manage-order');
    }
    function dsxoa(){
        $order=DB::table('order')->where('status',-1)->get();

        $ds=array();
        foreach($order as $key){

            $temp=DB::table('order_details')->where('order_id',$key->order_id)->first();

              $user=DB::table('users')->where('users_id',$key->users_id)->first();


              $room=DB::table('room')->where('room_id',$temp->room_id)->first();

              $ds[]=[
                'id'=>$key->order_id,
                'name'=>$user->name,
                'phong'=>$room->room_name,
                'deposit'=>$key->deposit,
                'tongtien'=>$key->total,
                'ngaynhan'=>$key->dayat,
                'ngaytra'=>$key->dayout,
                'tinhtrang'=>$key->status
            ];
        }

        return view('Admin.order.dsxoa')->with('ds',$ds);
    }
    function timkiem(Request $request)
    {
      $st=$request->trangthai;
       if($request->trangthai == -2){

        $order=DB::table('order')->where('status','<>',-1)->where('username','LIKE',"%".$request->search."%")->get();
       

       }else{
        $order=DB::table('order')->where('status','<>',-1)->where('status',$request->trangthai)->where('username','LIKE',"%".$request->search."%")->get();
        
       }$list=array();
        foreach($order as $key){

            $temp=DB::table('order_details')->where('order_id',$key->order_id)->first();

              $user=DB::table('users')->where('users_id',$key->users_id)->first();


              $room=DB::table('room')->where('room_id',$temp->room_id)->first();
            
              $list[]=[
                'id'=>$key->order_id,
                'name'=>$user->name,
                'phong'=>$room->room_name,
                'deposit'=>$key->deposit,
                'tongtien'=>$key->total,
                'ngaynhan'=>$key->dayat,
                'ngaytra'=>$key->dayout,
                'tinhtrang'=>$key->status,
             
            ];
        }
        $viewData=[
            'sttse'=>$st,
        ];

        return view('Admin.order.list',$viewData)->with('list',$list);
  }
    function huy($id){
        DB::table('order')->where('order_id',$id)->update([
            'status'=>0,
            
        ]);
        return redirect('/admin/manage-order');
    }
}
