<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:03 PM
 */

namespace App\Api\V1\Controllers;


use App\Services\InvitationService;

class InvitationController extends Controller
{
    protected $invitationService;

    public function __construct()
    {
        $this->invitationService = new InvitationService();
    }

    public function accept($invitation)
    {
        $this->invitationService->accept($invitation);
    }
}