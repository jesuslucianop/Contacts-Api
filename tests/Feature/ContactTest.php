<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{

    public function TestForCreation()
    {
        $data = [
            'name' => "jesus",
            'lastName' => "luciano",
        ];
        $responseLogin = $this->postJson('api/getContacts', $data)->assertStatus(200);
        //loggin into user


    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
