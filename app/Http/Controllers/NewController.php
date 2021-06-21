<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\tintuc;
use Illuminate\Http\Request;

class NewController extends Controller
{
    function news()
    {
        $new = tintuc::all();
        $listcat = category::all();
        return view('layout.news')->with('showPageNew', $new)->with('showPageCat',$listcat);
       //return Redirect::to();
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
        return view('Admin.news.add-new')->with('catName', $catName);
    }
}

