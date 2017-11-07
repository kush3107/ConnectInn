<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:58 PM
 */

namespace App\Api\V1\Transformers;


use App\Activity;
use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract
{
    public function transform(Activity $activity)
    {
        return [
            'id' => (int)$activity->id,
            'type' => $activity->type,
            'title' => $activity->title,
            'description' => $activity->description,
            'start' => $activity->start->toDateTimeString(),
            'end' => $activity->end ? $activity->end->toDateTimeString() : null,
            'link' => $activity->link,
            'meta' => json_decode($activity->meta),
            'created_at' => $activity->created_at->toDateTimeString(),
            'updated_at' => $activity->updated_at->toDateTimeString(),
        ];
    }
}