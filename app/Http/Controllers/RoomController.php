<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreEventRequest;
use App\Services\EventService;
use Illuminate\Support\Facades\DB;
use Validator;

use Carbon\Carbon;

use App\Models\type; 
use App\Models\room;
use App\Models\image;
use App\Models\order_detail;
use App\Models\order;
use Input;

class RoomController extends Controller
{

    public function showPageAdd()
    {
        $typeName = type::orderBy('type_id', 'asc')->get(); //lấy id của loại phòng 
        return view('Admin.room.add')->with('typeName', $typeName);
    }

    //tìm kiến phòng
    public function search(Request $request)
    {
        $key = $request->keyword;
        if($key=='')
        {
            $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')->leftjoin('image','image.room_id', '=', 'room.room_id')
            ->orderBy('room.type_id', 'desc')->get();
            return view('Admin.room.list')->with('listRoom', $list);
        }
        else
        {
            $result = room::join('category_room','category_room.type_id', '=', 'room.type_id')->leftjoin('image','image.room_id', '=', 'room.room_id')
            ->orderBy('room.type_id', 'desc')->where('room_name', 'like', '%'.$key.'%')->get();      
            return view('Admin.room.search')->with('result', $result);
        }
       
    }

    //thêm phòng admin
    public function addRoomAction(Request $request)
    {
            $type=type::all();
            $listroom=room::all();
            $room =new room();     
            $room->room_name        = $request->input('name');
            //$images->room_image     = $request->input('image');
            $room->type_id          = $request->input('type');
            $room->service_id       = 1;
            $room->room_description = $request->input('description');
            $room->quality          = 1; // số lượng phòng
            $room->room_price       = $request->input('price');
            $room->room_status      = $request->input('status');
            $count=0;

            foreach ($listroom as $r)  // lấy số phòng đã tạo của loại phòng đã chọn
            {
                if($r->type_id == $request->input('type')) 
                {
                    $count+=1; 
                } 
            }
            // 
            foreach($type as $t)
            {
                if($t->type_id == $request->input('type')) 
                {
                    if($t->quality > $count) 
                    {
                        if($request->hasFile('image')) 
                        {
                            $image= $request->file('image');
                                // $imageroom=new image();
                            $get_name_image = $image->getClientOriginalName();
                            $name_image     = current(explode('.',$get_name_image));
                            $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();// đuổi mở rộng của ảnh
                            $image->move('public/upload/rooms',$new_image);
                            $room->image=$new_image;
                            $room->save();
                            Session::put('mes_createRoom','Thêm phòng thành công');
                            return Redirect::to('/list-room');
                            
                        }
                        else
                        {
                            Session::put('mes_create_fail','giá trị số không được nhỏ hơn không');
                            return Redirect::to('/add-room');
                        }
                    }
                    else    
                    {
                        Session::put('mes_create_fail','loại phòng này đã đạt số lượng tối đa vui lòng tạo phòng có loại phòng khác ');
                        return Redirect::to('/add-room');
                    }
                }
                
            }

            
    }

    public function listRoom(Request $request)
    {
        $key = $request->input('keyword');
        if($key!='')
        {
            //->leftjoin('image','image.room_id', '=', 'room.room_id')
            $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')
           ->where('room_name', 'like','%'.$key.'%')->Where('room_status',1)
           ->orwhere('category_room.type_name', 'like','%'.$key.'%')->where('room_status',1)
            ->orderBy('room.type_id', 'desc')->paginate(5);
            return view('Admin.room.list')->with('listRoom', $list);
        }
        else
        {
            $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')
                ->orderBy('room.type_id', 'desc')->where('room_status',1)->paginate(5);
                // ->leftjoin('image','image.room_id', '=', 'room.room_id')
                
            $image= image::join('room','room.room_id', '=', 'image.room_id')->orderBy('image.room_id', 'desc')->get();
            return view('Admin.room.list')->with('listRoom', $list)->with('imageroom',$image);
        }
    }

    public function list_room_block()
    {
        $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')
        ->where('room_status',0)
            ->orderBy('room.type_id', 'desc')->paginate(5);

        $image= image::join('room','room.room_id', '=', 'image.room_id')->orderBy('image.room_id', 'desc')->get();
        return view('Admin.room.list_room_block')->with('listRoom', $list)->with('imageroom',$image);
    }

    public function inactiveRoom($id)
    {    
        room::where('room_id',$id)->update(['room_status' => 1]);
        return Redirect::to('/list-room');
    }

    public function activeRoom($id)
    {
        $order_detail= new order_detail();
        $result = $order_detail->where('room_id',$id)->exists();
        if($result)
        {
            session::put('mes_act_room',"phòng có tồn tại trong đơn đặt");
            return redirect::To('/list-room');
        }
        else
        {
            room::where('room_id',$id)->update(['room_status' => 0]);
            return Redirect::to('/list-room');
        }
    }

    public function showPageEdit($id)
    {
        $type    = type::orderBy('type_id', 'asc')->get();
        $room    = room::join('category_room','category_room.type_id', '=', 'room.type_id')->where('room_id', $id)->get();
        $images  =image::where('room_id', $id)->get();
        $detail=DB::table('order_details')->where('room_id',$id)->exists();
        
        if($detail)
        {
            Session::put('mes_update_fail','phòng đang có người đặt không được phép sửa');
            return Redirect::to('/list-room');
        }else
        {
            $manager = view('admin.room.edit')
            ->with('editRoom', $room)
            ->with('editType', $type)
            ->with('imageroom',$images);
            return view('admin_layout')->with('admin.room.edit', $manager);
        }
        
    }

