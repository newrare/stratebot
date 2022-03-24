<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

use Response;

class CardController extends Controller
{
    //route web /create/card
    public function create()
    {
        return view('createCard');
    }

    //POST /api/card
    public function store(Request $Request)
    {
        //check inputs
        $Request->validate([
            'name'          => 'required|string|unique:cards|max:100',
            'description'   => 'required|string|max:1000',
            'move'          => 'required|integer',
            'attack'        => 'required|integer',
            'defense'       => 'required|integer',
            'type'          => 'required|in:water,fire,earth',
            'nemesis'       => 'nullable|json'
        ]);

        // create and save Card
        $Card = new Card;

        $Card->name         = $Request->input('name');
        $Card->description  = $Request->input('description');
        $Card->move         = $Request->input('move');
        $Card->attack       = $Request->input('attack');
        $Card->defense      = $Request->input('defense');
        $Card->type         = $Request->input('type');
        //$Card->nemesis      = $Request->input('name');

        $Card->save();

        return Response::json($Card->toArray());
    }

    //GET /api/card
    public function index()
    {
        //result
        $results = Card::pluck('id')->toArray();

        return Response::json($results);
    }

    //GET /card/{id}
    public function show($id)
    {
        $Card = Card::find($id);

        return Response::json($Card->toArray());
    }

    //PUT /card/{id}
    public function update(Request $Request, $id)
    {
        $Card = Card::find($id);

        $Card->name         = $Request->input('name');
        $Card->description  = $Request->input('description');
        $Card->move         = $Request->input('move');
        $Card->attack       = $Request->input('attack');
        $Card->defense      = $Request->input('defense');
        $Card->type         = $Request->input('type');
        //$Card->nemesis      = $Request->input('name');

        $Card->save();

        return Response::json($Card->toArray());
    }

    //DELETE /card/{id}
    public function destroy($id)
    {
        $Card = Card::find($id);

        $Card->delete();

        //result
        return Response::json([]);
    }
}
