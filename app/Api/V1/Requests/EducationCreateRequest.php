<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 14/11/17
 * Time: 3:37 PM
 */

namespace App\Api\V1\Requests;


use App\Contracts\EducationCreateContract;

class EducationCreateRequest extends Request implements EducationCreateContract
{
    const SCHOOL = 'school';
    const DEGREE = 'degree';
    const GRADETYPE = 'grade_type';
    const GRADE = 'grade';
    const LOCATION = 'location';
    const START = 'start';
    const END = 'end';

    public function rules()
    {
        return [
            self::SCHOOL => 'required',
            self::DEGREE => 'required',
            self::START => 'required|date',
            self::END => 'date|after:' . self::START
        ];
    }

    public function hasEnd()
    {
        return $this->has(self::END);
    }

    public function getEnd()
    {
        return $this->get(self::END);
    }

    public function getSchool()
    {
        return $this->get(self::SCHOOL);
    }

    public function getDegree()
    {
        return $this->get(self::DEGREE);
    }

    public function getGrade()
    {
        return $this->get(self::GRADE);
    }

    public function getGradeType()
    {
        return $this->get(self::GRADETYPE);
    }

    public function getLocation()
    {
        return $this->get(self::LOCATION);
    }

    public function getStart()
    {
        return $this->get(self::START);
    }

}