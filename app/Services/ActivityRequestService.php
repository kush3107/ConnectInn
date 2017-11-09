<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10/11/17
 * Time: 1:49 AM
 */

namespace App\Services;



use App\Api\V1\Exceptions\UserAlreadyInActivityException;
use App\Api\V1\Exceptions\UserAlreadySentRequestException;
use App\Activity;
use App\ActivityRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActivityRequestService
{

    public static function find($id){

        $activityrequest = ActivityRequest::find($id);
        if(is_null($activityrequest)){
            throw new NotFoundHttpException('ActivityRequest Not found');
        }

        return $activityrequest;
    }

    public function create($senderId,$activityId)
    {

        $activity = Activity::find($activityId);
        if ($activity->users()->wherePivot('user_id', $senderId)->exists()) {
            throw new UserAlreadyInActivityException();
        }

        if(ActivityRequest::where('sender_id',$senderId)
        ->where('activity_id',$activityId)
        ->exists()){
            throw new UserAlreadySentRequestException();
        }

        $activityrequest = new ActivityRequest();

        $activityrequest->sender_id = $senderId;
        $activityrequest->activity_id = $activity->id;

        $activityrequest->save();

        return $activityrequest;
    }

    public function accept($activityrequest){

        $activityrequest = ActivityRequestService::find($activityrequest);

        $activity = $activityrequest->activity;
        $sender = $activityrequest->sender;

        ActivityService::attachUserToActivity($activity->id,$sender->id);

        $activityrequest->delete();

    }

    public function reject($activityrequest){

        $activityrequest = ActivityRequestService::find($activityrequest);

        $activityrequest->delete();
    }

}