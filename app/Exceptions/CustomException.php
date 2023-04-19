<?php

namespace App\Exceptions;
 
use Exception;
use Illuminate\Http\{ Request, JsonResponse };
 
class CustomException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report() {}
 
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        /* $request is in case you need to handle the request */
        return response()->json([
            "error" => $this->message,
            "cod" => $this->code 
        ], $this->code );
    }
}
