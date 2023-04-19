<?php
 
namespace App\Exceptions;
 
class ExceptionInstance
{
    /* Exceptions Instance Of Not Validation Exception */
    public static function ofNotValidation(object $e): bool
    {
        return !$e instanceof \Illuminate\Validation\ValidationException;
    }
    
    /* Exceptions Instance Of Custom Exception */
    public static function ofCustom(object $e): bool
    {
        return $e instanceof \App\Exceptions\CustomException;  
    }

    /* Exceptions Instance Of Not Custom Exception */
    public static function ofNotCustom(object $e): \Illuminate\Http\JsonResponse
    {   // 422 Unprocessable Entity.
        $resp = ["error" => null, "cod" => null];
        if ( ExceptionInstance::_of403($e) ) 
            $resp = [ "error" => "This action is not authorized.", "cod" => 403 ];
        else if ( ExceptionInstance::_of404($e) )
            $resp = [ "error" => "Page not found.", "cod" => 404 ];
        else if ( ExceptionInstance::_of500($e) )
            $resp = [ "error" => "Internal Server Error.", "cod" => 500 ];
        else
            $resp = [
                "error" => $e->getMessage() ?? "Unknown error: ",
                "cod" => self::_selectGetCode($e)
            ];
        return response()->json($resp, $resp['cod']);
    }

   /* Exceptions Instance Of 403 */
    private static function _of403(object $e): bool
    {
        return (
            $e instanceof \Illuminate\Auth\Access\AuthorizationException ||
            $e instanceof \Illuminate\Auth\AuthenticationException
        );
    }

   /* Exceptions Instance Of 404 */
    private static function _of404(object $e): bool
    {
        return (
            $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
            $e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException ||
            $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
        );
    }

    /* Exceptions Instance Of 500 */
    private static function _of500(object $e): bool
    {
        return $e instanceof \Illuminate\Database\QueryException;
    }
    
    private static function _selectGetCode(object $e): int | evoid
    {
       if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException)
           return $e->getStatusCode();
       else if ($e instanceof \Illuminate\Database\QueryException)
           return $e->getCode();
       else
           die("Unknown error code !!");
    }
}
