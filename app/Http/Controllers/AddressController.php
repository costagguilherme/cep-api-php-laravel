<?php

namespace App\Http\Controllers;

use App\UseCases\GetAddressByCepUseCase;

class AddressController extends Controller
{
    public function __construct(private GetAddressByCepUseCase $getAddressByCepUseCase)
    {
    }
    public function show(string $cep)
    {
        $address = $this->getAddressByCepUseCase->execute($cep);
        return response()->json($address);
    }
}
