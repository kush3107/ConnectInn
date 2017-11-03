<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 12:57 AM
 */

namespace App\Api\V1\Exceptions;

class HttpException extends \Symfony\Component\HttpKernel\Exception\HttpException
{
    public function __construct($message, $errorCode, $statusCode = 422)
    {
        parent::__construct($statusCode, $message, null, array(), $errorCode);
    }
}