<?php

namespace App\Repositories;

use App\Interfaces\IAddressRepository;
use App\Models\Address;

class AddressRepositoryEloquent implements IAddressRepository
{

    public function create(array $address): array
    {
        $address = Address::create($address);
        return $address->toArray();
    }

    public function getByCep(string $cep): array
    {
        $address = Address::where('cep', $cep)->first();
        return $address?->toArray() ?? [];
    }
}
