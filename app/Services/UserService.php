<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 2:26 AM
 */

namespace App\Services;


use App\Attribute;
use App\Contracts\UserCreateContract;
use App\Contracts\UserUpdateContract;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{
    /**
     * @param $id
     * @return User
     */
    public static function find($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            throw new NotFoundHttpException('User could not be found!');
        }

        return $user;
    }

    public function create(UserCreateContract $contract)
    {
        $user = new User();

        $user->name = $contract->getName();
        $user->email = $contract->getEmail();
        $user->password = $contract->getPassword();

        $user->save();

        return $user;
    }

    public function update(UserUpdateContract $contract, User $user)
    {

        if ($contract->hasName()) {
            $user->name = $contract->getName();
        }

        if ($contract->hasAbout()) {
            $user->about = $contract->getAbout();
        }

        if ($contract->hasPhone()) {
            $user->phone = $contract->getPhone();
        }

        if ($contract->hasDateOfBirth()) {
            $user->date_of_birth = $contract->getDateOfBirth();
        }

        if ($contract->hasAttributes()) {
            $user->attributes()->createMany($contract->getAttributes());
        }

        $user->save();

        return $user;
    }
}