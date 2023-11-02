<?php

namespace App\Services\Interfaces\Auth;

use App\Models\User;

interface LoginServiceInterface
{
    /**
     * getUserInfo
     *
     * @param  mixed $name
     * @return User
     */
    public function getUserInfo($name): User;
}
