<?php

namespace Tests\Unit;

use App\Models\Card;
use Tests\TestCase;

class CardTest extends TestCase
{
    //POST /card
    public function test_store()
    {
        $inputs = [
            'name'          => 'Test',
            'description'   => 'Awsome Test with many bug!',
            'move'          => 1,
            'attack'        => 10.,
            'defense'       => 0,
            'type'          => 'water',
            'nemesis'       => null
        ];

        $Response = $this->postJson('/api/card', $inputs);

        $Response->assertStatus(200);

        //dump($Response->getData());
    }

    //GET /card
    public function test_index()
    {
        $Response = $this->getJson('/api/card');

        $Response->assertStatus(200);
    }

    //GET /card/{id}
    public function test_show()
    {
        $Card = Card::firstWhere('name', 'Test');

        $Response = $this->getJson('/api/card/' . $Card->id);

        $Response->assertStatus(200);
    }

    //PUT /card/{id}
    public function test_update()
    {
        $Card = Card::firstWhere('name', 'Test');

        $Card->defense = 5;

        $Response = $this->putJson('/api/card/' . $Card->id, $Card->toArray());

        $Response->assertStatus(200);
    }

    //DELETE /card/{id}
    public function test_destroy()
    {
        $Card = Card::firstWhere('name', 'Test');

        $Response = $this->deleteJson('/api/card/' . $Card->id);

        $Response->assertStatus(200);
    }
}
