<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    function cart()
    {
        return view('layout.cart');
    }
}
