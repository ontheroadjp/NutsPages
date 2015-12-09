<?php

namespace Ontheroadjp\Utilities\Exceptions;;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Psr\Log\LoggerInterface;

class AjaxExceptionHandler extends ExceptionHandler
{
   
    protected $dontReport = [
        HttpException::class,
    ];

    public function report(Exception $e)
    {
        return parent::report($e);
    }

    public function render($req, Exception $e)
    {
        if($req->wantsJson())
        {
            $error = new \stdclass();
            $error->message = $e->getMessage();
            $error->code = $e->getCode();
            $error->file = $e->getFile();
            $error->line = $e->getLine();
            return response()->json($error, 400);
        }
        return parent::render($req, $e);
    }
}
?>

