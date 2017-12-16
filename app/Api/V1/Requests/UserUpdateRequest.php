<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/11/17
 * Time: 9:01 PM
 */

namespace App\Api\V1\Requests;


use App\Contracts\UserUpdateContract;

class UserUpdateRequest extends Request implements UserUpdateContract
{

    const NAME = 'name';
    const PHONE = 'phone';
    const ABOUT = 'about';
    const DOB = 'date_of_birth';
    const ATTRIBUTES = 'attributes';


    public function rules()
    {
        return [
            self::DOB => 'date',
            self::ABOUT => 'nullable',
            self::PHONE => 'phone_number|nullable',
            self::ATTRIBUTES => 'array',
            self::ATTRIBUTES . '.*.type' => 'required|in:skill,interest',
            self::ATTRIBUTES . '.*.value' => 'required',
        ];
    }

    public function hasName()
    {
        return $this->has(self::NAME);
    }

    public function getName()
    {
        return $this->get(self::NAME);
    }

    public function hasDateOfBirth()
    {
        return $this->has(self::DOB);
    }

    public function getDateOfBirth()
    {
        return $this->get(self::DOB);
    }

    public function hasPhone()
    {
        return $this->exists(self::PHONE);
    }

    public function getPhone()
    {
        return $this->get(self::PHONE);
    }

    public function hasAbout()
    {
        return $this->exists(self::ABOUT);
    }

    public function getAbout()
    {
        return $this->get(self::ABOUT);
    }

    public function hasAttributes()
    {
        return $this->has(self::ATTRIBUTES);
    }

    public function getAttributes()
    {
        return $this->get(self::ATTRIBUTES);
    }
}