<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:54 PM
 */

namespace App\Services;

class ActivityService
{
    public static function getListsBy($userId)
    {
        $user = UserService::find($userId);

        return $user->activities;
    }
}