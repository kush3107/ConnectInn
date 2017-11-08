<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:32 PM
 */

namespace App\Api\V1\Exceptions;


class InvitationAlreadyExistsException extends HttpException
{
    const ERROR_MESSAGE = 'The user is already invited the activity!';

    public function __construct()
    {
        parent::__construct(self::ERROR_MESSAGE, self::INVITATION_ALREADY_EXISTS_EXCEPTION);
    }
}