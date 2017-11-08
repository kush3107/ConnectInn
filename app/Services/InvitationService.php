<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 11:51 AM
 */

namespace App\Services;


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