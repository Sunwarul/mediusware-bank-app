<?php

namespace App\Services;

use App\Models\User;

interface IUserService
{
    public function createUser(array $attr): ?User;
}
