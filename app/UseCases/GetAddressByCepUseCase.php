<?php

namespace App\UseCases;

use App\Factories\GetCepStrategyFactory;
use App\Models\Address;
use GuzzleHttp\Client;

class GetAddressByCepUseCase
{
    const DEFAULT_PROVIDER = 'viacep';
    private Client $httpClient;
    public function __construct(private GetCepStrategyFactory $getCepStrategyFactory)
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://viacep.com.br/ws'
        ]);
    }
    public function execute(string $cep)
    {
        $cepProvider = env('CEP_PROVIDER', self::DEFAULT_PROVIDER);
        $cepStrategy = $this->getCepStrategyFactory->factory($cepProvider);
        $address = $cepStrategy->fetch($cep);
        Address::create($address);

    }
}