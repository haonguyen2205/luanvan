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
        
        $list=DB::table('order')->where('status','<>',-1)->paginate(7);
        $room=DB::table('room')->get();
        
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));

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
        $ul=DB::table('utility')->get();
        $tiendichvu =0;
        foreach($ser as $s){
            foreach($u as $k){
                if($k->service_id == $s->service_id){
            $tiendichvu = $tiendichvu + $k->quantity*$s->service_price;}
        }}
        $tiendenbu=0;
        
        $denbu= DB::table('o_u')->where('order_id',$id)->get();
        foreach($denbu as $d){
            foreach($ul as $u){
                if($u->utility_id == $d->u_id){
                    $tiendenbu = $tiendenbu + $u->utility_price;
                }
            
            
        }}
        $i=DB::table('service_detail')->where('order_id',$order->order_id)->get();
        $cuoituan = $order->cuoituan;
        $ngayle=$order->ngayle;
        $soct=0;
        $sonl =0;
            $viewData=[
            'hoadon' =>$id,
            'tenkhachhang'=>$user->name,
            'hoten'=>$order->hoten,
            'cmnd' =>$order->CMND,
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
            'status'=>$order->status,
            'ul'=>$ul,
            'tiendenbu'=>$tiendenbu,
            'denbu'=>$denbu,
            'cuoituan'=>$cuoituan,
            'ngayle'=>$ngayle,
            'sonl'=>$sonl,
            'soct'=>$soct
        ];
        return view('Admin.order.thanhtoan',$viewData);
    }
    function capnhat(Request $request){
       
        $order= DB::table('order')->where('order_id',$request->id)->first();
        $orderdetail = DB::table('order_details')->where('order_id',$order->order_id)->first();
        $user=DB::table('users')->where('users_id',$order->users_id)->first();
        $so = strtotime($order->dayout) - strtotime($order->dayat);
        $songay = $so/86400 ;
        
        $room= DB::table('room')->where('room_id',$orderdetail->room_id)->first();
        $ser=DB::table('service')->get();
        $tiendichvu =0;
        $id=DB::table('service_detail')->where('order_id',$order->order_id)->first();
        $ul=DB::table('utility')->get();

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
        $tiendenbu=0;
      
        
        foreach($ul as $s){
            $name=$s->utility_id;
            if($request->$name){
                DB::table('o_u')->insert([
                    'order_id'=>$request->id,
                    'u_id'=>$request->$name                
                ]);
            }
        }

        $cuoituan =0;
        $ngayle =0;
        $sonl=0;
        $soct=0;
        if($request->cuoituan && $request->ngayle){
            $cuoituan = ($room->room_price * 0.2)*$request->cuoituan;
            $ngayle = ($room->room_price *0.3)*$request->ngayle;
            $sonl=$request->ngayle;
            $soct=$request->cuoituan;
            DB::table('order')->where('order_id',$request->id)->update([
                'cuoituan'=>$cuoituan,
                'ngayle'=>$ngayle
            ]);
        }
        if($request->cuoituan){
            $cuoituan = ($room->room_price * 0.2)*$request->cuoituan;
           
            $soct=$request->cuoituan;
            DB::table('order')->where('order_id',$request->id)->update([
                'cuoituan'=>$cuoituan,
               
            ]);
        }
        if( $request->ngayle){
           
            $ngayle = ($room->room_price *0.3)*$request->ngayle;
            $sonl=$request->ngayle;
           
            DB::table('order')->where('order_id',$request->id)->update([
                
                'ngayle'=>$ngayle
            ]);
        }

        // if($request->phuthule){
        //     $order->total = $order->total + $order->total*0.3;
        //     DB::table('order')->where('order_id',$request->id)->update([
        //         'total'=>$order->total
        //     ]);
        // }



        $denbu= DB::table('o_u')->where('order_id',$request->id)->get();
    
        foreach($denbu as $k){
            foreach($ul as $u){
                if($u->utility_id == $k->u_id){
                    $tiendenbu=$tiendenbu + $u->utility_price;
                }
            }
        }
        
        $i=DB::table('service_detail')->where('order_id',$order->order_id)->get();
        $viewData=[
            'hoadon' =>$request->id,
            'tenkhachhang'=>$user->name,
            'hoten'=>$order->hoten,
            'cmnd'=>$order->CMND,
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
            'status'=>$order->status,
            'ul'=>$ul,
            'tiendenbu' =>$tiendenbu,
            'cuoituan'=>$cuoituan,
            'ngayle'=>$ngayle,
            'sonl'=>$sonl,
            'soct'=>$soct
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
        $list=DB::table('order')->where('status',-1)->paginate(7);
        $room=DB::table('room')->get();
        
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.dsxoa',compact('list','room',$list,$room));
      
    }
    function timkiem(Request $request)
    {
      $st=$request->trangthai;
       if($request->trangthai == -2){

        $list=DB::table('order')->where('status','<>',-1)->where('hoten','LIKE',"%".$request->search."%")->paginate(7);
       

       }else{
        $list=DB::table('order')->where('status','<>',-1)->where('status',$request->trangthai)->where('hoten','LIKE',"%".$request->search."%")->paginate(7);
        
       }
              $room=DB::table('room')->get();
            
        $viewData=[
            'sttse'=>$st,
        ];

        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));
  }
    function huy($id){
        DB::table('order')->where('order_id',$id)->update([
            'status'=>0,
            
        ]);
        return redirect('/admin/manage-order');
    }
    function dshuy(){
        
        $list=DB::table('order')->where('status',0)->paginate(7);
        $room=DB::table('room')->GET();
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));

    }
    function dscho(){
        
        $list=DB::table('order')->where('status',1)->paginate(7);
        $room=DB::table('room')->GET();
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));

    }
    function dsda(){
        
        $list=DB::table('order')->where('status',2)->paginate(7);
        $room=DB::table('room')->GET();
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));

    }
    function dslay(){
        
        $list=DB::table('order')->where('status',3)->paginate(7);
        $room=DB::table('room')->GET();
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));

    }
    function dsdone(){
        
        $list=DB::table('order')->where('status',4)->paginate(7);
        $room=DB::table('room')->GET();
        $viewData=[
            'sttse'=>-1,
        ];
      
        return view('Admin.order.list',$viewData,compact('list','room',$list,$room));

    }
}
