<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10/11/17
 * Time: 1:41 AM
 */

namespace App\Api\V1\Requests;


class ActivityRequestByEmailRequest extends Request
{

    const EMAIL = 'email';



    public function rules()
    {
        return [
            self::EMAIL => 'required|email|exists:users,email'
        ];
    }

    public function getEmail(){
        return $this->get(self::EMAIL);
    }
}