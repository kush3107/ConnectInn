<?php

namespace App\Api\V1\Transformers;

use App\Helpers;
use App\User;
use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 1:23 AM
 */

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['activities', 'following'];

    protected $defaultIncludes = ['attributes'];

    public function transform(User $user)
    {
        return [
            'id'                => (int)$user->id,
            'name'              => $user->name,
            'email'             => $user->email,
            'phone'             => $user->phone,
            'rating'            => $user->rating,
            'profile_pic'       => $user->profile_pic,
            'about'             => $user->about,
            'date_of_birth'     => Helpers::nullOrDateTimeString($user->date_of_birth),
            'created_at'        => $user->created_at->toDateTimeString(),
            'updated_at'        => $user->updated_at->toDateTimeString()
        ];
    }

    public function includeActivities(User $user)
    {
        return $this->collection($user->activities, new ActivityTransformer());
    }

    public function includeAttributes(User $user)
    {
        return $this->collection($user->attributes, new AttributeTransformer());
    }

    public function includeFollowing(User $user)
    {
        return $this->collection($user->following, new UserTransformer());
    }
}