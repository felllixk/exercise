<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    public $id;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $credentails = [
            'fullname'  => 'Кузьмин Феликс Александрович',
            'phone'     => '79651218814',
            'sum'       => 650,
            'address'   => 'Ромашковая 63 корпус 1'
        ];
        $response = $this->postJson('/api/order', $credentails);
        $response->assertCreated();
        $this->id = json_decode($response->getContent())->id;
    }

    public function test_update()
    {
        $credentails = [
            'fullname'  => 'Кузьмин Александр Анатольевич',
            'phone'     => '79651218814',
            'sum'       => 350,
            'address'   => 'Ромашковая 63 корпус 3'
        ];
        $response = $this->putJson('/api/order/' . Order::first()->id, $credentails);
        //dd($response->getContent());
        $response->assertOk();
    }

    public function test_destroy()
    {
        $response = $this->delete('/api/order/' . Order::first()->id);
        //dd($response->getContent());
        $response->assertOk();
    }
}
