<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundCustomException extends Exception
{
    public function __construct($message = "Not Found")
    {
        parent::__construct($message);
    }
    public function render($request)
    {
        return response()->json([
            'message' => $this->getMessage(),
            'code' => 404,
        ], 404);
    }
}
