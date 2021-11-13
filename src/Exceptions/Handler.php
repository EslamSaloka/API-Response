<?php

namespace BUGaia\BUGaiaAPI\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BUGaia\BUGaiaAPI\API;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (!($exception instanceof \ErrorException) && $request->wantsJson()) {
            if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
                return (new API())->setMessage(__('unauthenticated'))
                ->setStatusUnauthorized()
                ->build();
            }
            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                return (new API())->setMessage(__('unauthenticated'))
                ->setErrors($exception->errors())
                ->setStatusUnauthorized()
                ->build();
            }
            if ($exception instanceof ModelNotFoundException) {
                $message = array_reverse(explode('\\',$exception->getMessage()));
                $message = explode(']',$message[0]);
                return (new API())->setMessage(__('This :MODEL not found',['MODEL'=>$message[0]]))
                    ->setStatusError()
                    ->build();
            }
        }
        return parent::render($request, $exception);
    }
}
