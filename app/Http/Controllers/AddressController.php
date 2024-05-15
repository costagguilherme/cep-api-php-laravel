<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowAddressRequest;
use App\UseCases\GetAddressByCepUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function __construct(private GetAddressByCepUseCase $getAddressByCepUseCase)
    {
    }
    public function show(string $cep)
    {
        Validator::validate(['cep' => $cep], ['cep' => 'required|regex:/^[0-9]{8}$/']);
        $address = $this->getAddressByCepUseCase->execute($cep);
        return $this->sendSuccess($address);
    }
}
