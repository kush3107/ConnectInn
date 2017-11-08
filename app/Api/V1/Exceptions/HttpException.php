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
    const INVALID_CREDENTIALS_EXCEPTION = 1;
    const USER_ALREADY_EXISTS_EXCEPTION = 2;
    const USER_ALREADY_IN_ACTIVITY_EXCEPTION = 3;

    public function __construct($message, $errorCode, $statusCode = 422)
    {
        parent::__construct($statusCode, $message, null, array(), $errorCode);
    }
}