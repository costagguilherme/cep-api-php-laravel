<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetAddressByCepTest extends TestCase
{

    public function test_this_should_return_address(): void
    {
        $cep = '41600045';
        $response = $this->get("/address/{$cep}");
        $response = json_decode($response->getContent(), true);
        $this->assertEquals($response['message'], 'CEP returned successfully');
        $this->assertEquals($response['code'], 200);
        $this->assertEquals($response['data']['cep'], $cep);
    }
}
