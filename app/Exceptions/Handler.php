<?php

// https://laraveldaily.com/post/how-to-catch-handle-create-laravel-exceptions
// https://dev.to/jackmiras/laravels-exceptions-part-1-what-are-exceptions-2ma5
// https://dev.to/jackmiras/laravels-exceptions-part-2-custom-exceptions-1367
// https://dev.to/jackmiras/laravels-exceptions-part-3-findorfail-exception-automated-4kci

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use App\Exceptions\ExceptionInstance;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {   //dd(get_class($e));
        if ( ExceptionInstance::ofNotValidation($e) && env("APP_ENV") === "production" ) {
            return ExceptionInstance::ofCustom($e) 
                ? $e->render($request)
                    : ExceptionInstance::ofNotCustom($e);                
        }        

        return parent::render($request, $e);
    }
}
