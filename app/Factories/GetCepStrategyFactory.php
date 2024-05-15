<?php

namespace App\Factories;

use App\Interfaces\ICepStrategy;

class GetCepStrategyFactory
{

    public function factory(string $cepProvider) : ICepStrategy
    {

        $strategies = config('cep_strategies');
        $strategy = $strategies[$cepProvider] ?? null;
        if (!$strategy) {
            throw new \App\Exceptions\NotFoundCustomException('CEP Provider does not exists');
        }

        return app($strategy);

    }
}
