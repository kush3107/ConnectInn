<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:16 PM
 */

namespace App\Api\V1\Transformers;


use App\Invitation;
use League\Fractal\TransformerAbstract;

class InvitationTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['activity', 'sender', 'receiver'];

    public function transform(Invitation $invitation)
    {
        return [
            'id' => (int)$invitation->id,
            'created_at' => $invitation->created_at->toDateTimeString(),
            'updated_at' => $invitation->updated_at->toDateTimeString()
        ];
    }

    public function includeActivity(Invitation $invitation)
    {
        return $this->item($invitation->activity, new ActivityTransformer());
    }

    public function includeSender(Invitation $invitation)
    {
        return $this->item($invitation->sender, new UserTransformer());
    }

    public function includeReceiver(Invitation $invitation)
    {
        return $this->item($invitation->receiver, new UserTransformer());
    }
}