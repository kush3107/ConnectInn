<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 11:33 AM
 */

namespace App\Api\V1\Exceptions;


class UserAlreadyExistsException extends HttpException
{
    const ERROR_MESSAGE = 'User already exists!';

    public function __construct()
    {
        parent::__construct(self::ERROR_MESSAGE, self::USER_ALREADY_EXISTS_EXCEPTION);
    }
}