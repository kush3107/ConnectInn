<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 2:26 AM
 */

namespace App\Services;


use App\Contracts\UserCreateContract;
use App\Contracts\UserUpdateContract;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{
    public static function find($id) {
        $user = User::find($id);

        if (is_null($user)) {
            throw new NotFoundHttpException('User could not be found!');
        }

        return $user;
    }

    public function create(UserCreateContract $contract) {
        $user = new User();

        $user->name     = $contract->getName();
        $user->email    = $contract->getEmail();
        $user->password = $contract->getPassword();

        $user->save();

        return $user;
    }

    public function update(UserUpdateContract $contract,User $user){

        if($contract->hasName()){
            $user->name = $contract->getName();
        }
        $user->save();

        return $user;
    }
}