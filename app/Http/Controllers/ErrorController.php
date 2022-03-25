<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    //route web /error
    public function index()
    {
        return view('error');
    }
}
