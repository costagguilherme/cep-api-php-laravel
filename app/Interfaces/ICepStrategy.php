<?php

namespace App\Interfaces;

interface ICepStrategy
{
    public function fetch(string $cep);
}
