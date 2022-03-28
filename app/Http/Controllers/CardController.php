<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Response;

class CardController extends Controller
{
    //route web /create/card
    public function create(): View
    {
        return view('createCard');
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

        $Request->validate($rules);

        // create Card by fillable Model and save it
        $Card = Card::create($Request->all());

        //return array of Card
        return Response::json($Card->toArray(), 201);
    }

    //GET /api/card
    public function index(): JsonResponse
    {
        //result
        $results = Card::pluck('id')->toArray();

        //return array of Card id
        return Response::json($results, 200);
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
        //create rules (is set only when input is defined)
        $rules = [];

        $Request->name          ?? $rules['name']           = 'required|string|unique:cards|max:100';
        $Request->description   ?? $rules['description']    = 'required|string|max:1000';
        $Request->move          ?? $rules['move']           = 'required|integer';
        $Request->attack        ?? $rules['attack']         = 'required|integer';
        $Request->defense       ?? $rules['defense']        = 'required|integer';
        $Request->type          ?? $rules['type']           = 'required|in:water,fire,earth';
        $Request->nemesis       ?? $rules['nemesis']        = 'nullable|json';

        //check inputs
        $Request->validate($rules);

        //get, update and save Card
        $Card = $Request->Card;
        $Card->update($Request->all());

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
