<?php

namespace App\Services\Interfaces\Auth;

use App\Models\User;

interface RegisterServiceInterface
{
    /**
     * RegistUser
     *
     * @param  mixed $registData
     * @return User
     */
    public function RegistUser($registData): User;
}
