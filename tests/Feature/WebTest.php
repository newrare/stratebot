<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebTest extends TestCase
{
    //home
    public function test_home()
    {
        $Response = $this->get('/');

        $Response->assertStatus(200);
    }

    //create
    public function test_create()
    {
        $Response = $this->get('/create');

        $Response->assertStatus(200);
    }

    //create Card
    public function test_createCard()
    {
        $Response = $this->get('/create/card');

        $Response->assertStatus(200);
    }

    //test
    public function test_test()
    {
        $Response = $this->get('/test');

        $Response->assertStatus(200);
    }

    //error
    public function test_error()
    {
        $Response = $this->get('/error');

        $Response->assertStatus(200);
    }

    //not found
    public function test_notFound()
    {
        $Response = $this->get('/notFound');

        $Response->assertStatus(404);
    }
}
