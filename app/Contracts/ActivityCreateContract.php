<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:31 AM
 */

namespace App\Contracts;


interface ActivityCreateContract
{
    public function getTitle();

    public function getDescription();

    public function getStart();

    public function getEnd();

    public function getType();

    public function getLink();

    public function getMeta();
}