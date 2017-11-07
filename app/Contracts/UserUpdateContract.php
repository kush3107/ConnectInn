<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 7/11/17
 * Time: 9:03 PM
 */

use App\Contracts;

interface UserUpdateContract{

    public function hasName();
    public function getName();
}