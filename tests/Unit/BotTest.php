<?php

namespace Tests\Unit;

use App\Models\Bot;
use Tests\TestCase;

class BotTest extends TestCase
{
    //POST /bot
    public function test_store()
    {
        $inputs = [
            'name'          => 'Test',
            'description'   => 'Awsome Test with many bug!',
            'image'         => 'https://stratebot.herokuapp.com/stratebot.png',
            'boss'          => true
        ];

        $Response = $this->postJson('/api/bot', $inputs);

        $Response->assertStatus(201);

        //dump($Response->getData());
    }

    //GET /bot
    public function test_index()
    {
        $Response = $this->getJson('/api/bot');

        $Response->assertStatus(200);
    }

    //GET /bot/{id}
    public function test_show()
    {
        $Bot = Bot::firstWhere('name', 'Test');

        $Response = $this->getJson('/api/bot/' . $Bot->id);

        $Response->assertStatus(200);
    }

    //PUT /bot/{id}
    public function test_update()
    {
        $Bot = Bot::firstWhere('name', 'Test');

        $Bot->boss = false;

        $Response = $this->putJson('/api/bot/' . $Bot->id, $Bot->toArray());

        $Response->assertStatus(200);
    }

    //DELETE /bot/{id}
    public function test_destroy()
    {
        $Bot = Bot::firstWhere('name', 'Test');

        $Response = $this->deleteJson('/api/bot/' . $Bot->id);

        $Response->assertStatus(204);
    }

}
