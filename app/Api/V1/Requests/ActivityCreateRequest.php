<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:31 AM
 */

namespace App\Api\V1\Requests;


use App\Contracts\ActivityCreateContract;
use App\Services\ActivityService;

class ActivityCreateRequest extends Request implements ActivityCreateContract
{
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const START = 'start';
    const END = 'end';
    const TYPE = 'type';
    const LINK = 'link';
    const META = 'meta';
    const TAGS = 'tags';

    public function rules()
    {
        return [
            self::TITLE => 'required|min:4',
            self::START => 'required|date',
            self::END => 'date|after:' . self::START,
            self::TYPE => 'required|in:project,competition,seminar,workshop,guest_lecture,co_curricular,certification,training,other,volunteer,publication',
            self::LINK => 'active_url',
            self::META => 'json',
            self::TAGS => 'array',
            self::TAGS . '.*' => 'exists:tags,id'
        ];
    }

    public function getTitle()
    {
        return $this->get(self::TITLE);
    }

    public function getDescription()
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getStart()
    {
        return $this->get(self::START);
    }

    public function hasEndDate()
    {
        return $this->has(self::END);
    }

    public function getEnd()
    {
        return $this->get(self::END);
    }

    public function getType()
    {
        return $this->get(self::TYPE);
    }

    public function getLink()
    {
        return $this->get(self::LINK);
    }

    public function getMeta()
    {
        return $this->get(self::META, []);
    }

    public function hasTags()
    {
        return $this->has(self::TAGS);
    }

    public function getTags()
    {
        return $this->get(self::TAGS);
    }
}