<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //route web /
    public function index()
    {
        return view('test');
    }
}
