<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Card;
use Illuminate\Http\Request;


class CardMiddleware
{
    public function handle(Request $Request, Closure $Next)
    {
        //check Card
        $Card = Card::find($Request->route('idCard'));

        if( !$Card )
        {
            return Response::json(['error' => 'Card not found!'], 404);
        }

        //save Card in Request
        $Request->merge(['Card' => $Card]);

        //all are ok, next...
        return $Next($Request);
    }
}
