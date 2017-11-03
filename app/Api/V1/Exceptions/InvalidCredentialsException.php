<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 1:30 AM
 */

namespace App\Api\V1\Exceptions;


class InvalidCredentialsException extends HttpException
{
    const ERROR_MESSAGE = 'Invalid Credentials!';

    public function __construct()
    {
        parent::__construct(self::ERROR_MESSAGE, self::INVALID_CREDENTIALS_EXCEPTION);
    }
}