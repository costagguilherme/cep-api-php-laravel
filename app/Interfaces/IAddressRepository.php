<?php

namespace App\Interfaces;

interface IAddressRepository
{
    public function create(array $address): array;
}
