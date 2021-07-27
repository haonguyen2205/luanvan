<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\tintuc;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class NewController extends Controller
{ function news()
    {
        $new = tintuc::all();
        $listcat = category::orderBy('stt','ASC')->get();
        return view('layout.news')->with('showPageNew', $new)->with('showPageCat',$listcat);
       //return Redirect::to();
    }
    function newsearch(Request $request){
        $list = tintuc::where('new_name','LIKE',"%".$request->search."%")->get();
        $manager = view('Admin.news.list-new')->with('listNew', $list);
        return view('admin_layout')->with('Admin.news.list-new', $manager);
     
    }
    function newcat($id){
        $new=tintuc::where('cat_id',$id)->get();
        $listcat = category::orderBy('stt','ASC')->get();
        return view('layout.newcat')->with('showPageNew', $new)->with('showPageCat',$listcat);
        
    }
    function listNew()
    {
        $list = tintuc::all();
        $manager = view('Admin.news.list-new')->with('listNew', $list);
        return view('admin_layout')->with('Admin.news.list-new', $manager);
    }

    public function showPageAddNew()
    {
        $catName = category::orderBy('cat_id', 'asc')->get(); //lấy id của danh mục
        $listcat = category::all();
        
        return view('Admin.news.add-new')->with('catName', $catName)->with('listcat',$listcat);
    }
    function postAddNew(Request $request){
        $data = [
            'new_name'=>$request->tentintuc,
            'new_content'=>$request->noidung,
            'date_post'=>Carbon::now()->toDateString(),
            'cat_id'=>$request->theloai,
        ];
        $news=tintuc::insertGetId($data);
        if($request->image){
            DB::table('new')->where('new_id' ,$news)->update([
                'new_image'=>$request->image->getClientOriginalName()]);
            $image = $request->file('image');
            $storedPath = $image->move('images', $image->getClientOriginalName());
            }
       
         Session::put('addtintuc','Thêm thành công');
        return Redirect::to('list-new');
        
    }
    function delete($id){
        $new=tintuc::find($id);
        $new->delete();
        return Redirect::to('list-new');
    }
    function edit($id){
        $new=tintuc::find($id);
        $listcat = category::all();

        return view('Admin.news.edit-new')->with('new', $new)->with('listcat',$listcat);
    }
    function postedit(Request $request){
       
       $new=tintuc::find($request->id);
       $new->new_name=$request->tentintuc;
       $new->new_content=$request->noidung;
       if($request->image){
         $new->new_image=$request->image->getClientOriginalName();
        $image = $request->file('image');
        $storedPath = $image->move('images', $image->getClientOriginalName());
       }
       $new->cat_id=$request->theloai;
       $new->save();
       
      
       return Redirect::to('list-new');
    }
}

