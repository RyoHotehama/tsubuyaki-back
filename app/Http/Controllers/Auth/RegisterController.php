<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Interfaces\Auth\RegisterServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * RegisterService
     *
     * @var mixed
     */
    private $RegisterService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        RegisterServiceInterface $registerService
    ) {
        $this->RegisterService = $registerService;
    }

    /**
     * 会員登録処理
     *
     * @param  RegisterRequest $request
     * @return JsonResponse
     */
    public function index(RegisterRequest $request): JsonResponse
    {
        $registData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        $user = $this->RegisterService->RegistUser($registData);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
