<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\Auth\LoginServiceInterface;

class LoginService implements LoginServiceInterface
{
    /** @var mixed $UserRepository */
    private UserRepositoryInterface $UserRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->UserRepository = $userRepository;
    }

    /**
     * 会員情報を取得
     *
     * @param  mixed $name ユーザーネーム
     * @return User
     */
    public function getUserInfo($name): User
    {
        return $this->UserRepository->getUserByName($name);
    }
}
