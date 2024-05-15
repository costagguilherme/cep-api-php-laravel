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


}
