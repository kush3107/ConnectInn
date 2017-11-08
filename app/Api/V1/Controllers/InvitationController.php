<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:03 PM
 */

namespace App\Api\V1\Controllers;


use App\Services\InvitationService;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class InvitationController extends Controller
{
    protected $invitationService;

    public function __construct()
    {
        $this->invitationService = new InvitationService();
    }

    public function accept($invitation)
    {
        $invitation = InvitationService::find($invitation);

        if ($invitation->receiver->id != \Auth::id()) {
            throw new UnauthorizedHttpException('You are not authorized for the action');
        }

        $this->invitationService->accept($invitation);
    }

    public function reject($invitation)
    {
        $invitation = InvitationService::find($invitation);

        if ($invitation->receiver->id != \Auth::id()) {
            throw new UnauthorizedHttpException('You are not authorized for the action');
        }

        $invitation->delete();
    }
}