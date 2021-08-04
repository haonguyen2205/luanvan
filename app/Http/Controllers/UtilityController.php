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
        $uti = array();
        $uti['utility_id'] = $request->uti_id;
        $uti['utility_price']=$request->uti_price;
        $uti['utility_name'] = $request->uti_name;
        $uti['status'] = 1;


        // print_r($uti); exit;
        $this->validate($request,[
            'uti_id'=>'bail|required|min:2|max:5',
            'uti_name'=>'bail|required|min:2|max:30',
            
            
            
        ],[
            'uti_id.required'=>' Mã tiện ích không được để trống',
            'uti_id.max'=>'Mã tiện ích không được dài quá 5 kí tự',
            'uti_id.min'=>'Mã tiện ích không được ngắn hơn 2 kí tự',
            'uti_name.required'=>'tên tiện ích không được để trống',
            'uti_name.min'=>'tên tiện ích không được ngắn hơn 2 kí tự',
            'uti_name.max'=>'tên tiện ích không được dài hơn 30 kí tự',
            
        ]);

        
        DB::table('utility')->insert($uti);
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
        $uti['utility_price']=$request->input('uti_price');
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
        if($request->input('uti_image')=='')
        {
            DB::table('utility')->where('utility_id',$id)->update($uti);
            Session::put('mes_update_uti','cập nhật tên tiện nghi thành công');
            return redirect::to('/list-uti');
        }
        else 
        {
            if($request->hasFile('uti_image')) 
            {
                $image = $request->file('uti_image');
                if($image) 
                {
                    $get_name_image = $image->getClientOriginalName(); //lay ten hình
                    $name_image     = current(explode('.',$get_name_image));
                    $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension(); //xem phải hinhf khong
                    $image->move('public/upload/utility',$new_image);

                    $uti['utility_image']=$new_image;

                    DB::table('utility')->where('utility_id',$id)->update($uti);
                    Session::put('mes_update_uti','cập nhật thành công');
                    return redirect::to('/list-uti');
                }
            }
            else{
                Session::put('mes_fails','không phải file hình');
                return redirect::to('/list-uti');
            }
        }
        
        
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