    public function updateRoom(Request $request, $id)
    {
        $room=room::find($id);
        $images=image::find($id);
        

        $room->room_name        = $request->input('name');
        // $images->room_image     = $request->input('image');
        $room->type_id          = $request->input('type');;
        $room->room_description = $request->input('description');
        // $room->quality          = $request->input('amount');
        $room->room_price       = $request->input('price');

        $order=order::where('status',0)->orwhere('status',4)->Get();

        $detail=DB::table('order_details')->where('room_id',$id)->exists();
        
        if($detail)
        {
            Session::put('mes_update_fail','cập nhật phòng Không thành công');
            return Redirect::to('/list-room');
        }
        else{
            if($request->hasFile('image')) {
                $image = $request->file('image');
                if($image) {
                    $get_name_image = $image->getClientOriginalName(); //lay ten hình
                    $name_image     = current(explode('.',$get_name_image));
                    $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension(); //xem phải hinhf khong
                    $image->move('public/upload/rooms',$new_image);
                    $room->image = $new_image;
                    $room->save();
                    Session::put('mes_updateRoom','cập nhật phòng thành công');
                    return Redirect::to('/list-room');
                }
            }
            else if($request->input('image')=="")
            {
                $room->save();
                Session::put('mes_updateRoom','cập nhật phòng thành công');
                    return Redirect::to('/list-room');
            }
            else{
                Session::put('mes_update_fail','cập nhật phòng Không thành công');
                    return Redirect::to('/list-room');
            }
        }
        
    }

    public function deleteRoom($id) 
    {
        $result = order_detail::where('order_detail_id', $id)->exists();

        if($result) 
        {
            Session::put('msg',' đã có đơn đặt phòng không thể xóa !');
            return Redirect::to('/list-room');
        } else {
            room::where('room_id', $id)->delete();
            Session::put('msg','Xóa thành công');
            return Redirect::to('/list-room');
        }
    }

    // code trang giao diện chính ws

       // trang này của giao diện chính
    function rooms() 
    {
        //$room = room::where('room_status', '1')->orderBy('room_id','asc')->get();
        $room = room::where('room_status', '1')
        ->orderBy('room.room_id', 'desc')->paginate(6);
        return view('/layout.rooms')->with('showPageRoom', $room);
    }
    
    public function check_avaliable(request $request)
    {
        $mytime= date("Y-m-d");
        $star= carbon::parse($request->input('start_time'))->format('Y-m-d');
        $end= carbon::parse($request->input('end_time'))->format('Y-m-d');

        $countroom=0;
        if($star >= $mytime && $end >= $mytime && $end>=$star) {

            $order=order::where('status',3)->where('dayat','<=',$star)->where('dayout','>=',$end) //TH1: ---|.---.|---
            ->orwhere('status',3)->where('dayat','>=',$star)->Where('dayat','<',$end) //TH2: ---.|.---|---
            ->orwhere('status',3)->where('dayat','>=',$star)->Where('dayout','<=',$end) //TH3: ---.|---|.---
            ->orwhere('status',3)->where('dayat','<=',$star)->where('dayout','>',$star)->Where('dayout','<',$end) //TH4: ---|--.--|.---
            ->get();
            $order_detail=array();
            $room =array();
            foreach ($order as $o)
            {
                $order_detail[]=order_detail::where('order_id',$o->order_id)->get();
            }
            
            foreach ($order_detail as $od)
            {
                $room= room::where('room_id','<>',$od[0]->room_id)->get();
                $countroom+=1;
            }
            session::put('startime',$star);
            session::put('endtime',$end);
            return view('/Admin.room.list_empty',compact('room','countroom','star','end'));
        }
        else{
            session::put('mes_saingay',"không duoc dat ngay trong qua khu");
            return redirect::to('/list-empty-room');
        }


        
         
        // $dontrongngay=array();
        // $countroom=0;
        
        
    }

    public function list_empty_room(request $request)
    {
        return view('Admin.room.check_availability');
    }

    public function check_occupied(request $request) // danh sách phòng đang sử dụng trong ngày
    {
        $mytime = date("Y-m-d");
        $order=DB::table('order')->where('status',3)->get();
        $order_detail =order_detail::get();
        $r=array();
        $mytime = date("Y-m-d");

        $order=DB::table('order')->where('status',3)->get();
        $songuoilon=0;
        $sotreem=0;
        foreach($order as $o)
        {  
            if($mytime >= $o->dayat && $mytime <= $o->dayout)
            {
                $songuoilon =$songuoilon+ $o->adults;
                $sotreem=$sotreem+ $o->children;
            }

        }
        foreach($order as $o)
        {  
            if($mytime >= $o->dayat && $mytime <= $o->dayout)
            {
                foreach($order_detail as $od)
                {
                    if($o->order_id==$od->order_id)
                    {
                        $r[]=room::where('room_id',$od->room_id)
                        ->first();
                    }
                }

            }

        }
        return view('Admin.room.list_of_occupied',compact('r','songuoilon','sotreem'));
    }
    

}
