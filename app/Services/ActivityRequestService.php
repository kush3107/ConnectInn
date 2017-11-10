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

    public static function find($id)
    {

        $activityrequest = ActivityRequest::find($id);
        if (is_null($activityrequest)) {
            throw new NotFoundHttpException('ActivityRequest Not found');
        }

        return $activityrequest;
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

    public function accept($activityrequest)
    {

        $activityrequest = ActivityRequestService::find($activityrequest);

        $activity = $activityrequest->activity;
        $sender = $activityrequest->sender;

        ActivityService::attachUserToActivity($activity->id, $sender->id);

        $activityrequest->delete();

    }

    public function reject($activityrequest)
    {

        $activityrequest = ActivityRequestService::find($activityrequest);

        $activityrequest->delete();
    }

}