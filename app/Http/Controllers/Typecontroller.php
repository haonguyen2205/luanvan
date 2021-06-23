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

class Typecontroller extends Controller
{
    //
    public function showPageAdd()
    {
        return view('admin.typeroom.add');
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
            $type->save();
            Session::put('msg','Thêm thành công');
            return Redirect::to('/list-type');
        }       
    }


    public function listType()
    {
        $list= type::all();
        $manager = view('Admin.typeroom.list')->with('listType', $list);
        return view('admin_layout')->with('Admin.typeroom.list', $manager);
    }

    public function deleteType($id)

    {
        $room=new room();
        // thêm model room vào
        $result = $room->where('type_id', $id)->exists();

        if($result) {
            Session::put('msg','Loại phòng đang có phòng !');
            return Redirect::to('/list-type');
        } else {
            type::where('type_id', $id)->delete();
            Session::put('msg','Xóa thành công');
            return Redirect::to('/list-type');
        }
        
    }

    public function inactiveType($id) 
    {
        type::where('type_id',$id)->update(['status'=> 1]);
        return Redirect::to('/list-type');
    }

    public function activeType($id) 
    {
        DB::table('type')->where('type_id',$id)->update(['status' => 0]);
        return Redirect::to('/list-type');
    }

    public function showPageEdit($id)
    {
        $edit = type::where('type_id', $id)->get();
        $manager = view('admin.typeroom.edit')->with('edittype', $edit);
        return view('admin_layout')->with('admin.typeroom.edit', $manager);
    }

    public function update(Request $request, $id)
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
        else{
            $type->save();
            Session::put('msg','Cập nhật thành công');
            return Redirect::to('/list-type');
        }
        
    }
}
