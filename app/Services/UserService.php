<?php

namespace App\Services;

use App\Models\User;

class UserService implements IUserService
{
    public function createUser(array $attr): ?User
    {
       $user =  User::create($attr);
       return $user;
    }
}
