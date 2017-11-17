<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10/11/17
 * Time: 1:49 AM
 */

namespace App\Services;


use App\Activity;
use App\ActivityRequest;
use App\Api\V1\Exceptions\UserAlreadyInActivityException;
use App\Api\V1\Exceptions\UserAlreadySentRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActivityRequestService
{

    /**
     * @param $id
     * @return ActivityRequest $activityRequest
     */
    public static function find($id)
    {
        $activityRequest = ActivityRequest::find($id);

        if (is_null($activityRequest)) {
            throw new NotFoundHttpException('ActivityRequest Not found');
        }

        return $activityRequest;
    }

    public function create($senderId, Activity $activity)
    {
        if ($activity->users()->wherePivot('user_id', $senderId)->exists()) {
            throw new UserAlreadyInActivityException();
        }

        if (ActivityRequest::where('sender_id', $senderId)
            ->where('activity_id', $activity)
            ->exists()) {
            throw new UserAlreadySentRequestException();
        }

        $activityRequest = new ActivityRequest();

        $activityRequest->sender_id = $senderId;
        $activityRequest->activity_id = $activity->id;

        $activityRequest->save();

        return $activityRequest;
    }

    public function accept(ActivityRequest $activityRequest)
    {
        $activity = $activityRequest->activity;
        $sender = $activityRequest->sender;

        ActivityService::attachUserToActivity($activity->id, $sender->id);

        $activityRequest->delete();

    }

    public function reject(ActivityRequest $activityRequest)
    {

        $activityRequest = ActivityRequestService::find($activityRequest);

        $activityRequest->delete();
    }

}