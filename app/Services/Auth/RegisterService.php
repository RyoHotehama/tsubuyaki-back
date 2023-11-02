<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\Auth\RegisterServiceInterface;

class RegisterService implements RegisterServiceInterface
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
     * 会員登録処理
     *
     * @param  mixed $registData 登録データ
     * @return User
     */
    public function registUser($registData): User
    {
        return $this->UserRepository->createUser($registData);
    }
}
