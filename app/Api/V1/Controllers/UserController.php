<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 11:22 AM
 */

namespace App\Api\V1\Controllers;

use App\Api\V1\Exceptions\UserAlreadyExistsException;
use App\Api\V1\Requests\UserAddProfilePicRequest;
use App\Api\V1\Requests\UserCreateRequest;
use App\Api\V1\Requests\UserUpdateRequest;
use App\Api\V1\Transformers\InvitationTransformer;
use App\Api\V1\Transformers\UserTransformer;
use App\Facades\Uploader;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Tymon\JWTAuth\JWT;

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

        $transformedUser = (new UserTransformer())->transform($user);
        $token = JWT::fromUser($user);

        return [
            'token' => $token,
            'user' => $transformedUser
        ];
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

    public function update(UserUpdateRequest $request)
    {
        $user = Auth::user();

        $user = $this->userService->update($request, $user);

        return $this->response->item($user, new UserTransformer());
    }

    public function show()
    {
        $user = Auth::user();

        return $this->response->item($user, new UserTransformer());
    }

    public function pendingInvitations()
    {
        return $this->response->collection(Auth::user()->pendingInvitations, new InvitationTransformer());
    }

    public function sentInvitations()
    {
        return $this->response->collection(Auth::user()->sentInvitations, new InvitationTransformer());
    }

    public function uploadProfilePic(UserAddProfilePicRequest $request)
    {
        $user = Auth::user();

        $thumbnail = $request->getImage();
        $unique    = uniqid();
        $url       = 'connectInn/avatars/' . $unique . $user->id . '.' . $thumbnail->getClientOriginalExtension();

        try {
            $uploadedURL = Uploader::upload($thumbnail, $url);
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException("Some Error Occured");
        }

        $user->profile_pic = $uploadedURL;
        $user->save();

        return $this->response->item($user, new UserTransformer);
    }
}