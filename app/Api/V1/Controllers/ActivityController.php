<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:54 PM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\ActivityCreateRequest;
use App\Api\V1\Transformers\ActivityTransformer;
use App\Services\ActivityService;
use Auth;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct()
    {
        $this->activityService = new ActivityService();
    }

    public function index()
    {
        $activities = ActivityService::getListsBy(Auth::id());

        return $this->response->collection($activities, new ActivityTransformer());
    }

    public function store(ActivityCreateRequest $request)
    {
        $activity = $this->activityService->create($request, Auth::user());

        return $this->response->item($activity, new ActivityTransformer());
    }
}