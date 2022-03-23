<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

class CardController extends Controller
{
    //route web /create/card
    public function create()
    {
        return view('createCard');
    }

    //GET /card
    public function index()
    {
        //result
        $results = array(
            
        );

        return Response::json($results);
    }


    //POST /card
    public function store(Request $Request)
    {
        //result
        $results = array(
            
        );

        return Response::json($results);
    }

    //GET /card/{id}
    public function show($id)
    {
        //result
        $results = array(
            
        );

        return Response::json($results);
    }

    //PUT /card/{id}
    public function update(Request $Request, $id)
    {
        //result
        $results = array(
            
        );

        return Response::json($results);
    }

    //DELETE /card/{id}
    public function destroy($id)
    {
        //result
        return Response::json([]);
    }
}
