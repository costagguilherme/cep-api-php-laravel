<?php

namespace App\Strategies;

use App\Interfaces\ICepStrategy;
use GuzzleHttp\Client;

class GetViaCepAddressStrategy implements ICepStrategy
{
    private Client $httpClient;
    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://viacep.com.br',
            'verify' => false
        ]);
    }

    public function fetch(string $cep): array
    {
        $address = $this->httpClient->get("/ws/{$cep}/json/");
        $addressResponse = json_decode($address->getBody()->getContents(), true);
        return $this->convertResponse($addressResponse);
    }

    public function convertResponse($address): array
    {
        return [
            'cep' => str_replace('-', '', $address['cep']),
            'street' => $address['logradouro'],
            'complement' => $address['complemento'],
            'neighborhood' => $address['bairro'],
            'city' => $address['localidade'],
            'uf' => $address['uf'],
            'ddd' => $address['ddd']
        ];
    }
}
