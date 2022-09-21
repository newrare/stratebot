<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Response;
use Validator;

class BotController extends Controller
{
    //route web /create/bot
    public function create(): View
    {
        return view('createBot');
    }

    //GET /api/bot
    public function index(): JsonResponse
    {
        //result
        $results = Bot::pluck('id')->toArray();

        //return array of Bot id
        return Response::json($results, 200);
    }


    //POST /api/bot
    public function store(Request $Request): JsonResponse
    {
        //check inputs
        $rules = [
            'name'          => 'required|string|unique:bots|max:100',
            'description'   => 'required|string|max:1000',
            'image'         => 'required|url',
            'boss'          => 'required|boolean'
        ];

        $inputs     = $Request->all();
        $validator  = Validator::make($inputs, $rules);

        if( $validator->fails() )
        {
            return Response::json(['error' => $validator->errors()->first()], 400);
        }

        //create Bot by fillable Model and save it
        $Bot = Bot::create($inputs);

        //return array of Bot
        return Response::json($Bot->toArray(), 201);
    }

    //GET /bot/{id}
    public function show(Request $Request): JsonResponse
    {
        //get Bot
        $Bot = $Request->Bot;

        //return array of Bot
        return Response::json($Bot->toArray(), 200);
    }

    //PUT /bot/{id}
    public function update(Request $Request): JsonResponse
    {
        //get Bot
        $Bot = $Request->Bot;

        //create rules (is set only when input is defined)
        $rules = [];

        if( $Request->has('name') and $Bot->name != $Request->name )
        {
            $rules['name'] = 'required|string|unique:bots|max:100';
        }

        if( $Request->has('description')    ) { $rules['description']   = 'required|string|max:1000';   }
        if( $Request->has('image')          ) { $rules['image']         = 'required|url';               }
        if( $Request->has('boss')           ) { $rules['boss']          = 'required|boolean';           }

        //check inputs
        $inputs     = $Request->all();
        $validator  = Validator::make($inputs, $rules);

        if( $validator->fails() )
        {
            return Response::json(['error' => $validator->errors()->first()], 400);
        }

        //update and save Bot
        $Bot->update($inputs);

        //return array of Bot updated
        return Response::json($Bot->toArray(), 200);
    }

    //DELETE /bot/{id}
    public function destroy(Request $Request): JsonResponse
    {
        //get and remove it
        $Bot = $Request->Bot;
        $Bot->delete();

        //result blank JSON
        return Response::json([], 204);
    }
}
