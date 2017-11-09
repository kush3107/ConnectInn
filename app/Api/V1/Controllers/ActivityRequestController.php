<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10/11/17
 * Time: 1:48 AM
 */

namespace App\Api\V1\Controllers;


use App\ActivityRequest;
use App\Services\ActivityRequestService;

class ActivityRequestController extends Controller
{

    protected $activityrequestService;

    public function __construct()
    {
        $this->activityrequestService = new ActivityRequestService();
    }

    public function request($activityId){

        $activityrequest = ActivityRequestService::find($activityId);
        if(!is_null($activityrequest)){
            $this->activityrequestService->create(\Auth::id(),$activityId);
        }
    }

    public function accept($activityrequest){

        $activityrequest = ActivityRequestService::find($activityrequest);

        if($activityrequest->sender->id!=\Auth::id()){
            throw new UnauthorizedHttpException('You are not authorized for the action');
        }

        $this->activityrequestService->accept($activityrequest);

    }

    public function reject($activityrequest){

        $this->activityrequestService->reject($activityrequest);
    }
}