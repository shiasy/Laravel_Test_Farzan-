<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/',['sort'=>'price','search'=>'red']);

        $response->assertStatus(200);

    }

    public function test2_example()
    {

        $response = $this->get('ware.create');

        $response->assertStatus(404);

    }

    public function test3_example()
    {

        $response = $this->post('ware.store',[
            'company' => 'Kawasaki',
            'kind' => 'ms500',
            'color' => 'red',
            'weight' => '1503',
            'price' => '520000000',
            'user_id'=> 1]);

        $response->assertStatus(404);

    }
}
