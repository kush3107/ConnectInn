<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:54 PM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\ActivityCreateRequest;
use App\Api\V1\Requests\ActivityUpdateRequest;
use App\Api\V1\Requests\InvitationByEmailRequest;
use App\Api\V1\Transformers\ActivityTransformer;
use App\Services\ActivityService;
use App\Services\InvitationService;
use App\User;
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

    public function update(ActivityUpdateRequest $request, $activity)
    {
        $activityUpdate = $this->activityService->update($request, $activity);

        return $this->response->item($activityUpdate, new ActivityTransformer());
    }

    public function inviteByEmail(InvitationByEmailRequest $request, $activity)
    {
        $invitationService = new InvitationService();
        $receiver = User::where('email', $request->getEmail())->first();

        $invitationService->create(Auth::id(), $receiver->id, $activity);
    }
}