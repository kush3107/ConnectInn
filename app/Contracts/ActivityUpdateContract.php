<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 8/11/17
 * Time: 1:15 AM
 */

namespace App\Contracts;


interface ActivityUpdateContract
{
    public function hasTitle();
    public function getTitle();

    public function hasDescription();
    public function getDescription();

    public function hasStart();
    public function getStart();

    public function hasEnd();
    public function getEnd();

    public function hasLink();
    public function getLink();

    public function hasMeta();
    public function getMeta();

}