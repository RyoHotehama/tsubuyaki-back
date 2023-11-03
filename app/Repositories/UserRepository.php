<?php

namespace App\Repositories;

use App\Exceptions\ApiException;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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
        try {
            return User::create($registData);
        } catch (Throwable $e) {
            Log::error($e);

            throw new ApiException('予期せぬエラーが発生しました', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * ユーザーネームからユーザー情報を取得
     *
     * @param  mixed $name ユーザーネーム
     * @return User
     */
    public function getUserByName($name) : User
    {
        try {
            return User::where('name', $name)->first();
        } catch (Throwable $e) {
            Log::error($e);

            throw new ApiException('予期せぬエラーが発生しました', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
