<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 8/12/17
 * Time: 12:00 AM
 */

namespace App\Contracts;


interface ExperienceCreateContract
{
    public function getOrganisationName();

    public function getDesignation();

    public function getDescription();

    public function hasDescription();

    public function getFrom();

    public function hasTo();

    public function getTo();

    public function getLocation();

}