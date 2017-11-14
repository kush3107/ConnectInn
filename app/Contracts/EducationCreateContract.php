<?php

namespace App\Contracts;

interface EducationCreateContract{
    public function getSchool();

    public function getDegree();

    public function getStart();

    public function getEnd();

    public function hasEnd();

    public function getField();

    public function getGradeType();

    public function getGrade();

    public function getLocation();

}
