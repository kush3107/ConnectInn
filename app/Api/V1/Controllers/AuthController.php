<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 1:27 AM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Exceptions\InvalidCredentialsException;
use App\Api\V1\Requests\Request;
use App\Api\V1\Transformers\UserTransformer;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->get('email'))->first();

        if (is_null($user)) {
            dd('asd');
        }

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                throw new InvalidCredentialsException();
            }
        } catch (JWTException $e) {
            throw new InvalidCredentialsException();
        }

        $userTransformer = new UserTransformer();

        $transformedUser = $userTransformer->transform($user);

        return [
            'token' => $token,
            'user' => $transformedUser
        ];
    }
}