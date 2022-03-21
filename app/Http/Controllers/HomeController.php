<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    //route web /
    public function index()
    {
        return view('home');
    }
}
