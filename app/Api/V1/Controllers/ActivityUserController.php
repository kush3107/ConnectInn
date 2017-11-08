<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 3:13 PM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\InvitationByEmailRequest;
use App\Services\InvitationService;
use App\User;
use Auth;

class ActivityUserController extends Controller
{
    public function inviteByEmail(InvitationByEmailRequest $request, $activity)
    {
        $invitationService = new InvitationService();
        $receiver = User::where('email', $request->getEmail())->first();

        $invitationService->create(Auth::id(), $receiver->id, $activity);
    }
}