<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:58 PM
 */

namespace App\Api\V1\Transformers;


use App\Activity;
use App\Helpers;
use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['owner', 'members'];
    protected $defaultIncludes = ['tags', 'invitations', 'requests'];

    public function transform(Activity $activity)
    {
        $status = is_null($activity->end) ? 'ongoing' : 'finished';

        return [
            'id' => (int)$activity->id,
            'type' => $activity->type,
            'title' => $activity->title,
            'description' => $activity->description,
            'start' => Helpers::nullOrDateTimeString($activity->start),
            'end' => Helpers::nullOrDateTimeString($activity->end),
            'status' => $status,
            'link' => $activity->link,
            'meta' => json_encode($activity->meta),
            'created_at' => $activity->created_at->toDateTimeString(),
            'updated_at' => $activity->updated_at->toDateTimeString(),
        ];
    }

    public function includeOwner(Activity $activity)
    {
        return $this->item($activity->owner()->first(), new UserTransformer());
    }

    public function includeMembers(Activity $activity)
    {
        return $this->collection($activity->members, new UserTransformer());
    }

    public function includeTags(Activity $activity)
    {
        return $this->collection($activity->tags, new TagTransformer());
    }

    public function includeRequests(Activity $activity)
    {
        return $this->collection($activity->requests, new ActivityRequestTransformer());
    }

    public function includeInvitations(Activity $activity)
    {
        return $this->collection($activity->invitations, new InvitationTransformer());
    }
}