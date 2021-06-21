<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact()
    {
       return view('layout.contact');
       //return Redirect::to();
    }
}

