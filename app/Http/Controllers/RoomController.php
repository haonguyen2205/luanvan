<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\type; 
use App\Models\room;
use App\Models\image;
use App\Models\order_detail;
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
            foreach ($type as $t) {
                if($t->type_id == $request->input('type')) {
                    $count=$count+1;
                }
            }
            if($count>4) // kiểm tra số lượng phòng vượt tối da của loại phòng chưa
            {
                Session::put('mes_create_fail','không tạo được phòng thuộc loại phòng này');
                return Redirect::to('/add-room');
            }else if($request->input('price') >10000)

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

    public function listRoom(Request $request)
    {
        $key = $request->input('keyword');
        if($key!='')
        {
            $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')->leftjoin('image','image.room_id', '=', 'room.room_id')
           ->where('room_name', 'like','%'.$key.'%')
            ->orderBy('room.type_id', 'desc')->paginate(5);
            return view('Admin.room.list')->with('listRoom', $list);
        }
        else
        {
            $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')
                ->orderBy('room.type_id', 'desc')->paginate(5);
                // ->leftjoin('image','image.room_id', '=', 'room.room_id')
                // ->where('room_status',1)
            $image= image::join('room','room.room_id', '=', 'image.room_id')->orderBy('image.room_id', 'desc')->get();
            return view('Admin.room.list')->with('listRoom', $list)->with('imageroom',$image);
        }
    }

    public function list_room_block()
    {
        $list = room::join('category_room','category_room.type_id', '=', 'room.type_id')->leftjoin('image','image.room_id', '=', 'room.room_id')
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

        $detail=DB::table('order_detail')->where('room_id',$id)->exists();
        
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
       
       public function checkRoom(request $request)
       {
            $data=$request->input('dayat');
            $data1=$request->input('dayout');

            $room=room::wherebetween('day');

            return view('/layout.check_room');
       }
}
