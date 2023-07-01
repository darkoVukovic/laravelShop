<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{

    public $template = [];
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            
            $this->template['view'] = 'errors.invalidRequest';
            $this->template['renderContentData'] = false;

            return response()->view('eshop', $this->template, 400);
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            $this->template['view'] = 'errors.notFound';
            $this->template['renderContentData'] = false;
            return response()->view('eshop', $this->template, 404);
        });

    }
}
