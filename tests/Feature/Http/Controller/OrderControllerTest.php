<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
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
    }

    public function test_update()
    {
        $credentails = [
            'fullname'  => 'Кузьмин Феликс Александрович',
            'phone'     => '79651218814',
            'sum'       => 650,
            'address'   => 'Ромашковая 63 корпус 1'
        ];
        $response = $this->putJson('/api/order', $credentails);

        $response->assertCreated();
    }
}
