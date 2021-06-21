<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
//-------------
    public function findroomName(Request $request){

		// $type_id=$request->id;
	    // $room_name=room::where('type_id',$type_id)->with('roomname')->get();

        //$request->id here is the id of our chosen option id
        $data=room::select('room_name','type_id')->where('type_id',$request->id)->take(50)->get();
        return response()->json($data);//then sent this data to ajax success
        // return response()->json(['roomname'=>$room_name]);
	}

    public function findPrice(Request $request){
	
		//it will get price if its id match with product id
		$p=room::select('room_price')->where('id',$request->id)->first();
		
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
