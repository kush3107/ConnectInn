<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10/11/17
 * Time: 1:48 AM
 */

namespace App\Api\V1\Controllers;



use App\Activity;
use App\Services\ActivityRequestService;
use App\Services\ActivityService;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ActivityRequestController extends Controller
{

    protected $activityrequestService;

    public function __construct()
    {
        $this->activityrequestService = new ActivityRequestService();
    }

    public function request($activityId){

        $activity = ActivityService::find($activityId);

        $var = $this->activityrequestService->create(\Auth::id(),$activity);

        dd($var);

    }

    public function accept($activityrequest){

        $activityrequest = ActivityRequestService::find($activityrequest);

        $activity = Activity::find($activityrequest->activity->id);

        if(!$activity->isOwner(\Auth::user())){
            throw new UnauthorizedHttpException('You are not authorized for the action');
        }

        $this->activityrequestService->accept($activityrequest);

    }

    public function reject($activityrequest){



        $this->activityrequestService->reject($activityrequest);
    }
}