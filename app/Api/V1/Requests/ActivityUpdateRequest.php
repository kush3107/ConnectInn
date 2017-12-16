<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 8/11/17
 * Time: 1:13 AM
 */

namespace App\Api\V1\Requests;


use App\Contracts\ActivityUpdateContract;
use App\Services\ActivityService;
use Auth;

class ActivityUpdateRequest extends Request implements ActivityUpdateContract

{
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const START = 'start';
    const END = 'end';
    const TYPE = 'type';
    const LINK = 'link';
    const META = 'meta';
    const TAGS = 'tags';

    public function authorize()
    {
        $user = Auth::user();
        $activityId = $this->route('activity');
        $activity = ActivityService::find($activityId);

        return $activity->isOwner($user);
    }

    public function rules()
    {
        return [
            self::TITLE => 'min:4',
            self::START => 'date',
            self::END => 'date|after:' . self::START,
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

    public function hasDescription()
    {
       return $this->has(self::DESCRIPTION);
    }

    public function getDescription()
    {
       return $this->get(self::DESCRIPTION);
    }

    public function getStart()
    {
       return $this->get(self::START);
    }

    public function hasEnd()
    {
       return $this->has(self::END);
    }

    public function getEnd()
    {
       return $this->get(self::END);
    }


    public function hasLink()
    {
        return $this->has(self::LINK);
    }

    public function getLink()
    {
        return $this->get(self::LINK);
    }

    public function hasMeta()
    {
        return $this->has(self::META);
    }

    public function getMeta()
    {
       return $this->get(self::META);
    }

    public function hasTitle()
    {
       return $this->has(self::TITLE);
    }

    public function hasStart()
    {
        return $this->has(self::START);
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