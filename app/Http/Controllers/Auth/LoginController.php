<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Auth\LoginServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /** @var mixed $LoginService */
    private LoginServiceInterface $LoginService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        LoginServiceInterface $loginService
    ) {
        $this->LoginService = $loginService;
    }

    /**
     * ログイン処理
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('name', 'password'))) {
            $message = 'ユーザーネームまたはパスワードが違います。';

            return response()->json(['errors' => ['message' => $message]], 400);
        }

        $user = $this->LoginService->getUserInfo($request->input('name'));

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], Response::HTTP_OK);
    }
}
