<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\Interfaces\Auth\RegisterRepositoryInterface;
use App\Services\Interfaces\Auth\RegisterServiceInterface;

class RegisterService implements RegisterServiceInterface
{
    /**
     * RegisterRepository
     *
     * @var mixed
     */
    private $RegisterRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        RegisterRepositoryInterface $registerRepository
    ) {
        $this->RegisterRepository = $registerRepository;
    }

    /**
     * 会員登録処理
     *
     * @param  mixed $registData 登録データ
     * @return User
     */
    public function RegistUser($registData): User
    {
        return $this->RegisterRepository->createUser($registData);
    }
}
