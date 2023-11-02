<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
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

    /**
     * ユーザーネームからユーザー情報を取得
     *
     * @param  mixed $name ユーザーネーム
     * @return User
     */
    public function getUserByName($name) : User
    {
        return User::where('name', $name)->first();
    }
}
