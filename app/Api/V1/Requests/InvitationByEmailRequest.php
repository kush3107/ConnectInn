<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 11:43 AM
 */

namespace App\Api\V1\Requests;


use App\Services\ActivityService;

class InvitationByEmailRequest extends Request
{
    const EMAIL = 'email';

    public function authorize()
    {
        $activity = $this->route('activity');
        $activity = ActivityService::find($activity);

        return $activity->isOwner(\Auth::user());
    }

    public function rules()
    {
        return [
            self::EMAIL => 'required|email|exists:users,email'
        ];
    }

    public function getEmail()
    {
        return $this->get(self::EMAIL);
    }
}