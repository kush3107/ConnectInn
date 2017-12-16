<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/11/17
 * Time: 9:03 PM
 */

namespace App\Contracts;

interface UserUpdateContract{

    public function hasName();
    public function getName();

    public function hasDateOfBirth();
    public function getDateOfBirth();

    public function hasPhone();
    public function getPhone();

    public function hasAbout();
    public function getAbout();

    public function hasAttributes();
    public function getAttributes();
}