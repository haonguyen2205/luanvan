<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Mail;

use App\Models\type; 
use App\Models\room;

class HomeController extends Controller
{
    function index()
    {
       return view('layout.home');
       //return Redirect::to();
    }

    
}
