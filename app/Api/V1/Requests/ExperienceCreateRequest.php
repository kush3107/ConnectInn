<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 19/11/17
 * Time: 1:47 AM
 */

namespace App\Api\V1\Requests;


use App\Contracts\ExperienceCreateContract;

class ExperienceCreateRequest extends Request implements ExperienceCreateContract
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

    public function hasDescription()
    {
        // TODO: Implement hasDescription() method.
        return $this->has(self::DESCRIPTION);
    }

    public function getFrom()
    {
        // TODO: Implement getFrom() method.
        return $this->get(self::FROM);
    }

    public function hasTo()
    {
        // TODO: Implement hasTo() method.
        return $this->has(self::TO);
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

    public function getOrganisationName()
    {
        // TODO: Implement getOrganisationName() method.
        return $this->get(self::ORGANISATION_NAME);
    }
}