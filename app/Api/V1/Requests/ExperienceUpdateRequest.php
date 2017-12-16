<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 7/12/17
 * Time: 11:56 PM
 */

namespace App\Api\V1\Requests;


use App\Contracts\ExperienceUpdateContract;

class ExperienceUpdateRequest extends Request implements ExperienceUpdateContract
{
    const  ORGANISATION_NAME = 'organisation_name';
    const DESIGNATION = 'designation';
    const DESCRIPTION = 'description';
    const FROM = 'from';
    const TO = 'to';
    const LOCATION = 'location';

    public function rules()
    {

        return [
            self::FROM => 'date',
            self::TO => 'date',
            self::DESCRIPTION => 'nullable'
        ];
    }


    public function hasOrganisationName()
    {
        return $this->has(self::ORGANISATION_NAME);
    }

    public function hasDesignation()
    {
        return $this->has(self::DESIGNATION);
    }

    public function hasDescription()
    {
        return $this->exists(self::DESCRIPTION);
    }

    public function hasFrom()
    {
        return $this->has(self::FROM);
    }

    public function hasTo()
    {
        return $this->has(self::TO);
    }

    public function hasLocation()
    {
        return $this->has(self::LOCATION);
    }

    public function getOrganisationName()
    {
        return $this->get(self::ORGANISATION_NAME);
    }

    public function getDesignation()
    {
        return $this->get(self::DESIGNATION);
    }

    public function getDescription()
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getFrom()
    {
        return $this->get(self::FROM);
    }

    public function getTo()
    {
        return $this->get(self::TO);
    }

    public function getLocation()
    {
        return $this->get(self::LOCATION);
    }
}