<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 11:51 AM
 */

namespace App\Services;


use App\Api\V1\Exceptions\InvitationAlreadyExistsException;
use App\Api\V1\Exceptions\UserAlreadyInActivityException;
use App\Invitation;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvitationService
{
    /**
     * @param $id
     * @return Invitation
     */
    public static function find($id)
    {
        $invitation = Invitation::find($id);

        if (is_null($invitation)) {
            throw new NotFoundHttpException('Invitation Not Found!');
        }

        return $invitation;
    }

    public function create($senderId, $receiverId, $activityId)
    {
        $activity = ActivityService::find($activityId);

        if ($activity->users()->wherePivot('user_id', $receiverId)->exists()) {
            throw new UserAlreadyInActivityException();
        }

        if (Invitation::where('sender_id', $senderId)
        ->where('user_id', $receiverId)
        ->where('activity_id', $activityId)
        ->exists()) {
            throw new InvitationAlreadyExistsException();
        }

        $invitation = new Invitation();

        $invitation->sender_id      = $senderId;
        $invitation->user_id        = $receiverId;
        $invitation->activity_id    = $activity->id;

        $invitation->save();

        return $invitation;
    }

    public function accept($invitation)
    {
        $invitation = InvitationService::find($invitation);

        $activity = $invitation->activity;
        $receiver = $invitation->receiver;

        ActivityService::attachUserToActivity($activity->id, $receiver->id);

        $invitation->delete();
    }
}