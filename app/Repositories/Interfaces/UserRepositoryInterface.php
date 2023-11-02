<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * createUser
     *
     * @param  mixed $registData
     * @return User
     */
    public function createUser($registData): User;

    /**
     * getUserByName
     *
     * @param  mixed $name
     * @return User
     */
    public function getUserByName($name): User;
}
