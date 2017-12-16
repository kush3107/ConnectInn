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
            self::ORGANISATION_NAME => 'required',
            self::DESIGNATION => 'required',
            self::FROM => 'required|date',
            self::TO => 'date|after:' . self::FROM,
            self::LOCATION => 'required'

        ];

    }


    public function hasOrganisationName()
    {
        // TODO: Implement hasOrganisationName() method.
        return $this->has(self::ORGANISATION_NAME);
    }

    public function hasDesignation()
    {
        // TODO: Implement hasDesignation() method.
        return $this->has(self::DESIGNATION);
    }

    public function hasDescription()
    {
        // TODO: Implement hasDescription() method.
        return $this->has(self::DESCRIPTION);

    }

    public function hasFrom()
    {
        // TODO: Implement hasFrom() method.
        return $this->has(self::FROM);
    }

    public function hasTo()
    {
        // TODO: Implement hasTo() method.
        return $this->has(self::TO);
    }

    public function hasLocation()
    {
        // TODO: Implement hasLocation() method.
        return $this->has(self::LOCATION);
    }

    public function getOrganisationName()
    {
        // TODO: Implement getOrganisationName() method.
        return $this->get(self::ORGANISATION_NAME);
    }

    public function getDesignation()
    {
        // TODO: Implement getDesignation() method.
        return $this->get(self::DESIGNATION);
    }

    public function getDescription()
    {
        // TODO: Implement getDescription() method.
        return $this->get(self::DESCRIPTION);
    }

    public function getFrom()
    {
        // TODO: Implement getFrom() method.
        return $this->get(self::FROM);
    }

    public function getTo()
    {
        // TODO: Implement getTo() method.
        return $this->get(self::TO);
    }

    public function getLocation()
    {
        // TODO: Implement getLocation() method.
        return $this->get(self::LOCATION);
    }
}