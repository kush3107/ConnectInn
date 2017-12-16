<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 8/12/17
 * Time: 12:01 AM
 */

namespace App\Contracts;


interface ExperienceUpdateContract
{
    public function hasOrganisationName();

    public function hasDesignation();

    public function hasDescription();

    public function hasFrom();

    public function hasTo();

    public function hasLocation();

    public function getOrganisationName();

    public function getDesignation();

    public function getDescription();

    public function getFrom();

    public function getTo();

    public function getLocation();

}