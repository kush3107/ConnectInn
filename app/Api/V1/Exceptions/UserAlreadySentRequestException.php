<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10/11/17
 * Time: 2:14 AM
 */

namespace App\Api\V1\Exceptions;


class UserAlreadySentRequestException extends HttpException
{
    const ERROR_MESSGAE = 'User has already requested to join';

    public function __construct()
    {
        parent::__construct(self::ERROR_MESSGAE,self::USER_ALREADY_SENT_REQUEST_EXCEPTION);
    }
}