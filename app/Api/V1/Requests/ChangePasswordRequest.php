<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/12/17
 * Time: 9:22 PM
 */

namespace App\Api\V1\Requests;


class ChangePasswordRequest extends Request
{
    const OLD_PASSWORD = 'old_password';
    const NEW_PASSWORD = 'new_password';


    public function rules()
    {
        return[
            self::OLD_PASSWORD =>'required',
            self::NEW_PASSWORD =>'required|min:6',
        ];
    }
    public function getOldPassword(){
        return $this->get(self::OLD_PASSWORD);
    }

    public function getNewPassword(){
        return $this->get(self::NEW_PASSWORD);
    }

}