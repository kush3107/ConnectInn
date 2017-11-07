<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/11/17
 * Time: 9:01 PM
 */

namespace App\Api\V1\Requests;


use PhpParser\Node\Name;

class UserUpdateRequest extends Request implements UserUpdateContract
{

    const NAME = 'name';

    public function rules()
    {
        return [

        ];
    }
    public function hasName()
    {

        if(isNull(self::NAME))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function getName(){
        if($this->hasName()==false)
        {
            return $this->get(self::NAME);
        }
    }
}