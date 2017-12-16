<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 14/11/17
 * Time: 6:04 PM
 */
namespace App\Contracts;

interface EducationUpdateContract
{
    public function getSchool();

    public function getDegree();

    public function getStart();

    public function getEnd();

    public function getGradeType();

    public function getGrade();

    public function getLocation();

    public function hasSchool();

    public function hasDegree();

    public function hasStart();

    public function hasEnd();

    public function hasGradeType();

    public function hasGrade();

    public function hasLocation();

}