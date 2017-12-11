<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 12/12/17
 * Time: 1:27 AM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\Request;
use App\Services\MessagingService;

class MessagingController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new MessagingService();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'receiver_id' => 'required|exists:users,id'
        ]);

        $this->service->sendMessage($request->get('message'), \Auth::id(), $request->get('receiver_id'));
    }
}