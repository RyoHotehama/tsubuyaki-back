<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Interfaces\Auth\RegisterServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /** @var mixed $RegisterService */
    private RegisterServiceInterface $RegisterService;

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

        return response()->json(['token' => $token], Response::HTTP_OK);
    }
}
