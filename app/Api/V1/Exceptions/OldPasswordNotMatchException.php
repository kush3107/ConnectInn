<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/12/17
 * Time: 9:40 PM
 */

namespace App\Api\V1\Exceptions;


class OldPasswordNotMatchException extends HttpException
{
 const ERROR_MESSAGE = 'Old password did not matched!!';
  public function __construct()
  {
      parent::__construct(self::ERROR_MESSAGE,self::OLD_PASSWORD_NOT_MATCH_EXCEPTION);
  }
}