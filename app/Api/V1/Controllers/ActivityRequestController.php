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

    public function request($activityId)
    {

        $activity = ActivityService::find($activityId);

        $this->activityrequestService->create(\Auth::id(), $activity);
    }

    public function accept($activityRequest)
    {

        $activityRequest = ActivityRequestService::find($activityRequest);

        $activity = Activity::find($activityRequest->activity->id);

        if (!$activity->isOwner(\Auth::user())) {
            throw new UnauthorizedHttpException('You are not authorized for the action');
        }

        $this->activityrequestService->accept($activityRequest);

    }

    public function reject($activityRequest)
    {
        $this->activityrequestService->reject($activityRequest);
    }
}