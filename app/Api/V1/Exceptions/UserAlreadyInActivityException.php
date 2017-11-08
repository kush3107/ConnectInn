<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:24 PM
 */

namespace App\Api\V1\Exceptions;


class UserAlreadyInActivityException extends HttpException
{
    const ERROR_MESSAGE = 'User is already in the activity';

    public function __construct()
    {
        parent::__construct(self::ERROR_MESSAGE, self::USER_ALREADY_IN_ACTIVITY_EXCEPTION);
    }
}