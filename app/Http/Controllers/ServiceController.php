<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

use App\Models\service;


class ServiceController extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            Redirect::to('admin');
        }
        else
        {
            Redirect::to('login')->send();
        }
    }

    public function list_service()
    {
        $this->AuthLogin();
        $sv=service::get();
        $manager = view('Admin.service.list')->with('sevice', $sv);
        return view('admin_layout')->with('Admin.service.list', $manager);
    }

    public function show_page_add()
    {
        $this->AuthLogin();
        return view('Admin.service.add');
    }

    public function add_service(request $request)
    {
        $new=DB::table('service_detail')->distinct()->select('order_id')->get();
      
        $sv= new service();

        $sv->service_name= $request->input('sv_name1');
        $sv->name= $request->input('sv_name2');
        $sv->service_price=$request->input('sv_price');

        $sv->save();
        $mmm=DB::table('service')->where('service_name',$request->input('sv_name1'))->first();
        foreach($new as $n){
            DB::table('service_detail')->insert([
                'order_id'=>$n->order_id,
                'service_id'=>$mmm->service_id,
                'quantity'=>0
            ]);
        }
        session::put('mes_create_sv',"thêm dịch vụ thành công");
        return redirect::To('/list-service');
    }

    public function show_page_edit($id)
    {
        $this->AuthLogin();
        $sv=service::where('service_id',$id)->Get();

        $manager = view('admin.service.edit')->with('editsv', $sv);
        return view('admin_layout')->with('admin.service.edit', $manager);
    }

    public function update_service(request $request,$id)
    {
        $sv=service::find($id);

        $sv->service_name=$request->input('sv_name1');
        $sv->name=$request->input('sv_name2');
        $sv->service_price=$request->input('sv_price');

        $sv->save();
        session::put('mes_update_sv',"cập nhật dịch vụ thành công");
        return redirect::To('/list-service');
    }

    public function delete_service($id)
    {
        $sv= service::find($id);
        $sv->delete();

        session::put('mes_delete_sv',"xóa dịch vụ thành công");
        return redirect::To('/list-service');
    }
}
