<?php
 
namespace App\Exceptions;
 
class ExceptionInstance
{

    /* Exceptions Instance Of Not Validation Exception */
    public static function ofNotValidation($e)
    {
        return !$e instanceof \Illuminate\Validation\ValidationException;
    }

   /* Exceptions Instance Of 403 */
    public static function of403($e)
    {
        return (
            $e instanceof \Illuminate\Auth\Access\AuthorizationException ||
            $e instanceof \Illuminate\Auth\AuthenticationException
        );
    }

   /* Exceptions Instance Of 404 */
    public static function of404($e)
    {
        return (
            $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
            $e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException ||
            $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
        );
    }

    /* Exceptions Instance Of 500 */
    public static function of500($e)
    {
        return $e instanceof \Illuminate\Database\QueryException;
    }    

    /* Exceptions Instance Of Not Custom Exception */
    public static function ofNotCustom($e)
    {   //dd(get_class($e));
        // 422 Unprocessable Entity.
        if ( ExceptionInstance::of403($e) ) 
            return [ "error" => "This action is not authorized.", "cod" => 403 ];
        else if ( ExceptionInstance::of404($e) )
            return [ "error" => "Page not found.", "cod" => 404 ];
        else if ( ExceptionInstance::of500($e) )
            return [ "error" => "Internal Server Error.", "cod" => 500 ];
        else
            return [
                "error" => $e->getMessage() ?? "Unknown error: ",
                "cod" => self::_selectGetCode($e)
            ];
    }

    /* Exceptions Instance Of Custom Exception */
    public static function ofCustom($e)
    {
        return $e instanceof \App\Exceptions\CustomException;  
    }
    
    private static function _selectGetCode($e) {
       if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException)
           return $e->getStatusCode();
       else if ($e instanceof \Illuminate\Database\QueryException)
           return $e->getCode();
    }

}

