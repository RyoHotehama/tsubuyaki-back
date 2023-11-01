<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\Interfaces\Auth\RegisterRepositoryInterface;

class RegisterRepository implements RegisterRepositoryInterface
{
    /**
     * 会員情報をusersテーブルに登録
     *
     * @param  mixed $registData 登録データ
     * @return User
     */
    public function createUser($registData) : User
    {
        return User::create($registData);
    }


}
