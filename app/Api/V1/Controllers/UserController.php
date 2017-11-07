<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 11:22 AM
 */

namespace App\Api\V1\Controllers;

use App\Api\V1\Exceptions\UserAlreadyExistsException;
use App\Api\V1\Requests\UserCreateRequest;
use App\Api\V1\Transformers\UserTransformer;
use App\Services\UserService;
use App\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function store(UserCreateRequest $request)
    {
        if (User::where('email', $request->getEmail())->exists()) {
            throw new UserAlreadyExistsException();
        }

        $user = $this->userService->create($request);

        return $this->response->item($user, new UserTransformer());
    }

    public function follow($user)
    {
        $authUser = \Auth::user();

        $authUser->followers()->attach($user);
    }

    public function unfollow($user)
    {
        $authUser = \Auth::user();

        $authUser->followers()->detach($user);
    }

    public function listFollowers()
    {
        $followers = \Auth::user()->followers;

        return $this->response->collection($followers, new UserTransformer());
    }
}