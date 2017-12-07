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
    const INVITATION_ALREADY_EXISTS_EXCEPTION = 3;
    const USER_ALREADY_IN_ACTIVITY_EXCEPTION = 4;
    const USER_ALREADY_SENT_REQUEST_EXCEPTION = 5;
    const OLD_PASSWORD_NOT_MATCH_EXCEPTION = 6;

    public function __construct($message, $errorCode, $statusCode = 422)
    {
        parent::__construct($statusCode, $message, null, array(), $errorCode);
    }
}