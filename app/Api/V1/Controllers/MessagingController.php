<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 12/12/17
 * Time: 1:27 AM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\Request;
use App\Services\ActivityService;
use App\Services\MessagingService;
use Auth;
use Illuminate\Validation\UnauthorizedException;

class MessagingController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new MessagingService();
    }

    public function storeUserMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'channel' => 'required'
        ]);

        $this->service->sendUserMessage($request->get('message'), $request->get('channel'), Auth::id());
    }

    public function storeActivitiesMessage(Request $request, $activity)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $activity = ActivityService::find($activity);

        if (!($activity->isOwner(\Auth::user()) || $activity->isMember(\Auth::user()))) {
            throw new UnauthorizedException('You are not authorized');
        }

        $channel = 'activity_' . $activity->id;
        $this->service->sendActivityMessage($request->get('message'), $channel, \Auth::id());
    }
}