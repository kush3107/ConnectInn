<?php

use App\User;
use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 1:23 AM
 */

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString()
        ];
    }
}