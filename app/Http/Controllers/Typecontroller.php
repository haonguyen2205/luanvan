<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Validator; // quản lý lỗi

//các models
use App\Models\type; 
use App\Models\room;
use App\Models\utility;
class Typecontroller extends Controller
{
    //
    public function showPageAdd()
    { 
        $list =DB::Table('utility')->get();
        return view('admin.typeroom.add')->with('utility',$list);
    }

    public function addTypeAction(Request $request)
    {
        $type = new Type();
        $type->type_name =$request->input('typeName');
        $type->status= $request->input('typeStatus');
        if($request->typeName==null||$request->typeStatus == null)
        {
            //Session::forget('th_err');
            
            $this->validate($request,[
                'typeName'=>'bail|required|min:3|max:50',
                'typeStatus'=>'bail|required',
                   
            ],[
                'typeName.required'=>'Tên loại phòng không được để trống',
                'typeName.max'=>'Tên loại phòng không được dài quá 50 kí tự',
                'typeName.min'=>'Tên loại phòng không được ngán hơn quá 3 kí tự',
                'typeStatus.required'=>'Tài khoản nhân viên không được để trống',
            ]);

    
        }else
        {
            $uti=$request->input('tienich');
            $type->save();
            
            foreach ($uti as $key => $t)
            {
                $data = array();
                $data['type_id'] = $type->type_id;
                $data['utility_id'] = $t;
                $data['quality'] = 1;
                DB::table('type_utility')->insert($data);
            }
            $type->save();
            Session::put('mes_create','Thêm loại phòng thành công');
            return Redirect::to('/list-type');
        }       
    }


    public function listType(request $request)
    {
        $key = $request->input('search_type');
        if($key !=null)
        {
            $list= type::where('type_name', 'like','%'.$key.'%')->where('status',1)->paginate(5);
            $manager = view('Admin.typeroom.list')->with('listType', $list);
            return view('admin_layout')->with('Admin.typeroom.list', $manager);
        }
        else
        {
            // where('status',0)->
            $list= type::where('status',1)->paginate(5);
            $manager = view('Admin.typeroom.list')->with('listType', $list);
            return view('admin_layout')->with('Admin.typeroom.list', $manager);
        }
    }

    public function list_type_block()
    {
        $list= type::where('status',0)->paginate(5);
        $manager = view('Admin.typeroom.list_block')->with('listType', $list);
        return view('admin_layout')->with('Admin.typeroom.list_block', $manager);
    }

    public function deleteType($id)
    {
        $room=new room();
        // thêm model room vào
        $result = $room->where('type_id', $id)->exists();

        if($result) {
            Session::put('mes_delete','Loại phòng đang có phòng !');
            return Redirect::to('/list-type');
        } 
        else {

            DB::table('type_utility')->where('type_id',$id)->delete();
            type::where('type_id', $id)->delete();
            Session::put('mes_delete','Xóa thành công');
            return Redirect::to('/list-type');
         }
        
    }

    public function inactiveType($id) 
    {
        DB::table('category_room')->where('type_id',$id)->update(['status' => 1]);
        session::put('mes_act','đã phục hồi loại phòng');
        return Redirect::to('/list-type');
    }

    public function activeType($id)     
    { 
        $room=new room();
        
        // timf kieesm trong room co id cua loai phong ko
        $result = $room->where('type_id', $id)->exists();
        if($result)
        {
            Session::put('mes_inact','đã có phòng thuộc loại được sử dụng !');
            return Redirect::to('/list-type');
        }
        else
        {
            type::where('type_id',$id)->update(['status'=> 0]);
            session::put('mes_inact','đã xóa loại phòng');
            return Redirect::to('/list-type');
        }
    }

    public function showPageEdit($id)
    {
        $tu=DB::table('type_utility')->where('type_id', $id)->Get();
        $edit = type::where('type_id', $id)->get();
        $manager = view('admin.typeroom.edit')->with('edittype', $edit)->with('utility', $tu);
        return view('admin_layout')->with('admin.typeroom.edit', $manager);
    }

    public function update_cat(Request $request, $id)
    {

        $type =type::find($id);
        $type->type_name   = $request->input('typeName');
        $type->status    = $request->input('typeStatus');

       
        if($request->typeName==null||$request->typeStatus == null)
        {
            $this->validate($request,[
                'typeName'=>'bail|required|min:3|max:50',
                'typeStatus'=>'bail|required', 
            ],[
                'typeName.required'=>'Tên loại phòng không được để trống',
                'typeName.max'=>'Tên loại phòng không được dài quá 50 kí tự',
                'typeName.min'=>'Tên loại phòng không được ngán hơn quá 3 kí tự',
                'typeStatus.required'=>'Tài khoản nhân viên không được để trống',
            ]);

    
        }
        else 
        {
            $type->save();
            Session::put('mes_update','Cập nhật thành công');
            return Redirect::to('/list-type');
        }
        
    }
}
