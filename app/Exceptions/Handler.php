<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * renderHttpException 
     * 
     * @param HttpException $e 
     * @access protected
     * @return void
     */
    protected function renderHttpException(HttpException $e) {
        $status = $e->getStatusCode();
    
        if (view()->exists("LaravelAppBase::errors.{$status}")) 
        {
            return response()->view("LaravelAppBase::errors.{$status}", compact('e'), $status);
        }
        else 
        {
            return $this->convertExceptionToResponse($e);
        }

        //if(\Auth::check())
        //{
        //    if (view()->exists("LaravelAppBase::errors.{$status}")) 
        //    {
        //        return response()->view("LaravelAppBase::errors.{$status}", compact('e'), $status);
        //    }
        //    //else 
        //    //{
        //    //    return $this->convertExceptionToResponse($e);
        //    //}
        //}
        //else
        //{
        //    if (view()->exists("LaravelAppBase::errors.unsigned.{$status}")) 
        //    {
        //        return response()->view("LaravelAppBase::errors.unsigned.{$status}", compact('e'), $status);
        //    }
        //    //else 
        //    //{
        //    //    return $this->convertExceptionToResponse($e);
        //    //}
        //}
        //return $this->convertExceptionToResponse($e);
    }



    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($request->wantsJson())
        {
            $error = new \stdclass();
            $error->message = $e->getMessage();
            $error->code = $e->getCode();
            $error->file = $e->getFile();
            $error->line = $e->getLine();
            return response()->json($error, 400);
        }

        //if ($e instanceof ModelNotFoundException) {
        //    $e = new NotFoundHttpException($e->getMessage(), $e);
        //}

        return parent::render($request, $e);
    }
}
