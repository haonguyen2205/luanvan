<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


use App\Models\utility;

class UtilityController extends Controller
{
    //
    public function ShowPageAdd_uti()
    {
        return view('Admin.utility.add');
    }

    public function Add_uti(request $request)
    {
        $uti = new utility();

        $this->validate($request,[
            'uti_id'=>'bail|required|min:1|max:5',
            'uti_name'=>'bail|required|min:2|max:100',
            
            
        ],[
            'uti_id.required'=>' Mã tiện ích không được để trống',
            'uti_id.max'=>'Mã tiện ích không được dài quá 5 kí tự',
            'uti_name.required'=>'tên tiện ích không được để trống',
            'uti_name.min'=>'tên tiện ích không được ngắn hơn 3 kí tự',
            'uti_name.max'=>'tên tiện ích không được dài hơn 100 kí tự',
        ]);

        $uti->utility_id = $request->input('uti_id');
        $uti->utility_name = $request->input('uti_name');
        $uti->save();
        Session::put('mes_create_uti','thêm tiện ích thành công');
        return Redirect::to('/list-uti');
    }

    public function list_uti(Request $request)
    {
        $key=$request->input('search_uti');

        if($key != null)
        {
            $uti=DB::table('utility')->where('status',1)->where('utility_name','like', '%'.$key.'%')->Get();
            $list_uti= view('Admin.utility.list')->with('list_uti',$uti);
            return view('admin_layout')->with('Admin.utility.list',$list_uti);
        }
        else
        {
            $uti=DB::table('utility')->where('status',1)->Get();
            $list_uti= view('Admin.utility.list')->with('list_uti',$uti);
            return view('admin_layout')->with('Admin.utility.list',$list_uti);
        }
    }

    public function list_uti_block(request $request){
        $key=$request->input('search_uti');

        if($key != null)
        {
            $uti=DB::table('utility')->where('status',0)->where('utility_name','like', '%'.$key.'%')->Get();
            $list_uti= view('Admin.utility.list')->with('list_uti',$uti);
            return view('admin_layout')->with('Admin.utility.list',$list_uti);
        }
        else
        {
            $uti=DB::table('utility')->where('status',0)->Get();
            $list_uti= view('Admin.utility.list')->with('list_uti',$uti);
            return view('admin_layout')->with('Admin.utility.list',$list_uti);
        }
    }

    public function showPageEdit_uti($id)
    {
        $edit = DB::table('utility')->where('utility_id', $id)->get();
        $manager = view('Admin.utility.edit')->with('edit_uti', $edit);
        return view('admin_layout')->with('Admin.utility.edit', $manager);
    }

    public function update_uti($id,request $request)
    {
        $uti['utility_name'] = $request->input('uti_name');

        $this->validate($request,[
            'uti_id'=>'bail|required|min:1|max:5',
            'uti_id'=>'bail|required|min:2|max:100',
        ],[
            'uti_id.required'=>' Mã tiện ích không được để trống',
            'uti_id.max'=>'Mã tiện ích không được dài quá 5 kí tự',
            'uti_name.required'=>'tên tiện ích không được để trống',
            'uti_name.min'=>'tên tiện ích không được ngắn hơn 3 kí tự',
            'uti_name.max'=>'tên tiện ích không được dài hơn 100 kí tự',
        ]);
        DB::table('utility')->where('utility_id',$id)->update($uti);
        Session::put('mes_update_uti','cập nhật tiện ích thành công');
        return redirect::to('/list-uti');
    }

    public function delete_uti($id) 
    {
        // $uti = DB::table('utility')->where('utility_id',$id);
        $type_utility=DB::table('type_utility')->get();
        foreach ($type_utility as $TU)
        {
            if($TU->utility_id == $id)
            {
                session::put('mes_delete_uti','tiện ích này đang được sử dụng');
                return Redirect::to('/list-uti'); 
            }
            else
            {
                DB::table('utility')->where('utility_id',$id)->delete();
                session::put('mes_delete_uti','xóa tiện ích thành công');
                return Redirect::to('/list-uti');
            }
        }
        session::put('mes_delete_uti','xóa tiện ích thất bại');
        return Redirect::to('/list-uti');
    }

}
