<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Bot;
use Illuminate\Http\Request;

class BotMiddleware
{
    public function handle(Request $Request, Closure $Next)
    {
        //check Bot
        $Bot = Bot::find($Request->route('idBot'));

        if( null === $Bot )
        {
            return Response::json(['error' => 'Bot not found!'], 404);
        }

        //save Bot in Request
        $Request->merge(['Bot' => $Bot]);

        //all are ok, next...
        return $Next($Request);
    }
}
