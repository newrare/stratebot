<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JsonMiddleware
{
    public function handle(Request $Request, Closure $Next)
    {
        //check
        if( !$Request->isJson() )
        {
            return new Response(view('error')->with('message', 'API Request must be JSON type!'));
        }

        //all are ok, next...
        return $Next($Request);
    }
}
