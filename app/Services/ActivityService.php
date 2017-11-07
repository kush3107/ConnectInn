<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:54 PM
 */

namespace App\Services;

use App\Activity;
use App\Contracts\ActivityCreateContract;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActivityService
{
    public static function find($id)
    {
        $activity = Activity::find($id);

        if (is_null($activity)) {
            throw new NotFoundHttpException('Activity Not found!');
        }

        return $activity;
    }

    /**
     * @param $userId
     * @return Activity[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function getListsBy($userId)
    {
        $user = UserService::find($userId);

        return $user->activities;
    }

    public function create(ActivityCreateContract $contract, User $user)
    {
        $activity = new Activity();

        $activity->title        = $contract->getTitle();
        $activity->description  = $contract->getDescription();
        $activity->start        = $contract->getStart();
        $activity->end          = $contract->getEnd();
        $activity->type         = $contract->getType();
        $activity->link         = $contract->getLink();
        $activity->meta         = json_encode($contract->getMeta());

        $activity->save();

        $this->attachUserToActivity($activity->id, $user->id, 'owner', true);

        return $activity;
    }

    public function attachUserToActivity($activityId, $userId, $role, $isOwner = false)
    {
        $activity = ActivityService::find($activityId);

        $activity->users()->attach($userId, [
            'role' => $role,
            'is_owner' => $isOwner
        ]);
    }
}