<?php

namespace App\Repositories\Interfaces\Auth;

use App\Models\User;

interface RegisterRepositoryInterface
{
    /**
     * createUser
     *
     * @param  mixed $registData
     * @return User
     */
    public function createUser($registData): User;
}
