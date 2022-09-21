<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Response;
use Validator;

class CardController extends Controller
{
    //route web /create/card
    public function create(): View
    {
        return view('createCard');
    }

    //GET /api/card
    public function index(): JsonResponse
    {
        //result
        $results = Card::pluck('id')->toArray();

        //return array of Card id
        return Response::json($results, 200);
    }

    //POST /api/card
    public function store(Request $Request): JsonResponse
    {
        //check inputs
        $rules = [
            'name'          => 'required|string|unique:cards|max:100',
            'description'   => 'required|string|max:1000',
            'move'          => 'required|integer',
            'attack'        => 'required|integer',
            'defense'       => 'required|integer',
            'type'          => 'required|in:water,fire,earth',
            'nemesis'       => 'nullable|json'
        ];

        $inputs     = $Request->all();
        $validator  = Validator::make($inputs, $rules);

        if( $validator->fails())
        {
            return Response::json(['error' => $validator->errors()->first()], 400);
        }

        // create Card by fillable Model and save it
        $Card = Card::create($inputs);

        //return array of Card
        return Response::json($Card->toArray(), 201);
    }

    //GET /card/{id}
    public function show(Request $Request): JsonResponse
    {
        //get Card
        $Card = $Request->Card;

        //return array of Card
        return Response::json($Card->toArray(), 200);
    }

    //PUT /card/{id}
    public function update(Request $Request): JsonResponse
    {
        //get Card
        $Card = $Request->Card;

        //create rules (is set only when input is defined)
        $rules = [];

        if( $Request->has('name') and $Card->name != $Request->name )
        {
            $rules['name'] = 'required|string|unique:cards|max:100';
        }

        if( $Request->has('description') ) { $rules['description']    = 'required|string|max:1000';     }
        if( $Request->has('move')        ) { $rules['move']           = 'required|integer';             }
        if( $Request->has('attack')      ) { $rules['attack']         = 'required|integer';             }
        if( $Request->has('defense')     ) { $rules['defense']        = 'required|integer';             }
        if( $Request->has('type')        ) { $rules['type']           = 'required|in:water,fire,earth'; }
        if( $Request->has('nemesis')     ) { $rules['nemesis']        = 'nullable|json';                }

        //check inputs
        $inputs     = $Request->all();
        $validator  = Validator::make($inputs, $rules);

        if( $validator->fails() )
        {
            return Response::json(['error' => $validator->errors()->first()], 400);
        }

        //pdate and save Card
        $Card->update($inputs);

        //return array of Card updated
        return Response::json($Card->toArray(), 200);
    }

    //DELETE /card/{id}
    public function destroy(Request $Request): JsonResponse
    {
        //get and remove it
        $Card = $Request->Card;
        $Card->delete();

        //result blank JSON
        return Response::json([], 204);
    }
}
