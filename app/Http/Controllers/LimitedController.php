<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LimitedController extends Controller
{
    public function index(){
    	return view('limited');
    }

    public function index2()
    {
      
        return view('index');
    }
}
