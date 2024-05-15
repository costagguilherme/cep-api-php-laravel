<?php

namespace Tests\Feature;

use Tests\TestCase;

class AddressControllerShowFeatureTest extends TestCase
{
    public function test_this_should_success(): void
    {
        $cep = '41600045';
        $response = $this->get("/address/{$cep}");
        $response = json_decode($response->getContent(), true);
        $this->assertEquals($response['message'], 'CEP returned successfully');
        $this->assertEquals($response['code'], 200);
        $this->assertEquals($response['data']['cep'], $cep);
    }

    public function test_this_should_not_found(): void
    {
        $cep = '50000111';
        $response = $this->get("/address/{$cep}");
        $response = json_decode($response->getContent(), true);
        $this->assertEquals($response['message'], 'CEP does not exists');
        $this->assertEquals($response['code'], 404);
    }
}
