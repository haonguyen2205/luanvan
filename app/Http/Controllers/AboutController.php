<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function about()
    {
       return view('layout.about-us');
       //return Redirect::to();
    }
}

