<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
    // public function render($request, Exception $e)
    // {   
    //     if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
    //     {
    //         return view('errors.404');
    //     }
    //     return parent::redner($request, $e);
    // }

}
