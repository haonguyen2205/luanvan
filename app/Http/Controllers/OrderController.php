<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Models\type; 
use App\Models\room;
use App\Models\image;
use App\Models\order_detail;
use App\Models\order;


class OrderController extends Controller
{
    //
    function add_order_page(request $request)
    {
        $type=type::orderBy('type_id', 'asc')->get();
        //$room=room::orderBy('type_id','desc')->where('type_id',$type_name)->get();

        return view("admin.order.add_order")->with('type_room',$type);
    }

    public function findroomName(Request $request)
    {
        //$request->id here is the id of our chosen option id
        $data=room::select('room_name','type_id')->where('type_id',$request->id)->take(50)->get();
        return response()->json($data);//then sent this data to ajax success 
	}

    public function findPrice(Request $request)
    {
		//laasy ra giá của phòng nếu phù hợp vs id của phòng
		$p=room::select('room_price')->where('rooom_id',$request->id)->first();
		
    	return response()->json($p);
	}

//-------------
    function order_by_admin(){
        return view("admin.order.list");
    }
    function add_order_by_admin(){
        $order=new order();
        $order_detail=new order_detail();
    }
    
}
