<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiMiddleware
{
    public function handle(Request $Request, Closure $Next)
    {
        //check
        

        //all are ok, next...
        return $Next($Request);
    }
}
