<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/11/17
 * Time: 9:01 PM
 */

namespace App\Api\V1\Requests;


use App\Contracts\UserUpdateContract;
use Faker\Guesser\Name;

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

        return $this->has(self::NAME);
    }

    public function getName(){

            return $this->get(self::NAME);


    }
}