<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function show_page_profile()
    {
        return view('profile.profile');
    }
}
