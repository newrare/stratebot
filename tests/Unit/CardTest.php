<?php

namespace Tests\Unit;

use Tests\TestCase;

class CardTest extends TestCase
{
    //POST /card
    public function test_store()
    {
        $inputs = [
            'name'          => 'Tresor',
            'description'   => 'Awsome chest with many gold!',
            'move'          => 0,
            'attack'        => 0,
            'defense'       => 0,
            'type'          => 'water',
            'nemesis'       => null
        ];

        $Response = $this->postJson('/api/card', $inputs);

        $Response->assertStatus(200);
    }

    //GET /card
    public function test_index()
    {
        $this->assertTrue(true);
    }
}
