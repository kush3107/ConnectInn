<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 14/11/17
 * Time: 5:43 PM
 */

namespace App\Api\V1\Requests;

use App\Contracts\EducationUpdateContract;

class EducationUpdateRequest extends Request implements EducationUpdateContract
{
    const SCHOOL = 'school';

    public function rules()
    {
        return [
           self::SCHOOL =>'min:2'
        ];
    }

    public function hasSchool(){
        return $this->has(self::SCHOOL);
    }


    public function getSchool(){
        return $this->get(self::SCHOOL);
    }
}