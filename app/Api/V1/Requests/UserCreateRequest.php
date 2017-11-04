<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 11:23 AM
 */

namespace App\Api\V1\Requests;


use App\Contracts\UserCreateContract;

class UserCreateRequest extends Request implements UserCreateContract
{
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';

    public function rules()
    {
        return [
            self::NAME => 'required',
            self::EMAIL => 'required|email',
            self::PASSWORD => 'required|min:4|confirmed'
        ];
    }

    public function getEmail()
    {
        return $this->get(self::EMAIL);
    }

    public function getName()
    {
        return $this->get(self::NAME);
    }

    public function getPassword()
    {
        return $this->get(self::PASSWORD);
    }
}