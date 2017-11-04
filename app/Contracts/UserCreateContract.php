<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 11:26 AM
 */

namespace App\Contracts;


interface UserCreateContract
{
    public function getEmail();
    public function getName();
    public function getPassword();
}